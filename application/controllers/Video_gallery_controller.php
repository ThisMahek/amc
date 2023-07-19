<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Video_gallery_controller extends Admin_Core_Controller
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
     * Add video_gallery
     */
    public function add_video_gallery()
    {
        $data['title'] = "Add video_gallery";
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/video_gallery/add_video_gallery', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Add video_gallery Post
     */
    public function add_video_gallery_post()
    {
        //validate inputs
        $this->form_validation->set_rules('video_id', "Video ID", 'required|xss_clean|max_length[500]');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            if ($this->video_gallery_model->add()) {
                $this->session->set_flashdata('success', "video added suucessfully");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "Unable to add video");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * video_gallerys
     */
    public function video_gallery()
    {
        $data['title'] = "video Gallery";
        $data['video_gallerys'] = $this->video_gallery_model->get_all_videos();
        $data['lang_search_column'] = 2;
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/video_gallery/index', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Update video_gallery
     */
    public function update_video_gallery($id)
    {
        $data['title'] = "Update video_gallery";
        //find video_gallery
        $data['video_gallery'] = $this->video_gallery_model->get_video_by_id($id);
        //video_gallery not found
        if (empty($data['video_gallery'])) {
            redirect($this->agent->referrer());
        }
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/video_gallery/update_video_gallery', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Update video_gallery Post
     */
    public function update_video_gallery_post()
    {
        //validate inputs
        $this->form_validation->set_rules('video_id', "Video ID", 'required|xss_clean|max_length[500]');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            //get id
            $id = $this->input->post('id', true);
            $redirect_url = $this->input->post('redirect_url', true);
            if ($this->video_gallery_model->update($id)) {
                $this->session->set_flashdata('success', "video gallery updated");

                if (!empty($redirect_url)) {
                    redirect($redirect_url);
                } else {
                    redirect(admin_url() . 'video-gallery');
                }
            } else {
                $this->session->set_flashdata('form_data', $this->video_gallery_model->input_values());
                $this->session->set_flashdata('error', "Unable To Update video_gallery");
                redirect($this->agent->referrer());
            }
        }
    }
    /**
     * Delete video_gallery Post
     */
    public function delete_video_gallery_post()
    {
        $id = $this->input->post('id', true);
        if ($this->video_gallery_model->delete($id)) {
            $this->session->set_flashdata('success', "video Deleted");
        } else {
            $this->session->set_flashdata('error', "Unable To Delete!");
        }
    }
}
