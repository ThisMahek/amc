<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Testimonial_controller extends Admin_Core_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!auth_check()) {
            redirect('login');
        }
        if (!is_admin()) {
            redirect('dashboard');
        }
    }

    public function add_testimonial()
    {
        $data['title'] = "Add testimonial";
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/testimonial/add_new');
        $this->load->view('admin/includes/footer');
    }

    /**
     * Add blog Category post
     */
    public function add_testimonial_post()
    {
        //validate inputs
        $this->form_validation->set_rules('user_name', "User name", 'required|xss_clean|max_length[255]');
        $this->form_validation->set_rules('testimonial_details', "About testimonial", 'required|xss_clean');
        $this->form_validation->set_rules('testimonial_order', "testimonial Order", 'required|xss_clean');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($this->agent->referrer());
        } else {
            if ($this->testimonial_model->add_testimonial()) {
                $this->session->set_flashdata('success', "Testimonial Added Successfuly");
                redirect(admin_url() . 'testimonials');
            } else {
                $this->session->set_flashdata('error', "Unable To Add testimonial");
                redirect($this->agent->referrer());
            }
        }
    }

    public function testimonials()
    {
        $data['title'] = "All testimonial";
        $data['testimonials'] = $this->testimonial_model->get_testimonials_all();
        $data['lang_search_column'] = 2;
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/testimonial/index', $data);
        $this->load->view('admin/includes/footer');
    }

    /**
     * edit blog  team
     */
    public function edit_testimonial($id)
    {
        $data['title'] = "Update testimonial";
        //get team
        $data['testimonial'] = $this->testimonial_model->get_testimonial($id);
        if (empty($data['testimonial'])) {
            redirect($this->agent->referrer());
        }
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/testimonial/edit_testimonial', $data);
        $this->load->view('admin/includes/footer');
    }

    /**
     * edit blog team post
     */
    public function edit_testimonial_post()
    {
        //validate inputs
        $this->form_validation->set_rules('user_name', "User name", 'required|xss_clean|max_length[255]');
        $this->form_validation->set_rules('testimonial_details', "About testimonial", 'required|xss_clean');
        $this->form_validation->set_rules('testimonial_order', "testimonial Order", 'required|xss_clean');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($this->agent->referrer());
        } else {
            $id = $this->input->post('id', true);
            if ($this->testimonial_model->update_testimonials($id)) {
                $this->session->set_flashdata('success', "Testimonial Updated Successfuly");
                redirect(admin_url() . 'testimonials');
            } else {
                $this->session->set_flashdata('error', "Unable To Update testimonial");
                redirect($this->agent->referrer());
            }
        }
    }
    public function delete_testimonial()
    {
        $id = $this->input->post('id', true);
        //check blog posts
        if ($this->testimonial_model->delete_testimonials($id)) {
            $this->session->set_flashdata('success', "testimonial Deleted");
        } else {
            $this->session->set_flashdata('error', "Unable To delete testimonial");
        }
    }
}
