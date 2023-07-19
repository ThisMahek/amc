<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminstudent_controller extends Admin_Core_Controller
{

    public function __construct()
    {
        parent::__construct();
        //check user
        if (!is_admin()) {
            redirect(base_url() . 'login');
        }
    }

    public function add_student()
    {
        $data['courses'] = $this->course_model->get_all_courses();
        $data['title'] = ("Add Student");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/student/add_student', $data);
        $this->load->view('admin/includes/footer');
        
    }

    public function add_student_post()
    {
        $this->form_validation->set_rules('email', 'Email-id', 'required|xss_clean|max_length[255]|valid_email');
        $this->form_validation->set_rules('course_id', 'Email-id', 'required|xss_clean');
        $this->form_validation->set_rules('session_id', 'Session', 'required|xss_clean');
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
        // $this->form_validation->set_rules('graduate_marksheet_img', 'Graduation Marksheet Image', 'required|xss_clean');
        $this->form_validation->set_rules('id_prof_img', 'Id prove Image', 'required|xss_clean');
        $this->form_validation->set_rules('sign_img', 'Signature', 'required|xss_clean');
        $this->form_validation->set_rules('password', "Password", 'required|xss_clean|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('confurm_password', "Re-type Password", 'required|xss_clean|matches[password]|min_length[4]|max_length[50]');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->student_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if($this->student_model->add()){
                $last_id = $this->db->insert_id();
                //create account for the student
                $userName = $this->student_model->register_account($last_id);
                $last_user_id = $this->db->insert_id();
                //update student Table of ID
                $this->student_model->updateStudentIDS($last_id, $last_user_id);
                $this->student_model->maketransaction($last_id);
                // update student balance
                $student = $this->student_model->get_student_by_id($last_id);
                $this->session->set_flashdata('success', "Student added Successfully with registration number : ". $student->user_name);
                redirect(admin_url() . "students");
            }else{
                $this->session->set_flashdata('error', "Unable to add student");
                redirect('change-password');
                redirect(admin_url() . "students");
            }
        }
    }

    public function students()
    {
        $data['students'] = $this->student_model->get_all_students();
        $data['title'] = ("Students");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/student/students', $data);
        $this->load->view('admin/includes/footer');
    }
    public function pending_students()
    {
        $data['students'] = $this->student_model->get_all_pending_students();
        $data['title'] = ("Pending Approval Students");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/student/pending_students', $data);
        $this->load->view('admin/includes/footer');
    }

    public function dispute_student_list()
    {
        $data['students'] = $this->student_model->get_all_dispute_students();
        $data['title'] = ("Dispute Students");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/student/dispute_students', $data);
        $this->load->view('admin/includes/footer');
    }

    public function reject_student_list()
    {
        $data['students'] = $this->student_model->get_all_reject_students();
        $data['title'] = ("Rejected Students");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/student/reject_students', $data);
        $this->load->view('admin/includes/footer');
    }

    public function approve_student_list()
    {
        $data['students'] = $this->student_model->get_all_approved_students();
        $data['title'] = ("Approved Students");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/student/approved_students', $data);
        $this->load->view('admin/includes/footer');
    }

    public function view_application($id)
    {
        $data['student'] = $this->student_model->get_student_by_id($id);
        $data['course'] = $this->course_model->get_course_by_id($data['student']->course_id);
        $data['trans'] = $this->transaction_model->get_admission_trannsaction_by_userID($data['student']->user_id);
        $data['title'] = ("Application Details");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/student/application_details', $data);
        $this->load->view('admin/includes/footer');
    }


    public function reject_student_app($id)
    {
        clean_number($id);
        $student = $this->student_model->get_student_by_id($id);
        if (!empty($student)) {
            $data['title'] = "Reject admission application";
            $data['student'] = $student;
            $this->load->view('admin/includes/header', $data);
            $this->load->view('admin/student/reject_application', $data);
            $this->load->view('admin/includes/footer', $data);
        } else {
            $this->session->set_flashdata('error', "Invalid User");
            redirect($this->agent->referrer());
        }
    }

    public function reject_student_app_post()
    {
        $this->form_validation->set_rules('rejection_cause', "Rejection Cause", 'required|xss_clean|trim|min_length[5]');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($this->agent->referrer());
        } else {
            $id = clean_number($this->input->post('id', true));
            $student = $this->student_model->get_student_by_id($id);
            $updateArr = array(
                'approval_status' => 2,
            );
            $updateArr2 = array(
                'rejected_on' => date('Y-m-d H:i:s'),
                'status' => 2,
                'rejection_cause' => $this->input->post('rejection_cause', true),
            );
                $this->student_model->updateSingleStudent($updateArr2, $id);
            if ($this->authication_model->updateUsers($updateArr, $student->user_id)) {
                $maildata = array(
                    'subject' => "Admission application rejected",
                    'to_mail' => $student->email,
                    'email_content' => "<P> Dear Student, <br> we are reject your application due to " . $this->input->post('rejection_cause', true) . " please contact with the authority for further details.<br> Thanks<br> Alternative Medicine Center",
                    'email_button_text' => "Find rejection Cause",
                    'email_link' => base_url(). 'login',
                    'cc' => false,
                    'email_type' => 'genaral',
                );
                $this->session->set_userdata('mds_send_email_data', json_encode($maildata));
                $this->session->set_flashdata('success', "Application Rejected");
                redirect('admin/students');
            } else {
                $this->session->set_flashdata('error', "Please Try Again");
                redirect($this->agent->referrer());
            }
        }
    }

    public function edit_application($id)
    {
        clean_number($id);
        $student = $this->student_model->get_student_by_id($id);
        if (!empty($student)) {
            $data['title'] = "Edit Application";
            $data['student'] = $student;
            $data['courses'] = $this->course_model->get_all_courses();
            $this->load->view('admin/includes/header', $data);
            $this->load->view('admin/student/edit_application', $data);
            $this->load->view('admin/includes/footer', $data);
        } else {
            $this->session->set_flashdata('error', "Invalid User");
            redirect($this->agent->referrer());
        }
    }

    public function edit_application_post()
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
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            $id = clean_number($this->input->post('id', true));
            if ($this->student_model->update_student_application($id)) {
                $this->student_model->updateStudentAccount($id);
                $this->session->set_flashdata('success', "Record Updated!");
                redirect(admin_url() . "students");
            } else {
                $this->session->set_flashdata('error', "Unable to update student");
                redirect(admin_url() . "students");
            }
        }
    }

    public function approve_application($id)
    {
        clean_number($id);
        $student = $this->student_model->get_student_by_id($id);
        if (!empty($student)) {
            $data['title'] = "Approve Application";
            $data['student'] = $student;
            $data['sessions'] = $this->academicsession_model->get_academicsession_by_class_id($student->course_id);
            $this->load->view('admin/includes/header', $data);
            $this->load->view('admin/student/approve_application', $data);
            $this->load->view('admin/includes/footer', $data);
        } else {
            $this->session->set_flashdata('error', "Invalid User");
            redirect($this->agent->referrer());
        }
    }

    public function application_approve_post()
    {
        $this->form_validation->set_rules('session_id', 'Session', 'required|xss_clean');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            $id = clean_number($this->input->post('id', true));
            $session_id = clean_number($this->input->post('session_id', true));
            if ($this->student_model->takeAdmission($id, $session_id)) {
                $maildata = array(
                    'student_id' => $id,
                    'email_type' => 'admission_approve',
                );
                $this->session->set_userdata('mds_send_email_data', json_encode($maildata));
                $this->session->set_flashdata('success', "Admission Granted");
                redirect(admin_url() . "approved-student");
            } else {
                $this->session->set_flashdata('error', "unable to take admission");
                redirect(admin_url() . "pending-student");
            }
        }
    }


}