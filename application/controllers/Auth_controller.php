<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_controller extends Home_Core_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (auth_check()) {
            redirect('dashboard');
        } else {
            $this->load->view('auth/index');
        }
    }

    public function login_post()
    {
        $aResponse = array('status'=>false,'message'=>'');
        //check auth
        if (auth_check()) {
            redirect('dashboard');
        }
        //validate inputs
        $username =  remove_special_characters($this->input->post('username', true));
        $email = $this->input->post('email');
        if (!empty($email)) {
            $this->form_validation->set_rules('email', 'Email-id', 'required|xss_clean|max_length[100]');
        } else if (!empty($username)) {
            $this->form_validation->set_rules('username', 'Userid', 'required|xss_clean|max_length[100]');
        }
        $this->form_validation->set_rules('password', "Password", 'required|xss_clean|max_length[30]');
        if ($this->form_validation->run() == false) 
        {
            if(isset($_REQUEST['login_type']) && $_REQUEST['login_type'] == 'franchise')
            {
              $aResponse['aErrors'] = array(
                'username' => form_error('email', '<p class="mt-3 text-danger">', '</p>'),
                'password' => form_error('password', '<p class="mt-3 text-danger">', '</p>'),
                'confirm_password' => form_error('confirm_password', '<p class="mt-3 text-danger">', '</p>'),
               );    
            }    
            else
            {
              $this->session->set_flashdata('errors', validation_errors());
              $this->index();
            }    
            
        } 
        else 
        {
            if(isset($_REQUEST['login_type']) && $_REQUEST['login_type'] == 'franchise')
            {
               $aResponse['message'] = "Your UserName/Password don't match Please try again."; 
               if ($this->authication_model->login()) 
               {
                 $aResponse = array('status'=>true,'message'=>'Login Successfully','redirect'=>base_url().'dashboard');
               } 
            }
            else 
            {
              if ($this->authication_model->login()) {
                    redirect('dashboard');
                } else {
                    redirect($this->agent->referrer());
                }    
            }   
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($aResponse)); 
    }


    public function logout()
    {
        $this->authication_model->update_last_seen();
        $this->authication_model->logout();
        redirect('login');
    }



    /**
     * Forgot Password
     */
    public function forgot_password()
    {
        //check if logged in
        if (auth_check()) {
            redirect(base_url());
        }

        // $headerdata['page_title'] = "Forgot Password";
        // $this->load->view('includes/header',$headerdata);
        $this->load->view('auth/forgot_password');
        // $this->load->view('includes/footer');

    }

    /**
     * Forgot Password Post
     */
    public function forgot_password_post()
    {
        //check auth
        if ($this->auth_check) {
            redirect(base_url());
        }
        $email = $this->input->post('email', true);
        //get user
        $user = $this->authication_model->get_user_by_email($email);
        //if user not exists
        if (empty($user)) {
            $this->session->set_flashdata('error', "No such user found");
            redirect($this->agent->referrer());
        } else {
            $this->load->model("email_model");
            $this->email_model->send_email_reset_password($user->id);
            $this->session->set_flashdata('success', "We've sent an email for resetting your password to your email address. Please check your email for next steps");
            redirect($this->agent->referrer());
        }
    }

    /**
     * Reset Password
     */
    public function reset_password()
    {
        get_method();
        //check if logged in
        if ($this->auth_check) {
            redirect(base_url());
        }
        $data['title'] = "Reset Password";
        $data['description'] = "Reset Password" . " - " . $this->app_name;
        $data['keywords'] = "Reset Password" . "," . $this->app_name;
        //$data['user_session'] = get_user_session();
        $token = $this->input->get('token', true);
        //get user
        $data["user"] = $this->authication_model->get_user_by_token($token);
        $data["success"] = $this->session->flashdata('success');
        if (empty($data["user"]) && empty($data["success"])) {
            redirect(base_url());
        }
        $this->load->view('auth/reset_password', $data);
    }

    /**
     * Reset Password Post
     */
    public function reset_password_post()
    {
        $success = $this->input->post('success', true);
        if ($success == 1) {
            redirect(base_url());
        }
        $user_id = $this->input->post('id', true);
        $this->form_validation->set_rules('password', "New Password", 'required|xss_clean|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('password_confirm', "Password Confirm", 'required|xss_clean|matches[password]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', validation_errors());
            //$this->session->set_flashdata('form_data', $this->profile_model->change_password_input_values());
            $data["user"] = $this->authication_model->get_user($user_id);
            $data["success"] = $this->session->flashdata('success');
            $headerdata['page_title'] = "Reset Password";
            $this->load->view('auth/reset_password', $data);
        } else {
            if ($this->authication_model->reset_password($user_id)) {
                $this->session->set_flashdata('success', "Password reset successful");
                redirect('login');
            } else {
                $this->session->set_flashdata('error', "Unable to reset password. Try again!");
                redirect('login');
            }
        }
    }

    public function change_password()
    {
        //check user
        if (!auth_check()) {
            redirect('signin');
        }
        $data['title'] = "Change Password";
        if (is_admin()) 
        {
           $this->load->view('admin/includes/header', $data);
        }
        else if (is_franchise()) 
        {
           $this->load->view('franchise/includes/header', $data);
        }
        else if (is_student()) 
        {
           $this->load->view('student/includes/header', $data);
        }
        
        $this->load->view('auth/change_password');
        $this->load->view('admin/includes/footer');
    }

    /**
     * Change Password Post
     */
    public function change_password_post()
    {
        //check user
        if (!auth_check()) {
            redirect('signin');
        }

        $this->form_validation->set_rules('old_password', "Old Password", 'required|xss_clean|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('new_password', "New Password", 'required|xss_clean|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('password_confirm', "Password Confirm", 'required|xss_clean|matches[new_password]|min_length[4]|max_length[50]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            $data =  array(
                'old_password' => $this->input->post('old_password', true),
                'new_password' => $this->input->post('new_password', true),
                'password_confirm' => $this->input->post('password_confirm', true)
            );
            if ($this->authication_model->change_password($data)) {
                $this->session->set_flashdata('success', "Password Updated Successfully");
                redirect('change-password');
            } else {
                $this->session->set_flashdata('error', "Change Password Error");
                redirect('change-password');
            }
        }
    }

     public function testmMale()
    {
        $user = $this->authication_model->get_user(2);
        if (!empty($user)) {
            $token = $user->token;
            //check token
            if (empty($token)) {
                $token = generate_token();
                $data = array(
                    'token' => $token
                );
                $this->db->where('id', $user->id);
                $this->db->update('users', $data);
            }

            $data1['token'] = $token;
            // $this->load->view('includes/header',$headerdata);
            $this->load->view('email/email_reset_password', $data1);
            // $this->load->view('includes/footer');


            $data = array(
                'subject' => "Reset Password",
                'to' => $user->email,
                'template_path' => "email/email_reset_password",
                'token' => $token
            );





            /* $data['to'] = "debasish.bigpage@gmail.com";
        $data['subject'] = "Testmail";
        $data['subject'] = "Testmail";
        $data['msg'] = "<h1>Testmail body</h1>";


             $this->email_model->send_email($data);*/
        }
    }
}
