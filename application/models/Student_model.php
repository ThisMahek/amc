<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{
    //input values
    public function input_values()
    {
      
        $data = array(
            'course_id' => $this->input->post('course_id', true),
            'session_id' => $this->input->post('session_id', true),
            'stu_name' => $this->input->post('stu_name', true),
            'f_name' => $this->input->post('f_name', true),
            'm_name' => $this->input->post('m_name'),
            'gender' => $this->input->post('gender', true),
            'dob' => $this->input->post('dob', true),
            'religion' => $this->input->post('religion', true),
            'category' => $this->input->post('category', true),
            'mobile' => $this->input->post('mobile', true),
            'email' => $this->input->post('email', true),
            'qualification' => $this->input->post('qualification', true),
            'id_prove' => $this->input->post('id_prove', true),
            'qual_details' => json_encode($this->input->post('qual_details', true)),
            'present_add_add_1' => $this->input->post('present_add_add_1', true),
            'present_add_add_2' => $this->input->post('present_add_add_2', true),
            'present_add_district' => $this->input->post('present_add_district', true),
            'present_add_state' => $this->input->post('present_add_state', true),
            'present_add_pin' => $this->input->post('present_add_pin', true),
            'premanemt_add_1' => $this->input->post('premanemt_add_1', true),
            'premanemt_add_2' => $this->input->post('premanemt_add_2', true),
            'premanemt_add_district' => $this->input->post('premanemt_add_district', true),
            'premanemt_add_state' => $this->input->post('premanemt_add_state', true),
            'premanemt_add_pin' => $this->input->post('premanemt_add_pin', true),
            'avatar' => $this->input->post('avatar', true),
            'mp_marksheet_img' => $this->input->post('mp_marksheet_img', true),
            'hs_marksheet_img' => $this->input->post('hs_marksheet_img', true),
            // 'graduate_marksheet_img' => $this->input->post('graduate_marksheet_img', true),
            'sign_img' => $this->input->post('sign_img', true),
            'id_prof_img' => $this->input->post('id_prof_img', true),
            'cast_certi_img' => $this->input->post('cast_certi_img', true),
            'password' => $this->input->post('password', true),
        );
        return $data;
    }

    public function add($franchise_id = '')
    {
        $data = $this->input_values();
        if (!empty($data["avatar"])) {
            $this->doMoveimage($data["avatar"]);
        }
        if (!empty($data["mp_marksheet_img"])) {
            $this->doMoveimage($data["mp_marksheet_img"]);
        }
        if (!empty($data["hs_marksheet_img"])) {
            $this->doMoveimage($data["hs_marksheet_img"]);
        }
        if (!empty($data["graduate_marksheet_img"])) {
            $this->doMoveimage($data["graduate_marksheet_img"]);
        }
        if (!empty($data["sign_img"])) {
            $this->doMoveimage($data["sign_img"]);
        }
        if (!empty($data["id_prof_img"])) {
            $this->doMoveimage($data["id_prof_img"]);
        }
        if (!empty($data["cast_certi_img"])) {
            $this->doMoveimage($data["cast_certi_img"]);
        }
        if (!empty($data["password"])) {
            $this->load->library('bcrypt');
            $data["password"] = $this->bcrypt->hash_password($data["password"]);
        }
        $course = $this->course_model->get_course_by_id($data['course_id']);
        $data["course_year"] =$course->duration_year;
        $data["created_on"] = date('Y-m-d H:i:s');
        $data["marksheet_details"] = $this->makeMarksheetArr($course->duration_year);
        if (!empty($franchise_id)) 
        {
          $data['franchise_id'] = $franchise_id;
        }
        if(is_admin()) {
            $academicSession = get_academic_session_by_id($data['session_id']);
            $data["pay_status"] = 1;
            $data["status"] = 1;
            $data["total_fees"] = $academicSession->total_fees;
            $data["fees_paid"] = $academicSession->admission_fees;
            $data["balance"] = ($academicSession->total_fees - $academicSession->admission_fees);
            $data["emi"] = $academicSession->installment_fees;
        }else{
            $data["pay_status"] = 0;
            $data["status"] = 0;
        }
        return $this->db->insert('students',$data);
    }

    public function register_account($last_id)
    {
        $student = $this->get_student_by_id($last_id);
        $insertArr = [
            'stu_name' => $student->stu_name,
            'stu_id' => $student->id,
            'email' => $student->email,
            'mobile' => $student->mobile,
            'email_status' => 1,
            'password' => $student->password,
            'role' => 'student',
            'user_type' => 'student',
            'banned' => 0,
            'created_on' => date('Y-m-d'),
        ];
        if (is_admin()) {
            $insertArr["approval_status"] = 1;
        } else {
            $insertArr["approval_status"] = 0;
        }
         return $this->db->insert('users', $insertArr);
    }

    public function updateStudentIDS($student_id,$user_id)
    {
        $student = $this->get_student_by_id($student_id);
        $course = $this->course_model->get_course_by_id($student->course_id);
        $roll_no = genarateRollNo($student_id);
        $reg_no = genarateRegistrationNo($course->title_name, $student_id);
        $enroll_no = genarateEnrollmentNo($course->title_name, $student_id);
        $updateStudent = [
            'roll_no'=>$roll_no,
            'reg_no'=>$reg_no,
            'enroll_no'=>$enroll_no,
            'user_name'=> $reg_no,
            'user_id'=>$user_id,    
        ];
        $updateUser = [
            'roll_no'=>$roll_no,
            'reg_no'=>$reg_no,
            'enroll_no'=>$enroll_no,
            'username' => $reg_no,
        ];
        $this->updateSingleStudent($updateStudent, $student_id);
        $this->authication_model->updateUsers($updateUser, $user_id);
    }

 /*    public function make_student_approval($last_id)
    {
        $student = $this->get_student_by_id($last_id);
            $insertArr = [
                'student_id' => $student->id,
                'user_id' => $student->user_id,
                'created_on' => date('Y-m-d'),
            ];
  
        return $this->db->insert('student_approval', $insertArr);
           
    } */

    public function maketransaction($last_id)
    {
        $student = $this->get_student_by_id($last_id);
        $course = $this->course_model->get_course_by_id($student->course_id);
        $userData = $this->authication_model->getUserIdByAppID($last_id);
        $insertArr = [
            'trn_date' => date('Y-m-d H:i:s'),
            'perticulars' => "Admission of ".$course->title,
            'dr' => $course->admission_fees,
            'cr' => 0,
            'transaction_id' => time(),
            'mode' => "offline",
            'user_id' => $userData->id,
            'made_by' => $this->session->userdata('bp_sess_user_id'),
        ];
        return $this->db->insert('transactions', $insertArr);
    }

    protected function makeMarksheetArr($year)
    {
        $retarr = array();
        for ($i=1; $i <=$year ; $i++) { 
            $retarr[$i]=0;
        }
        return json_encode($retarr);
    }

    public function get_student_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('students');
        return $query->row();
    }

    public function get_all_students($franchise_id = '')
    {
        if (!empty($franchise_id)) 
        {
          $this->db->where('franchise_id', $franchise_id);
        }
        $this->db->order_by('id',"DESC");
        $query = $this->db->get('students');
        return $query->result();
    }
    public function updateSingleStudent($data,$id)
    {
        $this->db->where('id', clean_number($id));
        return $this->db->update('students', $data);
    }

    public function update_student_application($id)
    {
        $student = $this->get_student_by_id($id);
        if(!empty($student)){
            $data = $this->input_values();
            unset($data['password']);
            $avatar = $data["avatar"];
            $mp_marksheet_img = $data["mp_marksheet_img"];
            $hs_marksheet_img = $data["hs_marksheet_img"];
            $sign_img = $data["sign_img"];
            $id_prof_img = $data["id_prof_img"];
            $cast_certi_img = $data["cast_certi_img"];
            $old_avatar = $this->input->post('old_avatar', true);
            $old_mp_marksheet_img = $this->input->post('old_mp_marksheet_img', true);
            $old_hs_marksheet_img = $this->input->post('old_hs_marksheet_img', true);
            $old_sign_img = $this->input->post('old_sign_img', true);
            $old_id_prof_img = $this->input->post('old_id_prof_img', true);
            $old_cast_certi_img = $this->input->post('old_cast_certi_img', true);
           
            if (($mp_marksheet_img != $old_mp_marksheet_img)&& !empty($mp_marksheet_img)) {
                $this->doMoveimage($data["mp_marksheet_img"]);
            }else{
                unset($data['mp_marksheet_img']);
            }
            if (($hs_marksheet_img != $old_hs_marksheet_img)&& !empty($hs_marksheet_img)) {
                $this->doMoveimage($data["hs_marksheet_img"]);
            } else {
                unset($data['hs_marksheet_img']);
            }
            if (($sign_img != $old_sign_img)&& !empty($sign_img)) {
                $this->doMoveimage($data["sign_img"]);
            } else {
                unset($data['sign_img']);
            }
            if (($cast_certi_img != $old_cast_certi_img)&& !empty($cast_certi_img)) {
                $this->doMoveimage($data["cast_certi_img"]);
            } else {
                unset($data['cast_certi_img']);
            }
            if (($avatar != $old_avatar) && !empty($avatar)) {
                $this->doMoveimage($data["avatar"]);
            } else {
                unset($data['avatar']);
            }
            if (($id_prof_img != $old_id_prof_img)&& !empty($id_prof_img)) {
                $this->doMoveimage($data["id_prof_img"]);
            } else {
                unset($data['id_prof_img']);
            }
            $this->db->where('id', clean_number($id));
            return $this->db->update('students', $data);
        }else{
            return false;
        }
    }

    public function updateStudentAccount($id)
    {
        $student = $this->get_student_by_id($id);
        $user_id = $student->user_id;
        $updateArr = [
            'stu_name'=>$student->stu_name,
            'email'=>$student->email,
            'mobile'=>$student->mobile,
            'avatar'=>$student->avatar,
        ];
        return $this->authication_model->updateUsers($updateArr, $user_id);

    }

   




    // move images
    public function doMoveimage($file)
    {
        $source = FCPATH . "/uploads/tempimg/";
        $destination = FCPATH . "/uploads/student_images/";
        if (!empty($file)) {
            if (@rename($source . $file, $destination . $file)) {
                return true;
            } else {
                return true;
            }
        }
    }

    public function get_student_by_username($user_name)
    {
        $this->db->where('user_name', $user_name);
        $query = $this->db->get('students');
        return $query->row();
    }

    public function get_all_pending_students($franchise_id = '')
    {
        if (!empty($franchise_id)) 
        {
           $this->db->where('franchise_id', $franchise_id);
        }
        $this->db->order_by('id', "DESC");
        $this->db->where('status', 0);
        $this->db->where('pay_status', 1);
        $query = $this->db->get('students');
        return $query->result();
    }

    public function takeAdmission($id,$session_id)
    {
        $student = $this->get_student_by_id($id);
        $user_id = $student->user_id;
        $academicSession = get_academic_session_by_id($session_id);
        
       
        // 
        $admissionArr = [
            'status'=>1,
            'session_id'=> $session_id,
            'total_fees' => $academicSession->total_fees,
            'fees_paid' => $academicSession->admission_fees,
            'balance' => ($academicSession->total_fees - $academicSession->admission_fees),
            'emi' => $academicSession->installment_fees,
        ];
        $updateArr = [
            'approval_status' =>1,
            
        ];
        $this->updateSingleStudent($admissionArr, $id);
        return $this->authication_model->updateUsers($updateArr, $user_id);
    }

    public function get_all_approved_students($franchise_id = '')
    {
        if (!empty($franchise_id)) 
        {
           $this->db->where('franchise_id', $franchise_id);
        }
        $this->db->order_by('id', "DESC");
        $this->db->where('status', 1);
        $this->db->where('pay_status', 1);
        $query = $this->db->get('students');
        return $query->result();
    }

    public function get_all_reject_students($franchise_id = '')
    {
        if (!empty($franchise_id)) 
        {
           $this->db->where('franchise_id', $franchise_id);
        }
        $this->db->order_by('id', "DESC");
        $this->db->where('status', 2);
        $this->db->where('pay_status', 1);
        $query = $this->db->get('students');
        return $query->result();
    }

    public function get_all_dispute_students($franchise_id = '')
    {
        if (!empty($franchise_id)) 
        {
           $this->db->where('franchise_id', $franchise_id);
        }
        $this->db->order_by('id', "DESC");
        $this->db->where('status', 3);
        $this->db->where('pay_status', 1);
        $query = $this->db->get('students');
        return $query->result();
    }

    public function reupload_docs($data,$id,$user_id,$cust)
    {
        
        $userUpdateArr = [];
        if (!empty($data["avatar"])) {
            $this->doMoveimage($data["avatar"]);
            $userUpdateArr['avatar']=$data['avatar'];
        }else{
            unset($data['avatar']);
        }
        if (!empty($data["mp_marksheet_img"])) {
            $this->doMoveimage($data["mp_marksheet_img"]);
        } else {
            unset($data['mp_marksheet_img']);
        }
        if (!empty($data["hs_marksheet_img"])) {
            $this->doMoveimage($data["hs_marksheet_img"]);
        } else {
            unset($data['hs_marksheet_img']);
        }
        if (!empty($data["graduate_marksheet_img"])) {
            $this->doMoveimage($data["graduate_marksheet_img"]);
        } else {
            unset($data['graduate_marksheet_img']);
        }
        if (!empty($data["sign_img"])) {
            $this->doMoveimage($data["sign_img"]);
        } else {
            unset($data['sign_img']);
        }
        if (!empty($data["id_prof_img"])) {
            $this->doMoveimage($data["id_prof_img"]);
        } else {
            unset($data['id_prof_img']);
        }
        if($cust===true){
            if (!empty($data["cast_certi_img"])) {
               $this->doMoveimage($data["cast_certi_img"]);
            }
        }else{
                unset($data['cast_certi_img']);
        }
        if (!empty($data)){
            $data['status']=0;
            $userUpdateArr['approval_status']=0;
            $this->updateSingleStudent($data, $id);
            $this->authication_model->updateUsers($userUpdateArr, $user_id);
            return true;
        }else{
            return false;
        }
    }

    public function get_student_count($where = "")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('students');
        return $query->num_rows();
    }

    public function get_student_dashboard($where="")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by('id',"DESC");
        $this->db->limit(5);
        $query = $this->db->get('students');
        return $query->result();
    }

    public function get_students_condition($where = "")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('students');
        return $query->result();
    }

    public function get_student_condition($where = "")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('students');
        return $query->row();
    }


    //old student
    public function get_old_student_condition($where = "")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('old_marksheet');
        return $query->row();
    }



}
