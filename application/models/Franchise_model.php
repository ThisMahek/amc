<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Franchise_model extends CI_Model
{
    //input values
    public function input_values()
    {
      
        $data = array(
            'franchise_name' => $this->input->post('franchise_name', true),
            'franchise_address_1' => $this->input->post('franchise_address_1', true),
            'franchise_address_2' => $this->input->post('franchise_address_2', true),
            'franchise_district' => $this->input->post('franchise_district', true),
            'franchise_state' => $this->input->post('franchise_state'),
            'franchise_pin' => $this->input->post('franchise_pin', true),
            'franchise_contact' => $this->input->post('franchise_contact', true),
            'franchise_email' => !empty($this->input->post('email', true))?$this->input->post('email', true):$this->input->post('franchise_email', true),
            'president_name' => $this->input->post('president_name', true),
            'president_aadhar_number' => $this->input->post('president_aadhar_number', true),
            'franchise_pan_number' => $this->input->post('franchise_pan_number', true),
            'president_dob' => $this->input->post('president_dob', true),
            'course_id' => is_array($this->input->post('course_id', true))?json_encode($this->input->post('course_id', true)):$this->input->post('course_id', true),
            'registration_certificate_img' => $this->input->post('registration_certificate_img', true),
            'franchise_pan_card_img' => $this->input->post('franchise_pan_card_img', true),
            'unique_id_img' => $this->input->post('unique_id_img', true),
            'msme_certificate_img' => $this->input->post('msme_certificate_img', true),
            'president_aadhar_img' => $this->input->post('president_aadhar_img', true),
            'president_pan_img' => $this->input->post('president_pan_img', true),
            'president_photograph_img' => $this->input->post('president_photograph_img', true),
            'president_signature_img' => $this->input->post('president_signature_img', true),
            'password' => $this->input->post('password', true),
        );
        return $data;
    }
   public function addUpdateFranchise($aParam,$action = 'add')
   {
        $status = false;
        $aValue = array();
        $aWhere = array();
        $aImages = ['registration_certificate_img','franchise_pan_card_img','unique_id_img','msme_certificate_img','president_aadhar_img','president_pan_img','president_photograph_img','president_signature_img'];
        $aValidField = array(
                             'user_id',
                             'user_name',
                             'reg_no',
                             'enroll_no',
                             'franchise_name',
                             'franchise_address_1',
                             'franchise_address_2',
                             'franchise_district',
                             'franchise_state',
                             'franchise_pin',
                             'franchise_contact',
                             'franchise_email',
                             'president_name',
                             'president_aadhar_number',
                             'franchise_pan_number',
                             'president_dob',
                             'course_id',
                             'registration_certificate_img',
                             'franchise_pan_card_img',
                             'unique_id_img',
                             'msme_certificate_img',
                             'president_aadhar_img',
                             'president_pan_img',
                             'president_photograph_img',
                             'president_signature_img',
                             'status',
                             'pay_status',
                             'password',
                             'mobile_verification',
                             'email_verification',
                             'aadhar_verification',
                             'total_fees',
                             'balance',
                             'fees_paid'
                            );
       if(in_array($action, array('edit','update')))
        {
          if(isset($aParam['franchise_id']) && is_numeric($aParam['franchise_id']))
            {
                $aWhere['id'] = $aParam['franchise_id'];
            }
           elseif (isset($aParam['where'])) 
           {
              $aWhere = $aParam['where'];
           } 
        } 
        foreach($aValidField as $sField)
        {
            if(isset($aParam[$sField]) & !empty($aParam[$sField]))
            {
               $aValue[$sField] = $aParam[$sField] ;
               if(in_array($sField, $aImages))
               {
                $this->doMoveimage($aParam[$sField]);
               } 
            }
        }

        $this->db->reset_query(); 
        if($action == 'add')
        {
            $aValue['created_on'] = date('Y-m-d H:i:s');
            if($this->db->insert('franchise', $aValue))
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
            if($this->db->update('franchise', $aValue,$aWhere))
            {
                if(isset($aParam['test']) && $aParam['test'])
                {
                    debug($this->db->last_query());
                }
                $status = (isset($aParam['franchise_id']))?$aParam['franchise_id']:1;
            }
            return $status;
        }
        return false; 
   }
    public function add()
    {
        $data = $this->input_values();
       
        if (!empty($data["password"])) 
        {
            $this->load->library('bcrypt');
            $data["password"] = $this->bcrypt->hash_password($data["password"]);
        }
        if(isset($data['franchise_email']))
         {
            $data['user_name'] =$data['franchise_email'];
         }   
        
        $data["created_on"] = date('Y-m-d H:i:s');
        if(is_admin()) 
        {    
            $data["pay_status"] = 1;
            $data["status"] = 1;
            
        }else
        {
            $data["pay_status"] = 0;
            $data["status"] = 0;
        }
        //debug($data);die();
        return $this->db->insert('franchise',$data);
    }

    public function register_account($last_id)
    {
        $franchise = $this->get_franchise_by_id($last_id);
        $insertArr = [
            'stu_name' => $franchise->franchise_name,
            'stu_id' => $franchise->id,
            'email' => $franchise->franchise_email,
            'username' => $franchise->franchise_email,
            'mobile' => $franchise->franchise_contact,
            'email_status' => 1,
            'password' => $franchise->password,
            'role' => 'franchise',
            'user_type' => 'franchise',
            'banned' => 0,
            'created_on' => date('Y-m-d'),
        ];
        if (is_admin()) {
            $insertArr["approval_status"] = 1;
        } else {
            $insertArr["approval_status"] = 0;
        }
         return $this->db->insert('users', $insertArr);
    }

    public function updatefranchiseIDS($franchise_id,$user_id)
    {
        $franchise = $this->get_franchise_by_id($franchise_id);
        $reg_no = genarateFranchiseRegistrationNo($franchise_id);
        $enroll_no = genarateFranchiseEnrollmentNo($franchise_id);
        $updatefranchise = [
            //'roll_no'=>$roll_no,
            'reg_no'=>$reg_no,
            'enroll_no'=>$enroll_no,
            //'user_name'=> $franchise->franchise_email,
            'user_id'=>$user_id,    
        ];
        $updateUser = [
            //'roll_no'=>$roll_no,
            'reg_no'=>$reg_no,
            'enroll_no'=>$enroll_no,
            //'username' =>$franchise->franchise_email,
        ];
        $this->updateSinglefranchise($updatefranchise, $franchise_id);
        $this->authication_model->updateUsers($updateUser, $user_id);
    }


    public function maketransaction($last_id)
    {
        $franchise = $this->get_franchise_by_id($last_id);
        $course = $this->course_model->get_course_by_id($franchise->course_id);
        $userData = $this->authication_model->getUserIdByAppID($last_id);
        $insertArr = [
            'trn_date' => date('Y-m-d H:i:s'),
            'perticulars' => "Admission of ".$course->title,
            'dr' => $course->admission_fees,
            'cr' => 0,
            'transaction_id' => time(),
            'mode' => "offline",
            'user_id' => $userData->id,
            'made_by' => $this->session->userdata('bp_sess_user_id'),
        ];
        return $this->db->insert('transactions', $insertArr);
    }


    public function get_franchise_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('franchise');
        return $query->row();
    }

    public function get_all_franchises()
    {
        $this->db->order_by('id',"DESC");
        $query = $this->db->get('franchise');
        return $query->result();
    }

    public function updateSinglefranchise($data,$id)
    {
        $this->db->where('id', clean_number($id));
        return $this->db->update('franchise', $data);
    }
    public function updatefranchiseAccount($id)
    {
        $franchise = $this->get_franchise_by_id($id);
        $user_id = $franchise->user_id;
        $updateArr = [
            'stu_name'=>$franchise->stu_name,
            'email'=>$franchise->email,
            'mobile'=>$franchise->mobile,
            'avatar'=>$franchise->avatar,
        ];
        return $this->authication_model->updateUsers($updateArr, $user_id);

    }
    // move images
    public function doMoveimage($file)
    {
        $source = FCPATH . "/uploads/tempimg/";
        $destination = FCPATH . "/uploads/franchise_images/";
        if (!empty($file)) {
            if (@rename($source . $file, $destination . $file)) {
                return true;
            } else {
                return true;
            }
        }
    }

    public function get_franchise_by_username($user_name)
    {
        $this->db->where('user_name', $user_name);
        $query = $this->db->get('franchise');
        return $query->row();
    }

    public function get_all_pending_franchises()
    {
        $this->db->order_by('id', "DESC");
        $this->db->where('status', 1);
        $query = $this->db->get('franchise');
        return $query->result();
    }

     public function get_all_un_complete_franchises()
    {
        $this->db->order_by('id', "DESC");
        $this->db->where('status', 0);
        $query = $this->db->get('franchise');
        return $query->result();
    }


    public function get_all_approved_franchises()
    {
        $this->db->order_by('id', "DESC");
        $this->db->where('status', 2);
        $this->db->where('pay_status', 1);
        $query = $this->db->get('franchise');
        return $query->result();
    }

    public function get_all_reject_franchises()
    {
        $this->db->order_by('id', "DESC");
        $this->db->where('status', 3);
        $query = $this->db->get('franchise');
        return $query->result();
    }

    public function get_all_dispute_franchise()
    {
        $this->db->order_by('id', "DESC");
        $this->db->where('status', 4);
        $query = $this->db->get('franchise');
        return $query->result();
    }

    public function get_franchise_count($where = "")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('franchise');
        return $query->num_rows();
    }

    public function get_franchise_dashboard($where="")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by('id',"DESC");
        $this->db->limit(5);
        $query = $this->db->get('franchise');
        return $query->result();
    }

    public function get_franchise_condition($where = "")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('franchise');
        return $query->result();
    }
    public function Approved($aData)
    {
        $franchise = $this->get_franchise_by_id($aData['id']);
        $user_id = $franchise->user_id;
        $franchise_fees =$this->get_franchise_fees();
        $course = json_decode($franchise->course_id,true);
        $total_fees = $franchise_fees->franchise_fees+($franchise_fees->per_course_feee *count($course));
        $admissionArr = [
            'status'=>2,
            'total_fees' => $total_fees,
            'balance' => $total_fees,
            'franchise_id'=>$aData['id'],
        ];
        if ($aData['is_payment_done']==1) 
        {
            
            $admissionArr['pay_status'] = 1;
            $admissionArr['total_fees'] = $total_fees;
            $admissionArr['fees_paid'] = $total_fees;
            $admissionArr['balance'] = 0;
            $updateArr = [
            'approval_status' =>1,
             ];
            $this->authication_model->updateUsers($updateArr, $user_id); 
        }   
        return $this->addUpdateFranchise($admissionArr, 'edit');
    }
    public function get_franchise_fees()
    {
        $query = $this->db->get('franchise_fees');
        return $query->row();
    }


}
