<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Oldmarksheet_controller extends Admin_Core_Controller {
	function __construct () {
		parent::__construct();
		if (!auth_check()) {
			redirect('login');
		}
		if (!is_admin()) {
			redirect('dashboard');
		}
        $this->load->model('oldMarksheet_model');
	}

    public function index()
    {
        $data['marksheets'] = $this->oldMarksheet_model->get_all_marksheets();
        $data['title'] = ("Postdated Marksheet");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/old-marksheet/marksheets', $data);
        $this->load->view('admin/includes/footer');
    }
    public function add_new()
    {
        $data['title'] = ("Add Postdated Marksheet");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/old-marksheet/add_marksheet', $data);
        $this->load->view('admin/includes/footer');
    }
    public function add_new_post()
    {
         //validate inputs
         $this->form_validation->set_rules('stu_name', "Student name", 'required|xss_clean|max_length[255]');
         $this->form_validation->set_rules('f_name', "Father's Name", 'xss_clean|max_length[255]|required');
         $this->form_validation->set_rules('dob', "Date Of Birth ", 'xss_clean|required');
         $this->form_validation->set_rules('roll_no', "Roll ", 'xss_clean|required');
         $this->form_validation->set_rules('reg_no', "Registration No ", 'xss_clean|required');
         $this->form_validation->set_rules('course_name', "Course Name", 'xss_clean|required');
         $this->form_validation->set_rules('session_name', "Session/Batch Name", 'xss_clean|required');
         if ($this->form_validation->run() === false) {
             $this->session->set_flashdata('errors', validation_errors());
             redirect($this->agent->referrer());
         } else {
             $data =[
                'stu_name' =>$this->input->post('stu_name', true),
                'f_name' =>$this->input->post('f_name', true),
                'dob' =>$this->input->post('dob', true),
                'roll_no' =>$this->input->post('roll_no', true),
                'reg_no' =>$this->input->post('reg_no', true),
                'course_name' =>$this->input->post('course_name', true),
                'session_name' =>$this->input->post('session_name', true),
             ];
             // upload logo
                if ($_FILES['avatar']['name'] != '') {
                    $path = FCPATH . 'uploads/old_student_images/';
                    if (!is_dir($path)) {
                        mkdir($path, 0755, TRUE);
                    }
                    $config_prof['encrypt_name']  = TRUE;
                    $config_prof['upload_path']   = $path;
                    $config_prof['allowed_types'] = 'png|jpeg|jpg';
                    $config['max_size']           = '5000';
                    $config_prof['overwrite']     = true;
                    $this->upload->initialize($config_prof);
                    if ($this->upload->do_upload('avatar')) {
                        $file_data = $this->upload->data();
                        $data["avatar"] =  $file_data['file_name'];
                    } else {
                        return false;
                    }
                }

             if ($this->oldMarksheet_model->add_marksheet($data)) {
                 //last id
                 $last_id = $this->db->insert_id();
                 //update slug
                 $this->session->set_flashdata('success', "Student data successfully added");
                 redirect(admin_url() . "old-marksheet-marks-breakups/".$last_id);
             } else {
                 $this->session->set_flashdata('form_data', $this->post_admin_model->input_values());
                 $this->session->set_flashdata('error', "Unable prcess");
                 redirect($this->agent->referrer());
             }
         }
    }
    public function marks_breakups($marksheet_id)
    {
        $marksheet_id =clean_number($marksheet_id);
        $marksBreakup = $this->oldMarksheet_model->getMarksBreakupbyMarksID($marksheet_id);
        $data['title'] = ("Marks Details");
        $data['marksBreakups']=$marksBreakup;
        $data['marksheet_id']=$marksheet_id;
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/old-marksheet/marks_breakups', $data);
        $this->load->view('admin/includes/footer');


    }

    public function add_new_marks_breakups()
    {
        $postdata = $_POST;
        unset($postdata['submit']) ;
        $data = array();
         $i = 0;
        foreach ($postdata['sub_code']  as $sub_codes) {
              $sub_code =  trim($sub_codes);
              $sub_name =  trim($postdata['sub_name'][$i]);
              $year =  trim($postdata['year'][$i]);
              $internal =  trim($postdata['internal'][$i]);
              $external =  trim($postdata['external'][$i]);
              $obtain =  trim($postdata['obtain'][$i]);
              $max_marks =  trim($postdata['max_marks'][$i]);
              $practical =  trim($postdata['practical'][$i]);
              $i++;
              if(!empty($sub_code)){
              // insert into multi dimantion array
              $subdataArray['sub_code'] = $sub_code;
              $subdataArray['sub_name'] = $sub_name;
              $subdataArray['year'] = $year;
              $subdataArray['internal'] = $internal;
              $subdataArray['external'] = $external;
              $subdataArray['practical'] = $practical;
              $subdataArray['obtain'] = $obtain;
              $subdataArray['max_marks'] = $max_marks;
              $subdataArray['old_marsheet_id'] = $this->input->post('old_marsheet_id',true);
                 array_push($data, $subdataArray);
            }
        }
        if ($this->oldMarksheet_model->insertMarksBatch($data)) {
            $this->session->set_flashdata('success','Data saved successful');
            redirect($this->agent->referrer());
        }else{
            $this->session->set_flashdata('error', 'Unable to save data');
            redirect($this->agent->referrer());
        }
    }

    public function update_marks_breakups()
    {
        $postdata = $_POST;
        unset($postdata['submit']) ;
        $success = false;
        $i = 0;
        foreach ($postdata['sub_code']  as $sub_codes) {
            $sub_code =  trim($sub_codes);
            $year =  trim($postdata['year'][$i]);
            $sub_name =  trim($postdata['sub_name'][$i]);
            $internal =  trim($postdata['internal'][$i]);
            $external =  trim($postdata['external'][$i]);
            $obtain =  trim($postdata['obtain'][$i]);
            $max_marks =  trim($postdata['max_marks'][$i]);
            $practical =  trim($postdata['practical'][$i]);
            $id = trim($postdata['id'][$i]);
                $i++;
                if(!empty($sub_code)){
                // insert into multi dimantion array
                $subdataArray['sub_code'] = $sub_code;
                $subdataArray['sub_name'] = $sub_name;
                $subdataArray['year'] = $year;
                $subdataArray['internal'] = $internal;
                $subdataArray['external'] = $external;
                $subdataArray['practical'] = $practical;
                $subdataArray['obtain'] = $obtain;
                $subdataArray['max_marks'] = $max_marks;
                $success = $this->oldMarksheet_model->updateMarksData($subdataArray,$id);
                    }
                }
        if ($success===true) {
                $this->session->set_flashdata('success','Data updated successful');
                redirect($this->agent->referrer());
            }else{
            $this->session->set_flashdata('errors', 'Unable to update data');
                redirect($this->agent->referrer());
        }
    }

    public function deleteMarksDataList()
    {
        $id = clean_number($this->input->post('mark_id',true));
        if($this->oldMarksheet_model->deleteMarksByID($id)){
        $this->session->set_flashdata('success','Data  Deleted');
            $data = array(
                'result' => 1,
                'redirect' => $this->agent->referrer(),
            );
            echo json_encode($data);
        }else{
            $this->session->set_flashdata('error', 'Unable To Delete Data!');
            $data = array(
                'status' => 0,
                'redirect' => $this->agent->referrer(),
            );
            echo json_encode($data);
        }
    }

    public function edit_marksheet($marksheet_id)
    {
        $marksheet_id =clean_number($marksheet_id);
        $marksBreakup = $this->oldMarksheet_model->get_marksheet_by_id($marksheet_id);
        $data['title'] = ("Marks Details");
        $data['marksheet']=$marksBreakup;
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/old-marksheet/edit_post', $data);
        $this->load->view('admin/includes/footer');
    }

    public function edit_marksheet_post()
    {
        $this->form_validation->set_rules('stu_name', "Student name", 'required|xss_clean|max_length[255]');
        $this->form_validation->set_rules('f_name', "Father's Name", 'xss_clean|max_length[255]|required');
        $this->form_validation->set_rules('dob', "Date Of Birth ", 'xss_clean|required');
        $this->form_validation->set_rules('roll_no', "Roll ", 'xss_clean|required');
        $this->form_validation->set_rules('reg_no', "Registration No ", 'xss_clean|required');
        $this->form_validation->set_rules('course_name', "Course Name", 'xss_clean|required');
        $this->form_validation->set_rules('session_name', "Session/Batch Name", 'xss_clean|required');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            $oldIng = $this->input->post('old_img', true);
            $id = $this->input->post('id', true);
            $data =[
                'stu_name' =>$this->input->post('stu_name', true),
                'f_name' =>$this->input->post('f_name', true),
                'dob' =>$this->input->post('dob', true),
                'roll_no' =>$this->input->post('roll_no', true),
                'reg_no' =>$this->input->post('reg_no', true),
                'course_name' =>$this->input->post('course_name', true),
                'session_name' =>$this->input->post('session_name', true),
             ];
             if ($_FILES['avatar']['name'] != '') {
                $path = FCPATH . 'uploads/old_student_images/';
                if (!is_dir($path)) {
                    mkdir($path, 0755, TRUE);
                }
                $config_prof['encrypt_name']  = TRUE;
                $config_prof['upload_path']   = $path;
                $config_prof['allowed_types'] = 'png|jpeg|jpg';
                $config['max_size']           = '5000';
                $config_prof['overwrite']     = true;
                $this->upload->initialize($config_prof);
                if ($this->upload->do_upload('avatar')) {
                    $file_data = $this->upload->data();
                    $data["avatar"] =  $file_data['file_name'];
                    if (!empty($oldIng)) {
                        delete_file_from_server('uploads/old_student_images/' . $oldIng);
                    }
                } else {
                    return false;
                }
            }
            if ($this->oldMarksheet_model->update_marksheet($data,$id)) {
            
                $this->session->set_flashdata('success', "Student data successfully updated");
                redirect(admin_url() . "postdated-marksheet");
            } else {
                $this->session->set_flashdata('form_data', $this->post_admin_model->input_values());
                $this->session->set_flashdata('error', "Unable to add process");
                redirect($this->agent->referrer());
            }
            
        }
    }




    public function delete_old_marksheet()
    {
        $id = $this->input->post('id', true);
        if ($this->oldMarksheet_model->deleteMarksheet($id)) {
            $this->session->set_flashdata('success', "Data Deleted");
        } else {
            $this->session->set_flashdata('error', "Unable To Delete!");
        }
    }

}