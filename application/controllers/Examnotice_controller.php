<?php defined('BASEPATH') or exit('No direct script access allowed');

class Examnotice_controller extends Admin_Core_Controller
{
    public function __construct()
    {
        parent::__construct();

        //check auth
        if (!is_admin()) {
            redirect(base_url() . 'login');
        }
    }


    /**
     * Add examnotice
     */
    public function add_examnotice()
    {
        $data['title'] = "Add Exam Notice";
        $data['courses'] = $this->course_model->get_all_courses();
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/examnotice/add_examnotice', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Add examnotice Post
     */
    public function add_examnotice_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Title", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('short_description', "Short Description", 'xss_clean|max_length[500]|required');
        $this->form_validation->set_rules('content', "Content ", 'xss_clean|required|max_length[5000]|required');
        $this->form_validation->set_rules('course_id', "Course", 'xss_clean|required');
        $this->form_validation->set_rules('session_id', "Session/Batch", 'xss_clean|required');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            //if post added
            if ($this->examnotice_model->add_post()) {
                //last id
                $last_id = $this->db->insert_id();
                //update slug
                $this->examnotice_model->update_slug($last_id);
                $this->session->set_flashdata('success', "Notice successfully added");
                redirect(admin_url() . "exam-notice");
            } else {
                $this->session->set_flashdata('form_data', $this->post_admin_model->input_values());
                $this->session->set_flashdata('error', "Unable to add notice post");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * examnotices
     */
    public function index()
    {
        $data['title'] = "All Exam Notice";
        $data['examnotices'] = $this->examnotice_model->get_posts_all();
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/examnotice/index', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Update examnotice
     */
    public function update_examnotice($id)
    {
        $data['title'] = "Update Exam Notice";
        //find examnotice
        $data['examnotice'] = $this->examnotice_model->get_post($id);
        $data['courses'] = $this->course_model->get_all_courses();
        
        //examnotice not found
        if (empty($data['examnotice'])) {
            redirect($this->agent->referrer());
        }
        $data['batchlist'] = $this->academicsession_model->get_academicsession_by_class_id($data['examnotice']->course_id);
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/examnotice/update_examnotice', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Update examnotice Post
     */
    public function update_examnotice_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Title", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('short_description', "Short Description", 'xss_clean|max_length[500]|required');
        $this->form_validation->set_rules('content', "Content ", 'xss_clean|required|max_length[5000]|required');
        $this->form_validation->set_rules('course_id', "Course", 'xss_clean|required');
        $this->form_validation->set_rules('session_id', "Session/Batch", 'xss_clean|required');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            //get id
            $post_id = $this->input->post('id', true);

            if ($this->notice_model->update_post($post_id)) {
                //update slug
                $this->notice_model->update_slug($post_id);
                $this->session->set_flashdata('success', "Notice Updated");
                redirect(admin_url() . "exam-notice");
            } else {
                $this->session->set_flashdata('error', "Unable to Update");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Delete examnotice Post
     */
    public function delete_examnotice_post()
    {
        $id = $this->input->post('id', true);
        if ($this->examnotice_model->delete_post($id)) {
            $this->session->set_flashdata('success', "Exam Notice Deleted");
        } else {
            $this->session->set_flashdata('error', "Unable To Delete!");
        }
    }



}
