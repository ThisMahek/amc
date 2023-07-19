<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_crontroller extends Home_Core_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        # code...
    }

    public function sendNewsletterEmails()
    {
        $list = $this->db->query("SELECT * FROM newsletter_cron_emails WHERE status=0")->result();
        if (!empty($list)) {
            
        }
    }

    public function genarateMothlyFees()
    {
        $list = $this->db->query("SELECT * FROM students WHERE status=1 AND balance > 0")->result();
        if(!empty($list)){
            foreach ($list as $student) {
                $insertArr = [
                    'student_id'=>$student->id,
                    'user_id'=>$student->user_id ,
                    'course_id'=>$student->course_id ,
                    'session_id'=>$student->session_id ,
                    'particulars'=>"Monthly tution fee for the month of ".date("M-Y"),
                    'amount'=>$student->emi,
                    'status'=>0,
                    'created_on'=>date("Y-m-d H:i:s"),
                ];
                $this->tutionfee_model->add($insertArr);
            }
        }
    }

    
}