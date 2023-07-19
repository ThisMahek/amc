<?php defined('BASEPATH') or exit('No direct script access allowed');
class Certificate_controller extends Admin_Core_Controller
{
    public function __construct()
    {
        parent::__construct();
        //check user
        if (!is_admin()) {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        # code...
    }

    public function certificats()
    {
        $data['certificats'] = $this->certificate_model->get_all_certificatess();
        $data['title'] = ("Issued Certificates");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/certificate/published_certificats', $data);
        $this->load->view('admin/includes/footer');
    }

    public function publish_certificate($id)
    {
        $marksheet = $this->marksheet_model->get_marksheet_by_id(clean_number($id));
       
        if (!empty($marksheet)) {
            $student = $this->student_model->get_student_by_id($marksheet->student_id);
            $marksheet_details = json_decode($student->marksheet_details,true);
            
            
            var_dump(array_search(0,$marksheet_details));
            if(!array_search(0, $marksheet_details)){
                //insert
                $insertArr = [
                    'marksheet_id' => $marksheet->id,
                    'student_id' => $marksheet->student_id,
                    'course_id' => $marksheet->course_id,
                    'session_id' => $marksheet->session_id,
                    'roll_no' => $marksheet->roll_no,
                    'enroll_no' => $marksheet->enroll_no,
                    'reg_no' => $marksheet->reg_no,
                    'created_on' => date('Y-m-d H:i:s'),
                    'certificate_sl_no' => genarateCertificteSlNo(),
                ];
                $this->certificate_model->add_certificates($insertArr);
                $last_id = $this->db->insert_id();
                // update marksheet
                $updateArr = [
                    'is_certified' => 1,
                    'certificate_id' => $last_id,
                ];
                $this->marksheet_model->update_marksheet($updateArr, $id);
                //update student data
                $stundent_updateArr = [
                    'isuued_certificate' => 1,
                    'certificate_id' => $last_id,
                ];
                if ($this->student_model->updateSingleStudent($stundent_updateArr, $marksheet->student_id)) {
                    $this->session->set_flashdata('success', "Certificate Published");
                    redirect($this->agent->referrer());
                } else {
                    $this->session->set_flashdata('error', "Unable To Publish");
                    redirect($this->agent->referrer());
                }
            }else{
                $this->session->set_flashdata('error', "Candidate not compleated all the course. / Not all marksheet found");
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('error', "No Data Found");
            redirect($this->agent->referrer());
        }
    }

}
    
