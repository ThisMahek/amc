<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assignment_controller extends Admin_Core_Controller
{

    public function __construct()
    {
        parent::__construct();
        //check user
        if (!is_admin()) {
            redirect(base_url() . 'login');
        }
    }
    /*********************************************************************
     * assignment section
     **********************************************************************/
    /**
     *  assignment  List
     */
    public function assignments()
    {
        $data['title'] = "Assignments";
        $data['assignments'] = $this->assignment_model->get_posts_all();
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/assignment/assignments', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Add assignment 
     */
    public function add_assignment()
    {
        $data['courses'] = $this->course_model->get_all_courses();
        $data['title'] = ("Add assignment");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/assignment/add_post', $data);
        $this->load->view('admin/includes/footer');
    }
    /**
     * Add assignment post
     */
    public function add_post_post()
    {
        $this->form_validation->set_rules('title', "Title", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('short_description', "Short Description", 'xss_clean|max_length[450]|required');
        $this->form_validation->set_rules('content', "Content", 'xss_clean|required');
        $this->form_validation->set_rules('featured_image', "Featured Image", 'xss_clean|required');
        $this->form_validation->set_rules('closing_date', "Closeing Date", 'xss_clean|required');
        $this->form_validation->set_rules('course_id', "Course", 'xss_clean|required');
        $this->form_validation->set_rules('session_id', "Session/Batch", 'xss_clean|required');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            //if post added
            if ($this->assignment_model->add_post()) {
                //last id
                $last_id = $this->db->insert_id();
                //update slug
                $this->assignment_model->update_slug($last_id);
                //add post files
                $this->assignment_files_model->add_assignment_files($last_id);
                $this->session->set_flashdata('success', "Assignment successfully added");
                redirect(admin_url() . "assignments");
            } else {
                $this->session->set_flashdata('form_data', $this->post_admin_model->input_values());
                $this->session->set_flashdata('error', "Unable to add assignment");
                redirect($this->agent->referrer());
            }
        }
    }

    /**
     * edit assignment 
     */
    public function editassignment($assignment_id)
    {
        $assignment_id = clean_number($assignment_id);
        $data['title'] = "Edit assignment";
        //get post
        $data['post'] = $this->assignment_model->get_post($assignment_id);
        $data['assignment_files'] = $this->assignment_files_model->getAssignmentFiles($assignment_id);
        if (empty($data['post'])) {
            redirect($this->agent->referrer());
        }
        $data['courses'] = $this->course_model->get_all_courses();
        $data['batchlist'] = $this->academicsession_model->get_academicsession_by_class_id($data['post']->course_id);
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/assignment/update_post');
        $this->load->view('admin/includes/footer');
    }

    /**
     * edit assignment post
     */
    public function edit_assignment_post()
    {
        $this->form_validation->set_rules('title', "Title", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('short_description', "Short Description", 'xss_clean|max_length[450]|required');
        $this->form_validation->set_rules('content', "Content", 'xss_clean|required');
        $this->form_validation->set_rules('featured_image', "Featured Image", 'xss_clean|required');
        $this->form_validation->set_rules('closing_date', "Closeing Date", 'xss_clean|required');
        $this->form_validation->set_rules('course_id', "Course", 'xss_clean|required');
        $this->form_validation->set_rules('session_id', "Session/Batch", 'xss_clean|required');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            //post id
            $post_id = $this->input->post('id', true);

            if ($this->assignment_model->update_post($post_id)) {
                //update slug
                $this->assignment_model->update_slug($post_id);
                //add post files
                $this->assignment_files_model->updateAllassignmentFiles($post_id);
                $this->session->set_flashdata('success', "assignment post Updated");
                redirect(admin_url() . "assignments");
            } else {
                $this->session->set_flashdata('error', "unable To Update assignment Post");
                redirect($this->agent->referrer());
            }
        }
    }



    public function removeTempassignmentFile()
    {
        $file_name  = $this->input->post('file_name', true);
        $path = FCPATH . "/uploads/tempfiles/";
        unlink($path . $file_name);
        $status['error'] = 0;
        echo (json_encode($status));
    }

    /*  public function tm()
    {
        $this->assignment_model->update_slug(2);
    } */

    public function deletefeaturedImage()
    {
        $assignment_id  = clean_number($this->input->post('id', true));
        $assignment = $this->assignment_model->get_post($assignment_id);
        if (!empty($assignment)) {
            $file_name = $assignment->featured_image;
            $path = FCPATH . "/uploads/assignment_image/";
            @unlink($path . $file_name);

            $status['error'] = 0;
        } else {
            $status['error'] = 1;
        }
        echo (json_encode($status));
    }

    public function deleteExtraImage()
    {
        $assignment_id  = clean_number($this->input->post('id', true));
        $assignment = $this->assignment_model->get_post($assignment_id);
        if (!empty($assignment)) {
            $file_name = $assignment->extra_image;
            $path = FCPATH . "/uploads/assignment_image/";
            @unlink($path . $file_name);

            $status['error'] = 0;
        } else {
            $status['error'] = 1;
        }
        echo (json_encode($status));
    }

    public function deleteUplodedFiles()
    {
        $fileid  = clean_number($this->input->post('fileid', true));
        $file = $this->assignment_files_model->getassignmentFilesRow($fileid);
        if (!empty($file)) {
            $file_name = $file->file_name;
            $this->assignment_files_model->deleteassignmentFiles($fileid);
            $path = FCPATH . "/uploads/files/";
            unlink($path . $file_name);
            $status['error'] = 0;
        } else {
            $status['error'] = 1;
        }

        echo (json_encode($status));
    }

    public function delete_assignment()
    {
        $id = $this->input->post('id', true);
        if ($this->assignment_model->delete_post($id)) {
            $this->session->set_flashdata('success', "assignment Deleted");
        } else {
            $this->session->set_flashdata('error', "Unable To Delete!");
        }
    }

    public function change_status()
    {
        $id = $this->input->post('id', true);
        if ($this->assignment_model->change_status($id)) {
            $this->session->set_flashdata('success', "Status Changed");
        } else {
            $this->session->set_flashdata('error', "Status Changed");
        }
    }
}
