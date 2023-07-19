<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_controller extends Admin_Core_Controller
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
     * Add image_gallery
     */
    public function add_image_gallery()
    {
        $data['title'] = "Add image_gallery";
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/image_gallery/add_image_gallery', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Add image_gallery Post
     */
    public function add_image_gallery_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Title", 'required|xss_clean|max_length[500]');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            if ($this->image_gallery_model->add()) {
                $this->session->set_flashdata('success', "Image added suucessfully");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "Unable to add Image");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * image_gallerys
     */
    public function image_gallery()
    {
        $data['title'] = "Image Gallery";
        $data['image_gallerys'] = $this->image_gallery_model->get_all_images();
        $data['lang_search_column'] = 2;
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/image_gallery/index', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Update image_gallery
     */
    public function update_image_gallery($id)
    {
        $data['title'] = "Update image_gallery";
        //find image_gallery
        $data['image_gallery'] = $this->image_gallery_model->get_image_by_id($id);
        //image_gallery not found
        if (empty($data['image_gallery'])) {
            redirect($this->agent->referrer());
        }
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/image_gallery/update_image_gallery', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Update image_gallery Post
     */
    public function update_image_gallery_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Title", 'required|xss_clean|max_length[500]');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            //get id
            $id = $this->input->post('id', true);
            $redirect_url = $this->input->post('redirect_url', true);
            if ($this->image_gallery_model->update($id)) {
                $this->session->set_flashdata('success', "Image gallery updated");

                if (!empty($redirect_url)) {
                    redirect($redirect_url);
                } else {
                    redirect(admin_url() . 'image-gallery');
                }
            } else {
                $this->session->set_flashdata('form_data', $this->image_gallery_model->input_values());
                $this->session->set_flashdata('error', "Unable To Update image_gallery");
                redirect($this->agent->referrer());
            }
        }
    }
    /**
     * Delete image_gallery Post
     */
    public function delete_image_gallery_post()
    {
        $id = $this->input->post('id', true);
        if ($this->image_gallery_model->delete($id)) {
            $this->session->set_flashdata('success', "Image Deleted");
        } else {
            $this->session->set_flashdata('error', "Unable To Delete!");
        }
    }

}
