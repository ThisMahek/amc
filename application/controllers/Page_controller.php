<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page_controller extends Admin_Core_Controller
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
     * Add Page
     */
    public function add_page()
    {
        $data['title'] = "Add Page";
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/page/add_page', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Add Page Post
     */
    public function add_page_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Page title", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('content', "Page Content", 'required|xss_clean');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {

            if (!$this->page_model->check_page_name()) {
                $this->session->set_flashdata('error', "Invalid page slug!");
                redirect($this->agent->referrer());
                exit();
            }

            if ($this->page_model->add()) {
                $this->session->set_flashdata('success', "Page added suucessfully");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "Unable to add page");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Pages
     */
    public function pages()
    {
        $data['title'] = "CMS pages";
        $data['pages'] = $this->page_model->get_all_pages();
        $data['lang_search_column'] = 2;
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/page/pages', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Update Page
     */
    public function update_page($id)
    {
        $data['title'] = "Update Page";
        //find page
        $data['page'] = $this->page_model->get_page_by_id($id);
        //page not found
        if (empty($data['page'])) {
            redirect($this->agent->referrer());
        }
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/page/update_page', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Update Page Post
     */
    public function update_page_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Page title", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('content', "Page Content", 'required|xss_clean');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            //get id
            $id = $this->input->post('id', true);
            $redirect_url = $this->input->post('redirect_url', true);

            if (!$this->page_model->check_page_name()) {
                $this->session->set_flashdata('error', "Invalid page slug!");
                redirect($this->agent->referrer());
                exit();
            }

            if ($this->page_model->update($id)) {
                $this->session->set_flashdata('success', "Page updated");

                if (!empty($redirect_url)) {
                    redirect($redirect_url);
                } else {
                    redirect(admin_url() . 'all-pages');
                }
            } else {
                $this->session->set_flashdata('form_data', $this->page_model->input_values());
                $this->session->set_flashdata('error', "Unable To Update Page");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Delete Page Post
     */
    public function delete_page_post()
    {
        $id = $this->input->post('id', true);
        if ($this->page_model->delete($id)) {
            $this->session->set_flashdata('success', "Page Deleted");
        } else {
            $this->session->set_flashdata('error', "Unable To Delete!, Page or page have child page");
        }
    }

    //get categories by language
    public function get_parrent_page_by_lang()
    {
        $lang_id = $this->input->post('lang_id', true);
        if (!empty($lang_id)) :
            $pages = $this->page_model->get_parrent_page_by_lang($lang_id);
            foreach ($pages as $item) {
                echo '<option value="' . $item->id . '">' . $item->name . '</option>';
            }
        endif;
    }
}
