<?php defined('BASEPATH') or exit('No direct script access allowed');
class Job_category_controller extends Admin_Core_Controller
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
    /*********************************************************************
     * job Category section
     **********************************************************************/
    /**
     * List job Category post
     */
    public function jobCategories()
    {
        $data['title'] = "Categories";
        //get paginated categories
        $data['categories'] = $this->job_cat_model->get_categories_all();
        $data['lang_search_column'] = 2;
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/job/categories', $data);
        $this->load->view('admin/includes/footer');
    }
    /**
     * Add job Category
     */
    public function newjobCategory()
    {
        $data['title'] = "Add job Category";
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/job/add_category');
        $this->load->view('admin/includes/footer');
    }
    /**
     * Add job Category post
     */
    public function addjobCategory_post()
    {
        //validate inputs
        $this->form_validation->set_rules('name', "category name", 'required|xss_clean|max_length[200]');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($this->agent->referrer());
        } else {
            if ($this->job_cat_model->add_category()) {
                //last id
                $last_id = $this->db->insert_id();
                //update slug
                $this->job_cat_model->update_slug($last_id);
                $this->session->set_flashdata('success', "Category Added Successfuly");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "Unable To Add Category");
                redirect($this->agent->referrer());
            }
        }
    }

    /**
     * edit job  Category
     */
    public function update_job_category($id)
    {
        $data['title'] = "Update job Category";
        //get category
        $data['category'] = $this->job_cat_model->get_category($id);
        if (empty($data['category'])) {
            redirect($this->agent->referrer());
        }
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/job/update_category', $data);
        $this->load->view('admin/includes/footer');
    }

    /**
     * edit job Category post
     */
    public function update_job_category_post()
    {
        //validate inputs
        $this->form_validation->set_rules('name', 'category name', 'required|xss_clean|max_length[200]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error', validation_errors());
            $this->session->set_flashdata('form_data', $this->job_cat_model->input_values());
            redirect($this->agent->referrer());
        } else {
            //category id
            $id = $this->input->post('id', true);
            if ($this->job_cat_model->update_category($id)) {
                //update slug
                $this->job_cat_model->update_slug($id);
                $this->session->set_flashdata('success', "Category Updated Successfuly");
                redirect(admin_url() . 'job-categories');
            } else {
                $this->session->set_flashdata('error', "Unable To Update Category");
                redirect($this->agent->referrer());
            }
        }
    }

    /**
     * Delete Category Post
     */
    public function delete_job_category()
    {
        $id = $this->input->post('id', true);
        //check job posts
        if (!empty($this->jobs_model->get_posts_by_category($id))) {
            $this->session->set_flashdata('error', "Thre is job aginst the category! Unalble to delete");
        } else {
            if ($this->job_cat_model->delete_category($id)) {
                $this->session->set_flashdata('success', "Podcast category Deleted");
            } else {
                $this->session->set_flashdata('error', "Unable To delete podcast category");
            }
        }
    }
}

?>