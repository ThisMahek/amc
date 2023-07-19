<?php defined('BASEPATH') or exit('No direct script access allowed');

class Student_controller extends Home_Core_Controller
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
        $data['student_data'] = $this->student_model->get_student_by_id($user->stu_id);
        $data['title'] = "Welcome ".$user->stu_name;
        // approved student
        if(is_approved()){
            $data["notices"] = $this->notice_model->get_latest_posts(5);
            $data["exam_notices"] = $this->examnotice_model->getdashBoardNotice(['course_id'=> $data['student_data']->course_id, 'session_id'=>$data['student_data']->session_id]);
            $data['course'] = $this->course_model->get_course_by_id($data['student_data']->course_id);
            $data['aca_sess'] = $this->academicsession_model->get_academicsession_by_id($data['student_data']->session_id);
        $this->load->view('student/includes/header', $data);
        $this->load->view('student/index',$data);
        $this->load->view('student/includes/footer');
        } else {
            $this->load->view('student/includes/temp_header', $data);
            $this->load->view('student/temp_index', $data);
            $this->load->view('student/includes/footer');

        }

    }

    public function reupload_docs()
    {
        $data['description'] = $this->settings->site_description;
        $data['keywords'] = $this->settings->keywords;
        $user = user();
        $data['user'] = $user;
        $data['student_data'] = $this->student_model->get_student_by_id($user->stu_id);
        $data['title'] = "Re-upload Documents";
        $this->load->view('student/includes/temp_header', $data);
        $this->load->view('student/reuploadDocs', $data);
        $this->load->view('student/includes/footer');
    }

    public function reupload_docs_post()
    {
        $cust =false;
        if(!empty($this->input->post())){
            $user = user();
            $student =$this->student_model->get_student_by_id($user->stu_id);
            $data = array(
                'avatar' => $this->input->post('avatar', true),
                'mp_marksheet_img' => $this->input->post('mp_marksheet_img', true),
                'hs_marksheet_img' => $this->input->post('hs_marksheet_img', true),
                'sign_img' => $this->input->post('sign_img', true),
                'id_prof_img' => $this->input->post('id_prof_img', true),
            );
            if($student->category != "UR"){
                $data['cast_certi_img']= $this->input->post('cast_certi_img', true);
                $cust=true;
            }
            $id = $student->id;
            $user_id = $student->user_id;
            
             if($this->student_model->reupload_docs($data,$id,$user_id,$cust)){
                $this->session->set_flashdata('success', "Data Uploded Successful");
                redirect(student_url());
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
            $data['student_data'] = $this->student_model->get_student_by_id($user->stu_id);
            $data['title'] = "Notice Board";
            $this->load->view('student/includes/header', $data);
            $this->load->view('student/notice-board', $data);
            $this->load->view('student/includes/footer');
        }else{
            redirect(student_url());
        }
    }

    public function get_all_exam_notice()
    {
        $user = user();
        if (is_approved()) {
           
            $data['description'] = $this->settings->site_description;
            $data['keywords'] = $this->settings->keywords;
            $data['user'] = $user;
            $student = $this->student_model->get_student_by_id($user->stu_id);
            $data["notices"] = $this->examnotice_model->get_student_notice($student->course_id,$student->session_id);
            $data['title'] = "Exam Notice Board";
            $this->load->view('student/includes/header', $data);
            $this->load->view('student/exam-notice-board', $data);
            $this->load->view('student/includes/footer');
        } else {
            redirect(student_url());
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
            $this->load->view('student/includes/header', $data);
            $this->load->view('student/exam-notice-details', $data);
            $this->load->view('student/includes/footer');
            }
        } else {
            redirect(student_url());
        }
    }

    public function monthly_tution_fees()
    {
        $user = user();
        if (is_approved()) {
            $data["fees"] = $this->tutionfee_model->get_monthly_tution_fees_by_student($user->stu_id);
            $data['user'] = $user;
            $data['student_data'] = $this->student_model->get_student_by_id($user->stu_id);
            $data['title'] = "Monthly Tution Fees";
            $this->load->view('student/includes/header', $data);
            $this->load->view('student/monthly-fees', $data);
            $this->load->view('student/includes/footer');
        } else {
            redirect(student_url());
        }
    }

    public function monthly_tution_fees_payment($payment_no)
    {
        $user = user();
        if (is_approved()) {
            $fee = $this->tutionfee_model->get_tution_fee(clean_number($payment_no));
            if($fee->status==0){
            $student = $this->student_model->get_student_by_id($user->stu_id);
            $data["fee"] = $fee;
            $data['user'] = $user;
            $data['student_data'] = 
            $data['title'] = "Fee Payment";
            $data['amount'] = $fee->amount;
            $data['description'] = $fee->particulars;
            $data['payment_type'] = "tution-fee";
            $data['user_email'] = $student->email;
            $data['user_mobile'] = $student->mobile;
            $data['student'] = $student;
            $this->load->view('student/includes/header', $data);
            $this->load->view('student/monthly-fee-payment', $data);
            $this->load->view('student/includes/footer');
            }else{
                $this->session->set_flashdata('error', "Payment already maid or not found");
                redirect(student_url(). 'monthly-tution-fees');
            }
        } else {
            redirect(student_url());
        }
    }

    public function marksheet()
    {
        $user = user();
        if (is_approved()) {
           $student = $this->student_model->get_student_by_id($user->stu_id);
            $data['user'] = $user;
            $data['student_data'] = $student;
            $data["marksheet"] = $this->marksheet_model->get_all_marksheets(['student_id'=> $student->id, 'course_id' => $student->course_id, 'session_id' => $student->session_id, 'is_published'=>1]);
            $data['title'] = "Marksheet";
            $this->load->view('student/includes/header', $data);
            $this->load->view('student/marksheet', $data);
            $this->load->view('student/includes/footer');
        } else {
            redirect(student_url());
        }
    }

    public function certificate()
    {
        $user = user();
        if (is_approved()) {
            $data['user'] = $user;
            $student = $this->student_model->get_student_by_id($user->stu_id);
            $data['student_data'] = $student;
            $data['certificats'] = $this->certificate_model->get_all_certificatess(['student_id'=>$student->id, 'course_id'=>$student->course_id, 'session_id'=>$student->session_id]);
            $data['title'] = "Certificate";
            $this->load->view('student/includes/header', $data);
            $this->load->view('student/certificate', $data);
            $this->load->view('student/includes/footer');
        } else {
            redirect(student_url());
        }
    }


}