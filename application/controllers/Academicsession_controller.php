<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Academicsession_controller extends Admin_Core_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!auth_check()) {
            redirect('login');
        }
        if (!is_admin() && !is_franchise()) {
            redirect('dashboard');
        }
    }

    public function sessions()
    {
        $data['title'] = "All sessions";
       
        $data['sessions'] = $this->academicsession_model->get_all_academicsession();
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/session/index', $data);
        $this->load->view('admin/includes/footer');
    }

    /**
     * Add Page
     */
    public function add_sessions()
    {
        $data['title'] = "Add sessions";
        $data['courses'] = $this->course_model->get_all_courses();
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/session/add_session', $data);
        $this->load->view('admin/includes/footer');
    }

    public function save_sessions()
    {
        $this->form_validation->set_rules('session_name', "session Name", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('class_id', "Course", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('duration_month', "Course Duration", 'required|xss_clean');
        $this->form_validation->set_rules('total_fees', "Total Course Fee", 'required|xss_clean');
        $this->form_validation->set_rules('admission_fees', "Admission Fees", 'required|xss_clean');
        $this->form_validation->set_rules('installment_fees', "EMI Amount", 'required|xss_clean');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            if ($this->academicsession_model->add()) {
                $this->session->set_flashdata('success', "session added suucessfully");
                redirect(admin_url() . 'academic-session');
            } else {
                $this->session->set_flashdata('error', "Unable to add session");
                redirect($this->agent->referrer());
            }
        }
    }

    public function edit_sessions($id)
    {
        $data['title'] = "Edit session";
        //find page
        $data['page'] = $this->academicsession_model->get_academicsession_by_id($id);
        $data['courses'] = $this->course_model->get_all_courses();
        if (empty($data['page'])) {
            redirect($this->agent->referrer());
        }
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/session/update_session', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Update Page Post
     */
    public function update_sessions()
    {
        $this->form_validation->set_rules('session_name', "session Name", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('class_id', "Course", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('duration_month', "Course Duration", 'required|xss_clean');
        $this->form_validation->set_rules('total_fees', "Total Course Fee", 'required|xss_clean');
        $this->form_validation->set_rules('admission_fees', "Admission Fees", 'required|xss_clean');
        $this->form_validation->set_rules('installment_fees', "EMI Amount", 'required|xss_clean');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            //get id
            $id = $this->input->post('id', true);
            if ($this->academicsession_model->update($id)) {
                $this->session->set_flashdata('success', "session updated");

                if (!empty($redirect_url)) {
                    redirect($redirect_url);
                } else {
                    redirect(admin_url() . 'academic-session');
                }
            } else {
                $this->session->set_flashdata('form_data', $this->academicsession_model->input_values());
                $this->session->set_flashdata('error', "Unable To Update session");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Delete Page Post
     */
    public function delete_session_post()
    {
        $id = $this->input->post('id', true);
        if ($this->academicsession_model->delete($id)) {
            $this->session->set_flashdata('success', "session Deleted");
        } else {
            $this->session->set_flashdata('error', "Unable To Delete!");
        }
    }

    //get categories by language
    public function get_session_by_course_id()
    {
        $class_id = $this->input->post('class_id', true);
        if (!empty($class_id)) :
            $categories = $this->academicsession_model->get_academicsession_by_class_id($class_id);
            foreach ($categories as $item) {
                echo '<option value="' . $item->id . '">' . $item->session_name . '</option>';
            }
        endif;
    }

}
