<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home_controller extends Home_Core_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Index
     */
    public function index()
    {
        get_method();
        $data['title'] = $this->settings->homepage_title;
        $data['description'] = $this->settings->site_description;
        $data['keywords'] = $this->settings->keywords;
        $data["slider_items"] = $this->slider_model->get_slider_items();
        $data["partners"] = $this->partner_model->get_all_traning_partners();
        $data["notices"] = $this->notice_model->get_posts();
        $data["jobs"] = $this->jobs_model->get_posts_all();
        $data['professors'] = $this->team_model->get_teams_all_home();
        $data["about"] = $this->homepage_model->get_about_data();
        $data["counters"] = $this->homepage_model->get_counter_data();
        $data["testiminials"] = $this->testimonial_model->get_testimonialss_all_home();
        $data["courses"] = $this->course_model->get_courses_all_home();
        $this->load->view('partials/header', $data);
        $this->load->view('homepage',$data);
        $this->load->view('partials/footer'); 
    }


  
    /**
     * Contact
     */
    public function contact()
    {
        get_method();
        $data['title'] = 'contact us';
        $data['description'] = 'contact us' . " - " . $this->app_name;
        $data['keywords'] = 'contact_us' . "," . $this->app_name;
        $data['breadcrumb'] = 'Contact Us';
        $this->load->view('partials/header', $data);
        $this->load->view('contact', $data);
        $this->load->view('partials/footer');
    }
    /**
     * Contact Page Post
     */
    public function contact_post()
    {
        post_method();
        //validate inputs
        $this->form_validation->set_rules('name', "Name", 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('email', "Email Address", 'required|xss_clean|max_length[200]|valid_email');
        $this->form_validation->set_rules('message', "Message", 'required|xss_clean|max_length[5000]');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $this->session->set_flashdata('form_data', $this->contact_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if (!$this->recaptcha_verify_request()) {
                $this->session->set_flashdata('form_data', $this->contact_model->input_values());
                $this->session->set_flashdata('error', "Please confirm that you are not a robot!");
                redirect($this->agent->referrer());
            } else {
                if ($this->contact_model->add_contact_message()) {
                    $this->session->set_flashdata('success', "Message Send Succesfuly");
                    redirect($this->agent->referrer());
                } else {
                    $this->session->set_flashdata('form_data', $this->contact_model->input_values());
                    $this->session->set_flashdata('error', "Unable to send contact message!");
                    redirect($this->agent->referrer());
                }
            }
        }
    }

    /**
     * Contact
     */
    public function placements()
    {
        get_method();
        $data['title'] = 'Job Placement';
        $data['description'] = 'Job Placement' . " - " . $this->app_name;
        $data['keywords'] = 'Job Placement' . "," . $this->app_name;
        $data['breadcrumb'] = 'Job Placement';
        $this->load->view('partials/header', $data);
        $this->load->view('job_placement', $data);
        $this->load->view('partials/footer');
    }

      /*
    *-------------------------------------------------------------------------------------------------
    * Registration
    *-------------------------------------------------------------------------------------------------
    */

    public function register()
    {
        get_method();
        $data['title'] = 'New Registration';
        $data['description'] = 'New Registration' . " - " . $this->app_name;
        $data['keywords'] = 'New Registration' . "," . $this->app_name;
        $data['breadcrumb'] = 'New Registration';
        $data['courses'] = $this->course_model->get_all_courses();
        $this->load->view('partials/header', $data);
        $this->load->view('register', $data);
        $this->load->view('partials/footer');
    }
    public function franchises_register()
    {
        get_method();
        $franchise_and_user_idenc = $this->uri->segment(2);
        $franchise_and_user_id = base64_decode($franchise_and_user_idenc);
        $afranchise_and_user_id = explode(',', $franchise_and_user_id);
        //echo $franchise_and_user_id;
        $aFranchiseUserId = explode(',', $franchise_and_user_id);
        $franchise_id = $aFranchiseUserId[0];
        $user_id = $aFranchiseUserId[1];
        $data['franchise_data'] = $this->franchise_model->get_franchise_by_id($franchise_id);
        $data['state'] = $this->config->item('state');
        $data['title'] = 'New Franchise Registration';
        $data['description'] = 'New Franchise Registration' . " - " . $this->app_name;
        $data['keywords'] = 'New Franchise Registration' . "," . $this->app_name;
        $data['breadcrumb'] = 'New Franchise Registration';
        $data['courses'] = $this->course_model->get_all_courses();
        $this->load->view('partials/header', $data);
        $this->load->view('franchise_register', $data);
        $this->load->view('partials/footer');
    }
    public function franchises_register_post()
    {
        $aResponse = array('status'=>false);
        $this->form_validation->set_rules('email', 'Email-id', 'required|xss_clean|max_length[255]|valid_email|is_unique[users.username]');
        $this->form_validation->set_rules('franchise_name', 'Franchise Name', 'required|xss_clean|max_length[255]');
        $this->form_validation->set_rules('password', "Password", 'required|xss_clean|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('confirm_password', "Re-type Password", 'required|xss_clean|matches[password]|min_length[4]|max_length[50]');
        $captcha_success = false;
        if(isset($_REQUEST['g-recaptcha-response']) && !empty($_REQUEST['g-recaptcha-response']))
        {
            $url = "https://www.google.com/recaptcha/api/siteverify";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, array('secret' =>'6Lf76SUkAAAAAA1jG4m5wEbXvRcAXJi5ucW9SZ6j','response' =>$_REQUEST['g-recaptcha-response']));
            $response = curl_exec($ch);
            curl_close($ch);

            $curlResponse = json_decode($response);
            $captcha_success = $curlResponse->success;
        }

        if (!$captcha_success) 
        {
            $aResponse['message'] = "Please validate the captcha!";
        }
        else if ($this->form_validation->run() === false) 
        {
            $aResponse['aErrors'] = array(
                'franchise_name' => form_error('franchise_name', '<p class="mt-3 text-danger">', '</p>'),
                'email' => form_error('email', '<p class="mt-3 text-danger">', '</p>'),
                'password' => form_error('password', '<p class="mt-3 text-danger">', '</p>'),
                'confirm_password' => form_error('confirm_password', '<p class="mt-3 text-danger">', '</p>'),
                'code' => form_error('code', '<p class="mt-3 text-danger">', '</p>')
            );
            
        } 
        else 
        {
            if ($this->franchise_model->add()) 
            {
                $last_id = $this->db->insert_id();
                $userName = $this->franchise_model->register_account($last_id);
                $last_user_id = $this->db->insert_id();
                $this->franchise_model->updateFranchiseIDS($last_id,$last_user_id);
                $franchise_and_user_id = base64_encode($last_id.','.$last_user_id);
                $aResponse = array('status'=>true,'message'=>'Registration Succesfuly.','franchise_and_user_id'=>$franchise_and_user_id);
            } 
            else 
            {
                $aResponse['message'] = "Don't Register ";
            }
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($aResponse)); 
    }
    public function edit_application_post()
    {
        $this->form_validation->set_rules('franchise_name', 'Franchise Name', 'required|xss_clean');
       /* $this->form_validation->set_rules('franchise_address_1', 'Franchise address line 1', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_district', 'Franchise distirct', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_state', 'Franchise address state', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_pin', 'Franchise address pin', 'required|xss_clean');
        $this->form_validation->set_rules('president_name', 'President Name', 'required|xss_clean');
        $this->form_validation->set_rules('president_aadhar_number', 'President Aadhar No.', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_pan_number', 'Franchise Pan Number', 'required|xss_clean');
        $this->form_validation->set_rules('president_dob', 'President Date Of Birth', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_contact', 'Franchise Contact', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_email', 'Franchise Email', 'required|xss_clean');
        $this->form_validation->set_rules('course_id[]', 'Coure Id', 'required|xss_clean');
        $this->form_validation->set_rules('email_verification', 'Please Verified Email.', 'required|xss_clean');*/
        $this->form_validation->set_rules('accept_term_and_condition', 'Accept Term Condition', 'required|xss_clean');
        
        if ($this->form_validation->run() === false) 
        {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->franchise_model->input_values());
            redirect($this->agent->referrer());
        } 
        else 
        {
            $data = $this->franchise_model->input_values();
            $data['franchise_id'] = $this->input->post('franchise_id', true);
            $data['status'] = 1;
            $user_id = $this->input->post('user_id', true);
            if($this->franchise_model->addUpdateFranchise($data,'edit'))
            {
                $franchise = $this->franchise_model->get_franchise_by_id($data['franchise_id']);
                $maildata = array(
                    'franchise_id' => $data['franchise_id'],
                    'email_type' => 'franchise_welcome',
                );
                $this->session->set_userdata('mds_send_email_data', json_encode($maildata));
                $this->session->set_flashdata('success', "Franchise added Successfully with center code : ". $franchise->reg_no."<br><strong> NOTE- Agreement Copy will sent through mail to the Coordinator (in PDF Format) & Coordinator will have to take printout and do a sign on Agreement with Center stamp and sent through post to The Registrar SSGIPS, Agaganj, Tikri, Ayodhya-224195.  </strong>");
                redirect($this->agent->referrer());
            }
            else 
            {
                $this->session->set_flashdata('success', ": Unable To Add franchise Try Again. ");
                redirect($this->agent->referrer());
            }
        }
    }
    public function register_post()
    {
        $this->form_validation->set_rules('email', 'Email-id', 'required|xss_clean|max_length[255]|valid_email');
        $this->form_validation->set_rules('course_id', 'Email-id', 'required|xss_clean');
        $this->form_validation->set_rules('stu_name', 'Student Name', 'required|xss_clean');
        $this->form_validation->set_rules('f_name', 'Father\'s name', 'required|xss_clean');
        $this->form_validation->set_rules('m_name', 'Mother\'s name', 'required|xss_clean');
        $this->form_validation->set_rules('gender', 'Gender', 'required|xss_clean');
        $this->form_validation->set_rules('dob', 'Date of birth', 'required|xss_clean');
        $this->form_validation->set_rules('religion', 'Religion', 'required|xss_clean');
        $this->form_validation->set_rules('category', 'Category', 'required|xss_clean');
        $this->form_validation->set_rules('mobile', 'mobile', 'required|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'required|xss_clean|valid_email');
        $this->form_validation->set_rules('qualification', 'qualification', 'required|xss_clean');
        $this->form_validation->set_rules('id_prove', 'ID prove', 'required|xss_clean');
        $this->form_validation->set_rules('present_add_add_1', 'present address line 1', 'required|xss_clean');
        $this->form_validation->set_rules('present_add_district', 'present distirct', 'required|xss_clean');
        $this->form_validation->set_rules('present_add_state', 'present address state', 'required|xss_clean');
        $this->form_validation->set_rules('present_add_pin', 'present address pin', 'required|xss_clean');
        $this->form_validation->set_rules('premanemt_add_1', 'Permanent address line 1', 'required|xss_clean');
        $this->form_validation->set_rules('premanemt_add_district', 'Permanent distirct', 'required|xss_clean');
        $this->form_validation->set_rules('premanemt_add_state', 'Permanent address state', 'required|xss_clean');
        $this->form_validation->set_rules('premanemt_add_pin', 'Permanent address pin', 'required|xss_clean');
        $this->form_validation->set_rules('avatar', 'Student Image', 'required|xss_clean');
        $this->form_validation->set_rules('mp_marksheet_img', 'Intermediate Marksheet Image', 'required|xss_clean');
        $this->form_validation->set_rules('hs_marksheet_img', 'Highschool Marksheet Image', 'required|xss_clean');
        $this->form_validation->set_rules('id_prof_img', 'Id prove Image', 'required|xss_clean');
        $this->form_validation->set_rules('sign_img', 'Signature', 'required|xss_clean');
        $this->form_validation->set_rules('password', "Password", 'required|xss_clean|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('confurm_password', "Re-type Password", 'required|xss_clean|matches[password]|min_length[4]|max_length[50]');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->student_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->student_model->add()) {
                $last_id = $this->db->insert_id();
                //create account for the student
                $userName = $this->student_model->register_account($last_id);
                $last_user_id = $this->db->insert_id();
                //update student Table of ID
                $this->student_model->updateStudentIDS($last_id,$last_user_id);
                //get student details 
                $student = $this->student_model->get_student_by_id($last_id);
                $this->session->set_flashdata('success', "Form Successfully Submited");
                redirect(base_url(). "admission-payment/". $student->user_name);
            } else {
                $this->session->set_flashdata('error', "Unable to add student");
                redirect($this->agent->referrer());
            }
        }
    }

    public function registration_compleated($user_name)
    {
        get_method();
        $data['title'] = 'Registration Compleate';
        $data['description'] = 'Registration Compleate' . " - " . $this->app_name;
        $data['keywords'] = 'Registration Compleate' . "," . $this->app_name;
        $data['breadcrumb'] = 'Registration Compleate';
        $data['student'] = $this->student_model->get_student_by_username($user_name);
        $data['course'] = $this->course_model->get_course_by_id($data['student']->course_id);
        $data['trans'] = $this->transaction_model->get_admission_trannsaction_by_userID($data['student']->user_id);
        $this->load->view('partials/header', $data);
        $this->load->view('admission-thankyou', $data);
        $this->load->view('partials/footer');

    }

    /*
    *-------------------------------------------------------------------------------------------------
    * gallery
    *-------------------------------------------------------------------------------------------------
    */

    public function image_gallery()
    {
        get_method();
        $data['title'] = ('Image Gallery') . '|' . $this->settings->homepage_title;
        $data['breadcrumb'] = ('Image Gallery');
        $data['description'] = $this->settings->site_description;
        $data['keywords'] = $this->settings->keywords;
        $total_image_count = $this->image_gallery_model->get_posts_count();
        $pagination = $this->paginate(generate_url("image-gallery"), $total_image_count, $this->image_gallery_per_page);
        $data['images'] = $this->image_gallery_model->get_paginated_posts($pagination['offset'], $pagination['per_page']);
        $this->load->view('partials/header', $data);
        $this->load->view('gallery/image_gallery');
        $this->load->view('partials/footer');
    }

    public function video_gallery()
    {
        get_method();
        $data['title'] = ('video gallery') . '|' . $this->settings->homepage_title;
        $data['breadcrumb'] = ('video gallery');
        $data['description'] = $this->settings->site_description;
        $data['keywords'] = $this->settings->keywords;
        $total_video_count = $this->video_gallery_model->get_posts_count();
        $pagination = $this->paginate(generate_url("video-gallery"), $total_video_count, $this->video_gallery_per_page);
        $data['videos'] = $this->video_gallery_model->get_paginated_posts($pagination['offset'], $pagination['per_page']);
        $this->load->view('partials/header', $data);
        $this->load->view('gallery/video_gallery');
        $this->load->view('partials/footer');
    }

     /*
    *-------------------------------------------------------------------------------------------------
    * Result SECTION 
    *-------------------------------------------------------------------------------------------------
    */
    public function result()
    {
        get_method();
        $data['title'] = 'Result';
        $data['description'] = 'Result' . " - " . $this->app_name;
        $data['keywords'] = 'Result' . "," . $this->app_name;
        $data['breadcrumb'] = 'Result';
        $this->load->view('partials/header', $data);
        $this->load->view('result', $data);
        $this->load->view('partials/footer');
    }

    public function result_search()
    {
        post_method();
        $this->form_validation->set_rules('user_name', "Registration No", 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('dob', "Date Of Bitrh", 'required|xss_clean|max_length[10]');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($this->agent->referrer());
        } else {
            if (!$this->recaptcha_verify_request()) {
                $this->session->set_flashdata('error', "Please confirm that you are not a robot!");
                redirect($this->agent->referrer());
            } else {
                $this->load->model('oldMarksheet_model');
                $user_name = $this->input->post('user_name',true);
                $dob = $this->input->post('dob',true);
                $student = $this->student_model->get_student_condition(['user_name'=> $user_name, 'dob'=>$dob]);
                $old_student = $this->oldMarksheet_model->getMarksheet(['reg_no'=> $user_name, 'dob'=>$dob]);
                if(!empty($student)){
                    $data['title'] = 'Result';
                    $data['description'] = 'Result' . " - " . $this->app_name;
                    $data['keywords'] = 'Result' . "," . $this->app_name;
                    $data['breadcrumb'] = 'Result';
                    $data["marksheet"] = $this->marksheet_model->get_all_marksheets(['student_id' => $student->id, 'course_id' => $student->course_id, 'session_id' => $student->session_id, 'is_published' => 1]);
                    $data["student"]=$student;
                    $this->load->view('partials/header', $data);
                    //$this->load->view('result_data', $data);
                    $this->load->view('new_result_data', $data);
                    $this->load->view('partials/footer');
                }elseif(!empty($old_student)){
                    $data['title'] = 'Result';
                    $data['description'] = 'Result' . " - " . $this->app_name;
                    $data['keywords'] = 'Result' . "," . $this->app_name;
                    $data['breadcrumb'] = 'Result';
                    $data["student"] = $old_student;
                    $data["marks6"] = $this->oldMarksheet_model->getWhere(['old_marsheet_id'=>$old_student->id,'year'=>6]);
                    $data["marks1"] = $this->oldMarksheet_model->getWhere(['old_marsheet_id'=>$old_student->id,'year'=>1]);
                    $data["marks2"] = $this->oldMarksheet_model->getWhere(['old_marsheet_id'=>$old_student->id,'year'=>2]);
                    $data["marks3"] = $this->oldMarksheet_model->getWhere(['old_marsheet_id'=>$old_student->id,'year'=>3]);
                    $this->load->view('partials/header', $data);
                    $this->load->view('old_result', $data);
                    $this->load->view('partials/footer');
                }else{
                    $this->session->set_flashdata('error', "No such data found!!");
                    redirect($this->agent->referrer());
                }

            }
        } 
    }
    
    /*
    *-------------------------------------------------------------------------------------------------
    * FRANCHISE SECTION 
    *-------------------------------------------------------------------------------------------------
    */
    public function search_franchise()
    {
        get_method();
        $data['title'] = 'Search Franchise';
        $data['description'] = 'Search Franchise' . " - " . $this->app_name;
        $data['keywords'] = 'Search Franchise' . "," . $this->app_name;
        $data['breadcrumb'] = 'Search Franchise';
        $this->load->view('partials/header', $data);
        $this->load->view('franchise_search', $data);
        $this->load->view('partials/footer');
    }

    public function result_search_result()
    {
        echo 
        post_method();
        $this->form_validation->set_rules('open_search', "Search  Fields", 'required|xss_clean|max_length[200]');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($this->agent->referrer());
        } else {
            if (!$this->recaptcha_verify_request()) 
            {
                $this->session->set_flashdata('error', "Please confirm that you are not a robot!");
                redirect($this->agent->referrer());
            } else { 
                $open_search = $this->input->post('open_search',true);
                $where = 'franchise_email LIKE "%'.$open_search.'%" OR franchise_name LIKE "%'.$open_search.'%" OR enroll_no LIKE "%'.$open_search.'%"';
                $franchise = $this->franchise_model->get_franchise_condition($where);
                if(!empty($franchise))
                {
                    $data['title'] = 'Franchise Search Result';
                    $data['description'] = 'Franchise Search Result' . " - " . $this->app_name;
                    $data['keywords'] = 'Franchise Search Result' . "," . $this->app_name;
                    $data['breadcrumb'] = 'Franchise Search Result';
                    $data["franchise"]=$franchise;
                    $this->load->view('partials/header', $data);
                    $this->load->view('franchise_search_result', $data);
                    $this->load->view('partials/footer');
                }
                else
                {
                    $this->session->set_flashdata('error', "No such data found!!");
                    redirect($this->agent->referrer());
                }

            }
        } 
    }

    /*
    *-------------------------------------------------------------------------------------------------
    * ANY SECTION 
    *-------------------------------------------------------------------------------------------------
    */
    public function any($slug)
    {
        get_method();
        $slug = clean_slug($slug);
        if (empty($slug)) {
            redirect(base_url());
        }
        $data['page'] = $this->page_model->get_page($slug);
        //check the CMS or NOT
        if (!empty($data['page'])) {
            $this->page($data['page']);
        } else {
          
                $this->error_404();
          
        }
    }

    /**
     * Page
     */
    private function page($page)
    {
        $data['page'] = $page;
        //if not exists
        if (empty($data['page']) || $data['page'] == null) {
            $this->error_404();
        } else {
            $data['title'] = $data['page']->title;
            $data['description'] = $data['page']->page_description;
            $data['keywords'] = $data['page']->page_keywords;
            $this->load->view('partials/header', $data);
            $this->load->view('cms-page', $data);
            $this->load->view('partials/footer');
        }
    }

    //download post file
    public function download_post_file()
    {
        post_method();
        $path = $this->input->post('path', true);
        $file = $this->input->post('file_name', true);
        if (!empty($file)) {
            $this->load->helper('download');
            force_download(FCPATH . $path . $file, NULL);
        }
        redirect($this->agent->referrer());
    }

    // 404 
    public function error_404()
    {
        get_method();
        header("HTTP/1.0 404 Not Found");
        $data['title'] = "Error 404";
        $data['description'] = "Error 404";
        $data['keywords'] = "error,404";
        $data['e404'] = "error,404";

        $this->load->view('partials/header', $data);
        $this->load->view('errors/error_404');
        $this->load->view('partials/footer');
    }

    /*
    *-------------------------------------------------------------------------------------------------
    * professor Sections
    *-------------------------------------------------------------------------------------------------
    */

    public function all_professor()
    {
        get_method();
        // $this->load->model('team_model');
        $data['title'] = ('Our Faculties');
        $data['description'] = ('Our Faculties') . " - " . $this->app_name;
        $data['keywords'] = ('Our Faculties') . "," . $this->app_name;
        $data['professors'] = $this->team_model->get_teams_all();
        $data['breadcrumb'] = ('Our Faculties');
        $this->load->view('partials/header', $data);
        $this->load->view('professors', $data);
        $this->load->view('partials/footer');
    }

    /**
     * Single Team Member
     */
    public function professor_details($slug)
    {
        get_method();
        $slug = clean_slug($slug);
        //index page
        if (empty($slug)) {
            redirect(base_url());
        }
        // $this->load->model('team_model');
        $data['member'] = $this->team_model->get_team_by_slug($slug);
        //if not exists
        if (empty($data['member']) || $data['member'] == null) {
            $this->error_404();
        } else {
            $data['title'] = $data['member']->member_name;
            $data['description'] = $data['member']->meta_description;
            $data['keywords'] = $data['member']->meta_keywords;
            $data['breadcrumb'] = $data['member']->member_name;
            $this->load->view('partials/header', $data);
            $this->load->view('single_professor_profile', $data);
            $this->load->view('partials/footer');
        }
    }

    public function single_course($slug)
    {
        get_method();
        $slug = clean_slug($slug);
        $syllebus=[];
        //index page
        if (empty($slug)) {
            redirect(base_url());
        }
        // $this->load->model('team_model');
        $data['course'] = $this->course_model->get_course($slug);
        //if not exists
        if (empty($data['course']) || $data['course'] == null) {
            $this->error_404();
        } else {
            
            $data['title'] = $data['course']->title;
            $data['description'] = $data['course']->page_description;
            $data['keywords'] = $data['course']->page_keywords;
            $data['breadcrumb'] = $data['course']->title;
            $year = $data['course']->duration_year;
            for ($i=1; $i <=$year ; $i++) { 
                $sildata =$this->subject_model->getSubjectByCourseYear($data['course']->id, $i);
                if(!empty($sildata)){
                    
                    $syllebus[$i] = $sildata;
                }else{
                    
                }
            }
            $data['syllebus']= $syllebus;
            
            $this->load->view('partials/header', $data);
            $this->load->view('course_details', $data);
            $this->load->view('partials/footer');
        }
    }

    /**
     * Single Team Member
     */
    public function notice_details($slug)
    {
        get_method();
        $slug = clean_slug($slug);
        //index page
        if (empty($slug)) {
            redirect(base_url());
        }
        
        $data['notice'] = $this->notice_model->get_post_by_slug($slug);
        
        //if not exists
        if (empty($data['notice']) || $data['notice'] == null) {
            $this->error_404();
        } else {
            $data['title'] = $data['notice']->title;
            $data['description'] = $data['notice']->meta_description;
            $data['keywords'] = $data['notice']->keywords;
            $data['breadcrumb'] = $data['notice']->title;
            $data["files"] = $this->notice_files_model->getNoticeFiles($data['notice']->id);
            $data['related_posts'] = $this->notice_model->get_related_posts( $data["notice"]->id);
            $this->load->view('partials/header', $data);
            $this->load->view('notice_details', $data);
            $this->load->view('partials/footer');
        }
    }

    public function job_post($category_slug, $slug)
    {
        get_method();
        $slug = clean_slug($slug);
        $data["post"] = $this->jobs_model->get_post_by_slug($slug);
        if (empty($data["post"])) {
            $this->error_404();
        } else {
            $data['title'] = $data["post"]->title;
            $data['description'] = $data["post"]->meta_description;
            $data['keywords'] = $data["post"]->keywords;
            $data['breadcrumb'] = $data['post']->title;
            $data['related_posts'] = $this->jobs_model->get_related_posts($data['post']->category_id, $data["post"]->id);
            $data["files"] = $this->job_files_model->get_job_files($data['post']->id);
            $this->load->view('partials/header', $data);
            $this->load->view('job_details', $data);
            $this->load->view('partials/footer');
        }
    }



}