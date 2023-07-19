<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Partner_controller extends Admin_Core_Controller
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
     * Add partner
     */
    public function add_partner()
    {
        $data['title'] = "Add partner";
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/partner/add_partner', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Add partner Post
     */
    public function add_partner_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Title", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('partner_order', "Display Order", 'xss_clean|max_length[500]|required');
        $this->form_validation->set_rules('partner_url', "Partner Link", 'xss_clean|required|valid_url|max_length[255]|required');
        $this->form_validation->set_rules('featured_image', "Logo", 'xss_clean|required|max_length[5000]|required');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            if ($this->partner_model->add()) {
                $this->session->set_flashdata('success', "partner added suucessfully");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "Unable to add partner");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * partners
     */
    public function index()
    {
        $data['title'] = "All partner";
        $data['partners'] = $this->partner_model->get_all_traning_partners();
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/partner/index', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Update partner
     */
    public function update_partner($id)
    {
        $data['title'] = "Update partner";
        //find partner
        $data['partner'] = $this->partner_model->get_traning_partner_by_id($id);

        //partner not found
        if (empty($data['partner'])) {
            redirect($this->agent->referrer());
        }
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/partner/update_partner', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Update partner Post
     */
    public function update_partner_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Title", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('partner_order', "Display Order", 'xss_clean|max_length[500]|required');
        $this->form_validation->set_rules('partner_url', "Partner Link", 'xss_clean|required|valid_url|max_length[255]|required');
        $this->form_validation->set_rules('featured_image', "Logo", 'xss_clean|required|max_length[5000]|required');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            //get id
            $id = $this->input->post('id', true);
            $redirect_url = $this->input->post('redirect_url', true);
             if ($this->partner_model->update($id)) {
                $this->session->set_flashdata('success', "partner updated");

                if (!empty($redirect_url)) {
                    redirect($redirect_url);
                } else {
                    redirect(admin_url() . 'partners');
                }
            } else {
                $this->session->set_flashdata('form_data', $this->partner_model->input_values());
                $this->session->set_flashdata('error', "Unable To Update partner");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Delete partner Post
     */
    public function delete_partner_post()
    {
        $id = $this->input->post('id', true);
        if ($this->partner_model->delete($id)) {
            $this->session->set_flashdata('success', "partner Deleted");
        } else {
            $this->session->set_flashdata('error', "Unable To Delete!, partner or partner have child partner");
        }
    }

 

    public function deletefeaturedImage()
    {
        $blog_id  = clean_number($this->input->post('id', true));
        $blog = $this->partner_model->get_traning_partner_by_id($blog_id);
        if (!empty($blog)) {
             $file_name = $blog->featured_image;
             $path = FCPATH . "uploads/traning_partner/";
            
            @unlink($path . $file_name);
            $status['error'] = 0;
        } else {
            $status['error'] = 1;
        }
        echo (json_encode($status));
    }
}
