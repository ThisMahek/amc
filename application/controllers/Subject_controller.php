<?php defined('BASEPATH') or exit('No direct script access allowed');
class Subject_controller extends Admin_Core_Controller
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
     * Add subject
     */
    public function add_subject()
    {
        $data['title'] = "Add Subject";
        $data['courses'] = $this->course_model->get_all_courses();
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/subject/add_subject', $data);
        $this->load->view('admin/includes/footer');
    }

    /**
     * Add subject Post
     */
    public function add_subject_post()
    {
        $this->form_validation->set_rules('sub_name', "Subject name", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('sub_code', "Subject code", 'xss_clean|max_length[500]|required|is_unique[course_subjects.sub_code]');
        $this->form_validation->set_rules('course_id', "Course", 'xss_clean|required');
        $this->form_validation->set_rules('year', "Year", 'xss_clean|required');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            //if post added
            if ($this->subject_model->add_post()) {
                $this->session->set_flashdata('success', "Subject successfully added");
                redirect(admin_url() . "subjects");
            } else {
                $this->session->set_flashdata('form_data', $this->post_admin_model->input_values());
                $this->session->set_flashdata('error', "Unable to add subject");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * subjects
     */
    public function subjects()
    {
        $data['title'] = "All Subject";
        $data['lang_search_column'] = 2;
        $data['subjects'] = $this->subject_model->get_posts_all_joined();
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/subject/index', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Update subject
     */
    public function update_subject($id)
    {
        $data['title'] = "Update Subject";
        //find subject
        $data['subject'] = $this->subject_model->get_post($id);
        //subject not found
        if (empty($data['subject'])) {
            redirect($this->agent->referrer());
        }
        $data['courses'] = $this->course_model->get_all_courses();
        $data['years'] = $this->course_model->get_course_by_id($data['subject']->course_id)->duration_year;
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/subject/update_subject', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Update subject Post
     */
    public function update_subject_post()
    {
        //validate inputs
        $this->form_validation->set_rules('sub_name', "Subject name", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('sub_code', "Subject code", 'xss_clean|max_length[500]|required');
        $this->form_validation->set_rules('course_id', "Course", 'xss_clean|required');
        $this->form_validation->set_rules('year', "Year", 'xss_clean|required');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            //get id
            $post_id = $this->input->post('id', true);

            if ($this->subject_model->update_post($post_id)) {
                $this->session->set_flashdata('success', "subject Updated");
                redirect(admin_url() . "subjects");
            } else {
                $this->session->set_flashdata('error', "Unable to Update");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Delete subject Post
     */
    public function delete_subject_post()
    {
        $id = $this->input->post('id', true);
        if ($this->subject_model->delete_post($id)) {
            $this->session->set_flashdata('success', "Subject Deleted");
        } else {
            $this->session->set_flashdata('error', "Unable To Delete!");
        }
    }

    //get categories by language
    public function get_session_by_course_id()
    {
        $class_id = $this->input->post('class_id', true);
        if (!empty($class_id)) :
            $course =  $this->course_model->get_course_by_id($class_id);
            if (!empty($course)) {
                for ($i=1; $i <=$course->duration_year ; $i++) {
                    echo '<option value="' . $i . '">' . $i . ' Year </option>';
                }
            }
        endif;
    }

}
