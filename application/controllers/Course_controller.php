<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course_controller extends Home_Core_Controller {
	function __construct () {
		parent::__construct();
		if (!auth_check()) {
			redirect('login');
		}
		if (!is_admin()) {
			redirect('dashboard');
		}
	}

	public function courses()
	{
		$data['title'] = "All courses";
		$data['courses'] = $this->course_model->get_all_courses();
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/course/index', $data);
		$this->load->view('admin/includes/footer');
	}

	/**
	 * Add Page
	 */
	public function add_courses()
	{
		$data['title'] = "Add course";
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/course/add_course', $data);
		$this->load->view('admin/includes/footer');
	}

	public function save_courses()
	{
		$this->form_validation->set_rules('title_name', "Course menu Name", 'required|xss_clean|max_length[500]');
		$this->form_validation->set_rules('title', "Course title", 'required|xss_clean|max_length[500]');
		$this->form_validation->set_rules('content', "Course Content", 'required|xss_clean');
		$this->form_validation->set_rules('duration_year', "Course duration year", 'required|xss_clean');
		$this->form_validation->set_rules('duration_month', "Course duration month", 'required|xss_clean');
		
		$this->form_validation->set_rules('admission_fees', "Course admination fees", 'required|xss_clean');
		

		if ($this->form_validation->run() === false) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect($this->agent->referrer());
		} else {

			if (!$this->course_model->check_course_name()) {
				$this->session->set_flashdata('error', "Invalid Course slug!");
				redirect($this->agent->referrer());
				exit();
			}

			if ($this->course_model->add()) {
				$this->session->set_flashdata('success', "Course added suucessfully");
				redirect(admin_url() . 'courses');
			} else {
				$this->session->set_flashdata('error', "Unable to add Course");
				redirect($this->agent->referrer());
			}
		}
	}

	public function edit_courses($id)
	{
		$data['title'] = "Edit Course";
		//find page
		$data['page'] = $this->course_model->get_course_by_id($id);
		//page not found
		if (empty($data['page'])) {
			redirect($this->agent->referrer());
		}
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/course/update_course', $data);
		$this->load->view('admin/includes/footer');
	}


	/**
	 * Update Page Post
	 */
	public function update_courses()
	{
		$this->form_validation->set_rules('title_name', "Course menu Name", 'required|xss_clean|max_length[500]');
		$this->form_validation->set_rules('title', "Course title", 'required|xss_clean|max_length[500]');
		$this->form_validation->set_rules('content', "Course Content", 'required|xss_clean');
		$this->form_validation->set_rules('duration_year', "Course duration year", 'required|xss_clean');
		$this->form_validation->set_rules('duration_month', "Course duration month", 'required|xss_clean');

		$this->form_validation->set_rules('admission_fees', "Course admination fees", 'required|xss_clean');
		if ($this->form_validation->run() === false) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect($this->agent->referrer());
		} else {
			//get id
			$id = $this->input->post('id', true);
			
			if (!$this->course_model->check_course_name()) {
				$this->session->set_flashdata('error', "Invalid Course slug!");
				redirect($this->agent->referrer());
				exit();
			}

			if ($this->course_model->update($id)) {
				$this->session->set_flashdata('success', "Course updated");

				if (!empty($redirect_url)) {
					redirect($redirect_url);
				} else {
					redirect(admin_url() . 'courses');
				}
			} else {
				$this->session->set_flashdata('form_data', $this->course_model->input_values());
				$this->session->set_flashdata('error', "Unable To Update Course");
				redirect($this->agent->referrer());
			}
		}
	}


	/**
	 * Delete Page Post
	 */
	public function delete_course_post()
	{
		$id = $this->input->post('id', true);
		if ($this->course_model->delete($id)) {
			$this->session->set_flashdata('success', "Page Deleted");
		} else {
			$this->session->set_flashdata('error', "Unable To Delete!, Page or page have child page");
		}
	}


}