<?php defined('BASEPATH') or exit('No direct script access allowed');

class Franchise_controller extends Home_Core_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!auth_check()) {
            redirect('login');
        }
    }
    /**
     * Index
     */
    public function index()
    {
        get_method();
       
        $data['description'] = $this->settings->site_description;
        $data['keywords'] = $this->settings->keywords;
        $user = user();
        $data['user']= $user;
        $data['franchise_data'] = $this->franchise_model->get_franchise_by_id($user->stu_id);
        $data['title'] = "Welcome ".$user->stu_name;
        $data['state'] = $this->config->item('state');
        $data["courses_select"] = $this->course_model->get_courses_all_home();
        // approved franchise
        $data['trans'] = $this->transaction_model->get_admission_trannsaction_by_userID($data['franchise_data']->user_id,'franchise_registeration');
        $data['fees'] = $this->franchise_model->get_franchise_fees();
        $data['courses'] = $this->course_model->get_course_by_id(json_decode($data['franchise_data']->course_id,true));
        if(is_approved())
        { 
           $data["notices"] = $this->notice_model->get_latest_posts(5); 
           $this->load->view('franchise/includes/header', $data);
           $this->load->view('franchise/index',$data);
           $this->load->view('franchise/includes/footer');
        } 
        else 
        {
           $this->load->view('franchise/includes/temp_header', $data);
           $this->load->view('franchise/temp_index', $data);
           $this->load->view('franchise/includes/footer');
        }
    }
    public function update_franchise_post()
    {
        $user = user();
        $this->form_validation->set_rules('franchise_name', 'Franchise Name', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_address_1', 'Franchise address line 1', 'required|xss_clean');
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
        $this->form_validation->set_rules('email_verification', 'Please Verified Email.', 'required|xss_clean');
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
            $franchise_id = $user->stu_id;
            $data['franchise_id'] = $franchise_id;
            $data['status'] = 1;
            if($this->franchise_model->addUpdateFranchise($data,'edit'))
            {
                $franchise = $this->franchise_model->get_franchise_by_id($franchise_id);
                $this->session->set_flashdata('success', "Franchise Updated Successfully with registration number : ". $franchise->user_name);
                redirect(base_url() . "franchise-portal");
            }
            else
            {
                $this->session->set_flashdata('error', "Unable to add franchise");
                //redirect('change-password');
                redirect(base_url() . "franchise-portal");
            }
        }
    } 
    public function reupload_docs()
    {
        $data['description'] = $this->settings->site_description;
        $data['keywords'] = $this->settings->keywords;
        $user = user();
        $data['user'] = $user;
        $data['franchise_data'] = $this->franchise_model->get_franchise_by_id($user->stu_id);
        $data['title'] = "Re-upload Documents";
        $this->load->view('franchise/includes/temp_header', $data);
        $this->load->view('franchise/reuploadDocs', $data);
        $this->load->view('franchise/includes/footer');
    }

    public function reupload_docs_post()
    {
        $cust =false;
        if(!empty($this->input->post())){
            $user = user();
            $franchise =$this->franchise_model->get_franchise_by_id($user->stu_id);
            $data = array(
                'avatar' => $this->input->post('avatar', true),
                'mp_marksheet_img' => $this->input->post('mp_marksheet_img', true),
                'hs_marksheet_img' => $this->input->post('hs_marksheet_img', true),
                'sign_img' => $this->input->post('sign_img', true),
                'id_prof_img' => $this->input->post('id_prof_img', true),
            );
            if($franchise->category != "UR"){
                $data['cast_certi_img']= $this->input->post('cast_certi_img', true);
                $cust=true;
            }
            $id = $franchise->id;
            $user_id = $franchise->user_id;
            
             if($this->franchise_model->reupload_docs($data,$id,$user_id,$cust)){
                $this->session->set_flashdata('success', "Data Uploded Successful");
                redirect(franchise_url());
            } else{
                $this->session->set_flashdata('error', "some issue. try again!");
                redirect($this->agent->referrer());
            } 
            
        }else{
            $this->session->set_flashdata('error', "No document uploded");
            redirect($this->agent->referrer());
        }
    }

    public function get_all_notice()
    {
        $user = user();
        if (is_approved()) {
            $data["notices"] = $this->notice_model->get_posts();
            $data['description'] = $this->settings->site_description;
            $data['keywords'] = $this->settings->keywords;
            $data['user'] = $user;
            $data['franchise_data'] = $this->franchise_model->get_franchise_by_id($user->stu_id);
            $data['title'] = "Notice Board";
            $this->load->view('franchise/includes/header', $data);
            $this->load->view('franchise/notice-board', $data);
            $this->load->view('franchise/includes/footer');
        }else{
            redirect(franchise_url());
        }
    }

    public function get_all_exam_notice()
    {
        $user = user();
        if (is_approved()) {
           
            $data['description'] = $this->settings->site_description;
            $data['keywords'] = $this->settings->keywords;
            $data['user'] = $user;
            $franchise = $this->franchise_model->get_franchise_by_id($user->stu_id);
            $data["notices"] = $this->examnotice_model->get_franchise_notice($franchise->course_id,$franchise->session_id);
            $data['title'] = "Exam Notice Board";
            $this->load->view('franchise/includes/header', $data);
            $this->load->view('franchise/exam-notice-board', $data);
            $this->load->view('franchise/includes/footer');
        } else {
            redirect(franchise_url());
        }
    }

    public function exam_notice_details($slug)
    {
        $user = user();
        if (is_approved()) {
            $slug = clean_slug($slug);
            $data["notice"] = $this->examnotice_model->get_post_by_slug($slug);
            if (empty($data["notice"])) {
                redirect('error-404');
            } else {
            $data['description'] = $this->settings->site_description;
            $data['keywords'] = $this->settings->keywords;
            $data['title'] = $data['notice']->title;
            $this->load->view('franchise/includes/header', $data);
            $this->load->view('franchise/exam-notice-details', $data);
            $this->load->view('franchise/includes/footer');
            }
        } else {
            redirect(franchise_url());
        }
    }

    public function monthly_tution_fees()
    {
        $user = user();
        if (is_approved()) {
            $data["fees"] = $this->tutionfee_model->get_monthly_tution_fees_by_franchise($user->stu_id);
            $data['user'] = $user;
            $data['franchise_data'] = $this->franchise_model->get_franchise_by_id($user->stu_id);
            $data['title'] = "Monthly Tution Fees";
            $this->load->view('franchise/includes/header', $data);
            $this->load->view('franchise/monthly-fees', $data);
            $this->load->view('franchise/includes/footer');
        } else {
            redirect(franchise_url());
        }
    }

    public function monthly_tution_fees_payment($payment_no)
    {
        $user = user();
        if (is_approved()) {
            $fee = $this->tutionfee_model->get_tution_fee(clean_number($payment_no));
            if($fee->status==0){
            $franchise = $this->franchise_model->get_franchise_by_id($user->stu_id);
            $data["fee"] = $fee;
            $data['user'] = $user;
            $data['franchise_data'] = 
            $data['title'] = "Fee Payment";
            $data['amount'] = $fee->amount;
            $data['description'] = $fee->particulars;
            $data['payment_type'] = "tution-fee";
            $data['user_email'] = $franchise->email;
            $data['user_mobile'] = $franchise->mobile;
            $data['franchise'] = $franchise;
            $this->load->view('franchise/includes/header', $data);
            $this->load->view('franchise/monthly-fee-payment', $data);
            $this->load->view('franchise/includes/footer');
            }else{
                $this->session->set_flashdata('error', "Payment already maid or not found");
                redirect(franchise_url(). 'monthly-tution-fees');
            }
        } else {
            redirect(franchise_url());
        }
    }

    public function marksheet()
    {
        $user = user();
        if (is_approved()) {
           $franchise = $this->franchise_model->get_franchise_by_id($user->stu_id);
            $data['user'] = $user;
            $data['franchise_data'] = $franchise;
            $data["marksheet"] = $this->marksheet_model->get_all_marksheets(['franchise_id'=> $franchise->id, 'course_id' => $franchise->course_id, 'session_id' => $franchise->session_id, 'is_published'=>1]);
            $data['title'] = "Marksheet";
            $this->load->view('franchise/includes/header', $data);
            $this->load->view('franchise/marksheet', $data);
            $this->load->view('franchise/includes/footer');
        } else {
            redirect(franchise_url());
        }
    }

    public function certificate()
    {
        $user = user();
        if (is_approved()) {
            $data['user'] = $user;
            $franchise = $this->franchise_model->get_franchise_by_id($user->stu_id);
            $data['franchise_data'] = $franchise;
            $data['certificats'] = $this->certificate_model->get_all_certificatess(['franchise_id'=>$franchise->id, 'course_id'=>$franchise->course_id, 'session_id'=>$franchise->session_id]);
            $data['title'] = "Certificate";
            $this->load->view('franchise/includes/header', $data);
            $this->load->view('franchise/certificate', $data);
            $this->load->view('franchise/includes/footer');
        } else {
            redirect(franchise_url());
        }
    }
    public function view_profile()
    {
        $user = user();
        $franchise_id = $user->stu_id;
        $data['franchise'] = $this->franchise_model->get_franchise_by_id($franchise_id);
        $data['course'] = $this->course_model->get_course_by_id($data['franchise']->course_id);
        $data['trans'] = $this->transaction_model->get_admission_trannsaction_by_userID($data['franchise']->user_id,'franchise_registeration');
        $data['title'] = ("Application Details");
        $headerview = "temp_header";
        if(is_approved())
        { 
           $headerview = "header";
        } 
        $this->load->view('franchise/includes/'.$headerview, $data);
        $this->load->view('admin/franchise/application_details', $data);
        $this->load->view('franchise/includes/footer');
    }
    public function update_view()
    {
        $user = user();
        $franchise_id = $user->stu_id;
        $franchise = $this->franchise_model->get_franchise_by_id($franchise_id);
        $headerview = "temp_header";
        if(is_approved())
        { 
           $headerview = "header";
        } 
        if (!empty($franchise)) {
            $data['title'] = "Edit Application";
            $data['franchise_data'] = $franchise;
            $data['courses'] = $this->course_model->get_all_courses();
            $data['state'] = $this->config->item('state');
            $this->load->view('franchise/includes/'.$headerview, $data);
            $this->load->view('admin/franchise/edit_application', $data);
            $this->load->view('franchise/includes/footer', $data);
        } else {
            $this->session->set_flashdata('error', "Invalid User");
            redirect($this->agent->referrer());
        } 
    }
    public function edit_application_post()
    {
        $user = user();
        $this->form_validation->set_rules('franchise_name', 'Franchise Name', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_address_1', 'Franchise address line 1', 'required|xss_clean');
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
        if ($this->form_validation->run() === false) 
        {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->franchise_model->input_values());
            redirect($this->agent->referrer());
        } 
        else 
        {
            $data = $this->franchise_model->input_values();
            $data['franchise_id'] = $this->input->post('franchise_id',true);
            $data['status'] = 1;
            if($this->franchise_model->addUpdateFranchise($data,'edit'))
            {
                $franchise = $this->franchise_model->get_franchise_by_id($franchise_id);
                $this->session->set_flashdata('success', "Franchise Updated Successfully with registration number : ". $franchise->user_name);
                redirect(franchise_url() . "view_profile");
            }
            else
            {
                $this->session->set_flashdata('error', "Unable to add franchise");
                //redirect('change-password');
                redirect($this->agent->referrer());
            }
        }
    }


}