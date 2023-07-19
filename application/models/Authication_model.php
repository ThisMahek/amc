<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authication_model extends CI_Model
{
	public function __construct(){
            parent::__construct();
    }

    //input values
	public function input_values()
	{
		$data = array(
			'username' => remove_special_characters($this->input->post('username', true)),
			'email' => $this->input->post('email', true),
			'password' => $this->input->post('password', true)
		);
		return $data;
	}

	//login
	public function login()
	{
		$this->load->library('bcrypt');
		$data = $this->input_values();
		if (!empty($data['email'])) {
			$user = $this->get_user_by_email($data['email']);
		} else if (!empty($data['username'])) {
			$user = $this->get_user_by_username($data['username']);
		}
		
		if (!empty($user)) {
			//check password
			if (!$this->bcrypt->check_password($data['password'], $user->password)) {
				$this->session->set_flashdata('errors', "Login Error");
				return false;
			}
			if ($user->banned == 1) {
				$this->session->set_flashdata('errors', "User Account Block By Admin");
				return false;
			}
			//set user data
			$user_data = array(
				'bp_sess_user_id' => $user->id,
				'bp_sess_user_email' => $user->email,
				'bp_sess_user_role' => $user->role,
				'bp_sess_logged_in' => true,
				'bp_sess_username' => $user->username,
				'bp_sess_usertype' => $user->role,
			);
			$this->session->set_userdata($user_data);
			
			return true;
		} else {
			$this->session->set_flashdata('errors',"No User Found");
			return false;
		}
	}

	//login direct
	public function login_direct($user)
	{
		//set user data
		$user_data = array(
			'bp_sess_user_id' => $user->id,
			'bp_sess_user_email' => $user->email,
			'bp_sess_user_role' => $user->role,
			'bp_sess_logged_in' => true,
			'bp_sess_username' => $user->username,
			'bp_sess_usertype' => $user->role,
		);

		$this->session->set_userdata($user_data);
	}

	
	//generate uniqe username
	public function generate_uniqe_username($username)
	{
		$new_username = $username;
		if (!empty($this->get_user_by_username($new_username))) {
			$new_username = $username . " 1";
			if (!empty($this->get_user_by_username($new_username))) {
				$new_username = $username . " 2";
				if (!empty($this->get_user_by_username($new_username))) {
					$new_username = $username . " 3";
					if (!empty($this->get_user_by_username($new_username))) {
						$new_username = $username . "-" . uniqid();
					}
				}
			}
		}
		return $new_username;
	}

		//add administrator
	public function add_administrator()
	{
		$this->load->library('bcrypt');
		$data = $this->authication_model->input_values();
		//secure password
		$data['password'] = $this->bcrypt->hash_password($data['password']);
		$data['user_type'] = "registered";
		$data['role'] = "admin";
		$data['banned'] = 0;
		$data['email_status'] = 1;
		$data['token'] = generate_token();
		$data['created_at'] = date('Y-m-d H:i:s');
		return $this->db->insert('users', $data);
	}

	
	//logout
	public function logout()
	{
		//unset user data
		$this->update_last_seen();
		$this->session->unset_userdata('bp_sess_user_id');
		$this->session->unset_userdata('bp_sess_user_email');
		$this->session->unset_userdata('bp_sess_user_role');
		$this->session->unset_userdata('bp_sess_logged_in');
		$this->session->unset_userdata('bp_sess_username');
		$this->session->unset_userdata('bp_sess_usertype');
		
		return true;
	}

	//reset password
	public function reset_password($id)
	{
		$id = clean_number($id);
		$this->load->library('bcrypt');
		$new_password = $this->input->post('password', true);
		$data = array(
			'password' => $this->bcrypt->hash_password($new_password),
			'token' => generate_token()
		);
		//change password
		$this->db->where('id', $id);
		return $this->db->update('users', $data);
	}

	//delete user
	public function delete_user($id)
	{
		$id = clean_number($id);
		$user = $this->get_user($id);
		if (!empty($user)) {
			$this->db->where('id', $id);
			return $this->db->delete('users');
		}
		return false;
	}

	

	//update last seen time
	public function update_last_seen()
	{
		// get_ci_core_construct();
		if ($this->is_logged_in()) {
			$user = user();
			//update last seen
			$data = array(
				'last_seen' => date("Y-m-d H:i:s"),
			);
			$this->db->where('id', $user->id);
			return $this->db->update('users', $data);
		}
	}

	//is logged in
	public function is_logged_in()
	{
		//check if user logged in
		if ($this->session->userdata('bp_sess_logged_in') == true) {
			$user = $this->get_user($this->session->userdata('bp_sess_user_id'));
			if (!empty($user)) {
				if ($user->banned == 0) {
					return true;
				}
			}
		}
		return false;
	}

	//function get user
	public function get_logged_user()
	{
		if ($this->is_logged_in()) {
			$user_id = $this->session->userdata('bp_sess_user_id');
			$this->db->where('id', $user_id);
			$query = $this->db->get('users');
			return $query->row();
		}
	}

	//is admin
	public function is_admin()
	{
		//check logged in
		if ($this->is_logged_in()) {
			$user = $this->get_logged_user();
			if ($user->role == 'admin') {
				return true;
			}
		}
		return false;
	}
    
    public function is_franchise()
    {
       if ($this->is_logged_in()) {
			$user = $this->get_logged_user();
			if ($user->role == 'franchise') {
				return true;
			}
		}
		return false;
    }
	//get user by id
	public function get_user($id)
	{
		$id = clean_number($id);
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		return $query->row();
	}

	//get user by email
	public function get_user_by_email($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('users');
		return $query->row();
	}

	//get user by username
	public function get_user_by_username($username)
	{
		$username = remove_special_characters($username);
		$this->db->where('username', $username);
		$query = $this->db->get('users');
		return $query->row();
	}

	


	//get users
	public function get_users()
	{
		$query = $this->db->get('users');
		return $query->result();
	}

	//get users count
	public function get_users_count()
	{
		$query = $this->db->get('users');
		return $query->num_rows();
	}

	//get latest members
	public function get_latest_members($limit)
	{
		$limit = clean_number($limit);
		$this->db->limit($limit);
		$this->db->order_by('users.id', 'DESC');
		$query = $this->db->get('users');
		return $query->result();
	}

	//get members count
	public function get_members_count()
	{
		$this->db->where('role', "member");
		$query = $this->db->get('users');
		return $query->num_rows();
	}

	//get administrators
	public function get_administrators()
	{
		$this->db->where('role', "admin");
		$query = $this->db->get('users');
		return $query->result();
	}

	
	//get last users
	public function get_last_users()
	{
		$this->db->order_by('users.id', 'DESC');
		$this->db->limit(7);
		$query = $this->db->get('users');
		return $query->result();
	}

	//check if email is unique
	public function is_unique_email($email, $user_id = 0)
	{
		$user_id = clean_number($user_id);
		$user = $this->authication_model->get_user_by_email($email);

		//if id doesnt exists
		if ($user_id == 0) {
			if (empty($user)) {
				return true;
			} else {
				return false;
			}
		}

		if ($user_id != 0) {
			if (!empty($user) && $user->id != $user_id) {
				//email taken
				return false;
			} else {
				return true;
			}
		}
	}

	//check if username is unique
	public function is_unique_username($username, $user_id = 0)
	{
		$user = $this->get_user_by_username($username);

		//if id doesnt exists
		if ($user_id == 0) {
			if (empty($user)) {
				return true;
			} else {
				return false;
			}
		}

		if ($user_id != 0) {
			if (!empty($user) && $user->id != $user_id) {
				//username taken
				return false;
			} else {
				return true;
			}
		}
	}

	//ban or remove user ban
	public function ban_remove_ban_user($id)
	{
		$id = clean_number($id);
		$user = $this->get_user($id);

		if (!empty($user)) {
			$data = array();
			if ($user->banned == 0) {
				$data['banned'] = 1;
			}
			if ($user->banned == 1) {
				$data['banned'] = 0;
			}

			$this->db->where('id', $id);
			return $this->db->update('users', $data);
		}

		return false;
	}

	 public function change_password($data)
    {
        $this->load->library('bcrypt');
        $user = user();
        if (!empty($user)) {
        	   //password does not match stored password.
                if (!$this->bcrypt->check_password($data['old_password'], $user->password)) {
                    $this->session->set_flashdata('errors', "Wrong old Password");
                    redirect('signin/change_password');
                }
            $data = array(
                'password' => $this->bcrypt->hash_password($data['new_password'])
            );
            $this->db->where('id', $user->id);
            return $this->db->update('users', $data);
        } else {
            return false;
        }
    }

	
//get user by token
	public function get_user_by_token($token)
	{
		$token = remove_special_characters($token);
		$this->db->where('token', $token);
		$query = $this->db->get('users');
		return $query->row();
	}	

	public function updateUsers($data,$id)
	{
			$this->db->where('id', $id);
			return $this->db->update('users', $data);
	}


	public function checkUserMobileExistsJob($user_id)
		{
			$this->db->where('mobile', $user_id);
			$query = $this->db->get('onlinejobapplication');
			$resp = $query->row();
			if(!empty($resp)){
				return true;
			}else{
				return false;
			}
		}	

	public function checkUserMobileExistsMemberApp($user_id)
		{
			$this->db->where('mobile', $user_id);
			$query = $this->db->get('member_application');
			$resp = $query->row();
			if(!empty($resp)){
				return true;
			}else{
				return false;
			}
		}		
	public function getUserIdByAppID($stu_id)
		{
				$this->db->where('stu_id', $stu_id);
				$query = $this->db->get('users');
				return $resp = $query->row();
				
		}
	public function is_approved()
	{
		//check if user logged in
		if ($this->session->userdata('bp_sess_logged_in') == true) {
			$user = $this->get_user($this->session->userdata('bp_sess_user_id'));
			if (!empty($user)) {
				if (($user->banned == 0) && ($user->approval_status==1)) {
					return true;
				}
			}
		}
		return false;
	}
	 
   public function addUpdateVerification($aParam,$action = 'add')
   {
        $status = false;
        $aValue = array();
        $aWhere = array();
        $aValidField = array(
                             'verification_type',
                             'user_id',
                             'verification_value',
                             'verification_code',
                            );
       if(in_array($action, array('edit','update')))
        {
          if(isset($aParam['verification_id']) && is_numeric($aParam['verification_id']))
            {
                $aWhere['id'] = $aParam['verification_id'];
            }
           elseif (isset($aParam['where'])) 
           {
              $aWhere = $aParam['where'];
           } 
        } 
        foreach($aValidField as $sField)
        {
            if(isset($aParam[$sField]))
            {
               $aValue[$sField] = $aParam[$sField] ; 
            }
        }

        $this->db->reset_query(); 
        if($action == 'add')
        {
            $aValue['created_at'] = date('Y-m-d H:i:s');
            if($this->db->insert('verified_email_mobile', $aValue))
            {
                $id = $this->db->insert_id();
                if(isset($aParam['test']) && $aParam['test'])
                {
                    debug($this->db->last_query());
                }  
                return $id;
            }
            return false;
        }
        else if(in_array($action,array('edit','update')) && count($aWhere)>0)
        {
            $aValue['updated_on'] = date('Y-m-d H:i:s');
            if($this->db->update('verified_email_mobile', $aValue,$aWhere))
            {
                if(isset($aParam['test']) && $aParam['test'])
                {
                    debug($this->db->last_query());
                }
                $status = (isset($aParam['verification_id']))?$aParam['verification_id']:1;
            }
            return $status;
        }
        return false; 
   }
   
   public function get_verification_code_by_id($verification_id)
   {
	 $this->db->where('id', $verification_id);
	 $query = $this->db->get('verified_email_mobile');
	 return $query->row();
   } 

















}// end of class
