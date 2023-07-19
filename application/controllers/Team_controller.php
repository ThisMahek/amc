<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Team_controller extends Admin_Core_Controller
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

    public function add_member()
    {
        $data['title'] = "Add Professor";
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/team/add_new');
        $this->load->view('admin/includes/footer');
    }

    /**
     * Add blog Category post
     */
    public function add_member_post()
    {
        //validate inputs
        $this->form_validation->set_rules('member_name', "Professor name", 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('member_image', "Professor Image", 'required|xss_clean');
        $this->form_validation->set_rules('about_member', "About Professor", 'required|xss_clean');
        $this->form_validation->set_rules('member_order', "Professor Order", 'required|xss_clean');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($this->agent->referrer());
        } else {
            $this->load->model('team_model');
            if ($this->team_model->add_member()) {
                //last id
                $last_id = $this->db->insert_id();
                //update slug
                $this->team_model->update_slug($last_id);
                $this->session->set_flashdata('success', "Professor Added Successfuly");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "Unable To Add Professor");
                redirect($this->agent->referrer());
            }
        }
    }

  public function all_member()
    {
        $data['title'] = "All Professor";
        $data['members'] = $this->team_model->get_teams_all();
        $data['lang_search_column'] = 2;
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/team/index', $data);
        $this->load->view('admin/includes/footer');
    }

    /**
     * edit blog  team
     */
    public function edit_member($id)
    {
        $this->load->model('team_model');
        $data['title'] = "Update Professor";
        //get team
        $data['member'] = $this->team_model->get_team($id);
        if (empty($data['member'])) {
            redirect($this->agent->referrer());
        }
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/team/edit_team', $data);
        $this->load->view('admin/includes/footer');
    }

    /**
     * edit blog team post
     */
    public function edit_member_post()
    {
        //validate inputs
        $this->form_validation->set_rules('member_name', "Professor name", 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('member_image', "Professor Image", 'required|xss_clean');
        $this->form_validation->set_rules('about_member', "Professor Member", 'required|xss_clean');
        $this->form_validation->set_rules('member_order', "Professor Order", 'required|xss_clean');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($this->agent->referrer());
        } else {
            $this->load->model('team_model');
            $id = $this->input->post('id', true);

            if ($this->team_model->update_team($id)) {
                //update slug
                $this->team_model->update_slug($id);
                $this->session->set_flashdata('success', "Professor Updated Successfuly");
                redirect(admin_url() . 'all-member');
            } else {
                $this->session->set_flashdata('error', "Unable To Update Professor");
                redirect($this->agent->referrer());
            }
        }
    }
    public function delete_member()
    {
        $this->load->model('team_model');
        $id = $this->input->post('id', true);
        //check blog posts
        if ($this->team_model->delete_team($id)) {
            $this->session->set_flashdata('success', "Professor Deleted");
        } else {
            $this->session->set_flashdata('error', "Unable To delete Professor");
        }
    }
}