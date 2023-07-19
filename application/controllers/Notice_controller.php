<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notice_controller extends Admin_Core_Controller
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
     * notice section
     **********************************************************************/
    /**
     *  notice  List
     */
    public function notices()
    {
        $data['title'] = "Notices";
        $data['notices'] = $this->notice_model->get_posts_all();
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/notice/notices', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Add notice 
     */
    public function newnotice()
    {
        $data['title'] = ("Add Notice");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/notice/add_post', $data);
        $this->load->view('admin/includes/footer');
    }
    /**
     * Add notice post
     */
    public function add_post_post()
    {
        $this->form_validation->set_rules('title', "Title", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('short_description', "Short Description", 'xss_clean|max_length[5000]|required');
        $this->form_validation->set_rules('content', "Content", 'xss_clean|required');
        $this->form_validation->set_rules('featured_image', "Featured Image", 'xss_clean|required');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            //if post added
            if ($this->notice_model->add_post()) {
                //last id
                $last_id = $this->db->insert_id();
                //update slug
                $this->notice_model->update_slug($last_id);
                //add post files
                $this->notice_files_model->add_notice_files($last_id);
                $this->session->set_flashdata('success', "notice post successfully added");
                redirect(admin_url() . "notices");
            } else {
                $this->session->set_flashdata('form_data', $this->post_admin_model->input_values());
                $this->session->set_flashdata('error', "Unable to add notice post");
                redirect($this->agent->referrer());
            }
        }
    }

    /**
     * edit notice 
     */
    public function editnotice($notice_id)
    {
        $notice_id = clean_number($notice_id);
        $data['title'] = "Edit Notice";
        //get post
        $data['post'] = $this->notice_model->get_post($notice_id);
        $data['notice_files'] = $this->notice_files_model->getnoticeFiles($notice_id);
        if (empty($data['post'])) {
            redirect($this->agent->referrer());
        }

        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/notice/update_post');
        $this->load->view('admin/includes/footer');
    }

    /**
     * edit notice post
     */
    public function edit_notice_post()
    {
        $this->form_validation->set_rules('title', "Title", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('short_description', "Short Description", 'xss_clean|required|max_length[5000]');
        $this->form_validation->set_rules('content', "Content", 'xss_clean|required');
        $this->form_validation->set_rules('featured_image', "Featured Image", 'xss_clean|required');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            //post id
            $post_id = $this->input->post('id', true);

            if ($this->notice_model->update_post($post_id)) {
                //update slug
                $this->notice_model->update_slug($post_id);
                //add post files
                $this->notice_files_model->updateAllnoticeFiles($post_id);
                $this->session->set_flashdata('success', "notice post Updated");
                redirect(admin_url() . "notices");
            } else {
                $this->session->set_flashdata('error', "unable To Update notice Post");
                redirect($this->agent->referrer());
            }
        }
    }

   

    public function removeTempnoticeFile()
    {
        $file_name  = $this->input->post('file_name', true);
        $path = FCPATH . "/uploads/tempfiles/";
        unlink($path . $file_name);
        $status['error'] = 0;
        echo (json_encode($status));
    }

    /*  public function tm()
    {
        $this->notice_model->update_slug(2);
    } */

    public function deletefeaturedImage()
    {
        $notice_id  = clean_number($this->input->post('id', true));
        $notice = $this->notice_model->get_post($notice_id);
        if (!empty($notice)) {
            $file_name = $notice->featured_image;
            $path = FCPATH . "/uploads/notice_image/";
            @unlink($path . $file_name);

            $status['error'] = 0;
        } else {
            $status['error'] = 1;
        }
        echo (json_encode($status));
    }

    public function deleteExtraImage()
    {
        $notice_id  = clean_number($this->input->post('id', true));
        $notice = $this->notice_model->get_post($notice_id);
        if (!empty($notice)) {
            $file_name = $notice->extra_image;
            $path = FCPATH . "/uploads/notice_image/";
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
        $file = $this->notice_files_model->getnoticeFilesRow($fileid);
        if (!empty($file)) {
            $file_name = $file->file_name;
            $this->notice_files_model->deletenoticeFiles($fileid);
            $path = FCPATH . "/uploads/files/";
            unlink($path . $file_name);
            $status['error'] = 0;
        } else {
            $status['error'] = 1;
        }

        echo (json_encode($status));
    }

    public function delete_notice()
    {
        $id = $this->input->post('id', true);
        if ($this->notice_model->delete_post($id)) {
            $this->session->set_flashdata('success', "Notice Deleted");
        } else {
            $this->session->set_flashdata('error', "Unable To Delete!");
        }
    }

    public function change_status()
    {
        $id = $this->input->post('id', true);
        if ($this->notice_model->change_status($id)) {
            $this->session->set_flashdata('success', "Status Changed");
        } else {
            $this->session->set_flashdata('error', "Status Changed");
        }
    }
}
