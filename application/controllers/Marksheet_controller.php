<?php defined('BASEPATH') or exit('No direct script access allowed');
class Marksheet_controller extends Admin_Core_Controller
{
    public function __construct()
    {
        parent::__construct();
        //check user
        if (!is_admin()) {
            redirect(base_url() . 'login');
        }
    }

   

    public function add_marksheet()
    {
        $data['courses'] = $this->course_model->get_all_courses();
        $data['title'] = ("Add Marksheet");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/marksheet/add_marksheet', $data);
        $this->load->view('admin/includes/footer');
    }

    public function add_edit_marksheet($student_id)
    {
        $student = $this->student_model->get_student_by_id(clean_number($student_id));
       
       
        $marksheetData = $this->marksheet_model->getMarksheetMarks(['course_id'=>$student->course_id , 'session_id'=>$student->session_id , 'student_id'=>$student->id]);
        // if no subject set for the student then set marksheet for all subjects
        if(empty($marksheetData)){
            $course = $this->course_model->get_course_by_id($student->course_id);
            $year = $course->duration_year;
            for ($i = 1; $i <= $year; $i++) {
                $subjects = $this->subject_model->getSubjectByCourseYear($student->course_id, $i);
                if (!empty($subjects)) {
                    foreach ($subjects as $subject) {
                        $insertArr = [
                            'course_id' => $student->course_id,
                            'session_id' => $student->session_id,
                            'student_id' => $student->id,
                            'subject_id' => $subject->id,
                            'sub_code' => $subject->sub_code,
                            'theory_obtain' => 0,
                            'practical_obtain' => 0,
                            'assessment_obtain' => 0,
                            'theory_full' => $subject->theory,
                            'practical_full' => $subject->practical,
                            'assessment_full' => $subject->internal_assessment,
                            'year' => $subject->year,
                        ];
                      $this->marksheet_model->add($insertArr);
                    }
                } 
            }
            $data['marksheetData'] = $this->marksheet_model->getMarksheetMarks(['course_id' => $student->course_id, 'session_id' => $student->session_id, 'student_id' => $student->id]);
            $data['student'] = $student;
        }else{
            $data['marksheetData'] = $marksheetData;
            $data['student'] = $student;
        }
        $data['title'] = ("Add / Update Marksheet");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/marksheet/add_edit_marksheet', $data);
        $this->load->view('admin/includes/footer');
    }

    public function add_marksheet_post()
    {
        
        $postdata = $_POST;
        $i = 0;
        foreach ($postdata['ids']  as $single_id) {
            $id = $single_id;
            $theory_obtain = $age =  trim($postdata['theory_obtain'][$i]);
            $practical_obtain = $age =  trim($postdata['practical_obtain'][$i]);
            $assessment_obtain = $age =  trim($postdata['assessment_obtain'][$i]);
            $updateArr =[
                'theory_obtain'=> $theory_obtain,
                'practical_obtain'=> $practical_obtain,
                'assessment_obtain'=> $assessment_obtain,
            ];
            $i++;
            $this->marksheet_model->update($updateArr,$id);
        }
        $this->session->set_flashdata('success', "Marksheet Updated");
        redirect($this->agent->referrer());
    }

    public function pending_marksheets()
    {
        $data['marksheets'] = $this->marksheet_model->get_all_distinct_marksheet_marks();
        $data['title'] = ("Pending Marksheet");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/marksheet/pending_marksheet', $data);
        $this->load->view('admin/includes/footer');
    }

    public function create_marksheet($year,$student_id)
    {
        $student = $this->student_model->get_student_by_id(clean_number($student_id));
        $marksheet = $this->marksheet_model->getMarksheet(['course_id' => $student->course_id, 'session_id' => $student->session_id, 'student_id' => $student->id,'year'=>$year]);
        if(!empty($marksheet)){
            // markshet found update only marks
            $marksheet_id = $marksheet->id;
            $marks = $this->getMarksFormTable($year,$student);
            $updateArr = [
                'student_id'=>$student->id,
                'course_id'=>$student->course_id,
                'session_id'=>$student->session_id,
                'year'=>$year,
                'roll_no'=>$student->roll_no,
                'enroll_no'=>$student->enroll_no,
                'reg_no'=>$student->reg_no,
                'marks_details'=> $marks['marks_data'],
                'total_marks'=> $marks['full_marks'],
                'total_obtain_marks'=> $marks['marks_obtain'],
                'is_published'=> 0,
            ];
            $this->marksheet_model->update_marksheet($updateArr,$marksheet_id);
            $this->session->set_flashdata('success', "Marksheet ready for publish");
            redirect($this->agent->referrer());

        }else{
            // get marks & create new Entry
            $marks = $this->getMarksFormTable($year,$student);
            $insertArr =[
                'student_id' => $student->id,
                'course_id' => $student->course_id,
                'session_id' => $student->session_id,
                'year' => $year,
                'roll_no' => $student->roll_no,
                'enroll_no' => $student->enroll_no,
                'reg_no' => $student->reg_no,
                'marks_details' => $marks['marks_data'],
                'total_marks' => $marks['full_marks'],
                'total_obtain_marks' => $marks['marks_obtain'],
                'is_published' => 0,
                'marksheet_sl_no'=> genarateMarksheetSlNo(),
            ];
            $this->marksheet_model->add_marksheet($insertArr);
            $last_id = $this->db->insert_id();
            $this->session->set_flashdata('success', "Marksheet ready for publish");
            redirect($this->agent->referrer());
        }
    }

    private function getMarksFormTable($year,$studentData)
    {
        $th_tot = 0;
        $prac_tot = 0;
        $ass_tot = 0;
        $th_opt =0;
        $prac_opt =0;
        $ass_opt =0;
        $response =[];
        $marks = $this->marksheet_model->getMarksheetMarks(['course_id' => $studentData->course_id, 'session_id' => $studentData->session_id, 'student_id' => $studentData->id,'year'=>$year]);
        foreach ($marks as $mark) {
            $th_tot +=$mark->theory_full;
            $prac_tot +=$mark->practical_full;
            $ass_tot +=$mark->assessment_full; 
            $th_opt+= $mark->theory_obtain;
            $prac_opt+= $mark->practical_obtain;
            $ass_opt+= $mark->assessment_obtain;
        }
        $full_marks = $th_tot+$prac_tot+$ass_tot;
        $marks_obtain = $th_opt+$prac_opt+$ass_opt;
        $response['marks_data'] = json_encode($marks);
        $response['full_marks'] = $full_marks;
        $response['marks_obtain'] = $marks_obtain;
        return $response;
    }

    public function waiting_marksheets()
    {
        $data['marksheets'] = $this->marksheet_model->get_all_marksheets(['is_published'=>0]);
        $data['title'] = ("Waiting Marksheet For Publish");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/marksheet/waiting_marksheet', $data);
        $this->load->view('admin/includes/footer');
    }

    public function mark_pass_fail($id)
    {
        $this->marksheet_model->mark_pass_fail(clean_number($id));
        $this->session->set_flashdata('success', "Item Updated");
        redirect($this->agent->referrer());
    }

    public function publish_marksheet($id)
    {
        $marksheet = $this->marksheet_model->get_marksheet_by_id(clean_number($id));
        if(!empty($marksheet)){
            $updateArr = [
                'is_published'=>1,
                'published_on'=>date('Y-m-d H:i:s'),
            ];
            $this->marksheet_model->update_marksheet($updateArr,$id);
            $student = $this->student_model->get_student_by_id(clean_number($marksheet->student_id));
            $marksheet_details = json_decode($student->marksheet_details,true);
            // set marksheet data for student
            $marksheet_details[$marksheet->year] = $marksheet->id;
            $stundent_updateArr = [
                'marksheet_details'=>json_encode($marksheet_details),
            ];
            if($this->student_model->updateSingleStudent($stundent_updateArr, $marksheet->student_id)){
                $this->session->set_flashdata('success', "Marksheet Published");
                redirect($this->agent->referrer());
            }else{
                $this->session->set_flashdata('error', "Unable To Publish");
                redirect($this->agent->referrer());
            }
            
        }else{
            $this->session->set_flashdata('error', "No Data Found");
            redirect($this->agent->referrer());
        }
    }

    public function marksheets()
    {
        $data['marksheets'] = $this->marksheet_model->get_all_marksheets(['is_published' => 1]);
        $data['title'] = ("Published Marksheets");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/marksheet/published_marksheet', $data);
        $this->load->view('admin/includes/footer');
    }

    public function print_marksheet($id)
    {
        $data['marksheet'] = $this->marksheet_model->get_marksheet_by_id($id);
        $data['student'] = $this->student_model->get_student_by_id(clean_number($data['marksheet']->student_id));
        $this->load->view('admin/marksheet/print_marksheet', $data);
    }

    public function publish_certificate($id)
    {
        $marksheet= $this->marksheet_model->get_marksheet_by_id($id);
    }
}