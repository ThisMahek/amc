<?php defined('BASEPATH') or exit('No direct script access allowed');

class Payment_controller extends Home_Core_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Index
     */
    public function index($userName)
    {
        get_method();
        $userName = clean_slug($userName);
        $student = $this->student_model->get_student_by_username($userName);
        $course = $this->course_model->get_course_by_id($student->course_id);
        if (!empty($student)) {
            if ($student->pay_status==1) {
                $this->session->set_flashdata('success', "Payment already compleated");
                redirect($this->agent->referrer());
                exit;
            }
            $data['amount'] = $course->admission_fees;
            $data['description'] = "New admission for the course " .$course->title_name ;
            $data['payment_type'] = "admission";
            $data['user_email'] = $student->email;
            $data['user_mobile'] = $student->mobile;
            $data['title'] = 'Admission Fees Payment';
            $data['keywords'] = 'Admission Fees Payment' . "," . $this->app_name;
            $data['breadcrumb'] = 'Admission Fees Payment';
            $data['course'] = $course;
            $data['student'] = $student;
            $this->load->view('partials/header', $data);
            $this->load->view('payment/course_admission_payment', $data);
            $this->load->view('partials/footer');
        } else {
            $this->session->set_flashdata('error', "No such order found");
            redirect($this->agent->referrer());
        }

    }

    public function cancel_payment($order_id)
    {
        $order = $this->order_model->get_order($order_id);
        if (!empty($order)) {
            if ($this->order_model->delete_order($order_id)) {
                $this->session->set_flashdata('success', "Order Canceled");
                redirect('new-advertisement');
            } else {
                $this->session->set_flashdata('error', "No such order found");
                redirect('new-advertisement');
            }
        } else {
            $this->session->set_flashdata('error', "No such order found");
            redirect('new-advertisement');
        }
    }

    public function razorpay_payment_post()
    {
        $this->load->library('razorpay');
        $data_transaction = [
            'payment_id' => $this->input->post('payment_id', true),
            'razorpay_order_id' => $this->input->post('razorpay_order_id', true),
            'razorpay_signature' => $this->input->post('razorpay_signature', true),
            'currency' => $this->input->post('currency', true),
            'payment_amount' => $this->input->post('payment_amount', true),
            'payment_status' => $this->input->post('payment_status', true),
            'mds_payment_type' => $this->input->post('mds_payment_type', true),
            'mds_payment_type' => $this->input->post('mds_payment_type', true),
            'user_name' => $this->input->post('user_name', true),
        ];

        if (empty($this->razorpay->verify_payment_signature($data_transaction))) {
            $this->session->set_flashdata('errors', 'Invalid signature passed!');

            $data = array(
                'status' => 0,
                'redirect' => base_url() . "admission-payment/" . $data_transaction['user_name'],
            );
            echo json_encode($data);
            exit();
        }
        $mds_payment_type = $this->input->post('mds_payment_type', true);
        if ($mds_payment_type == 'admission') {
            $this->compleate_admission_application($data_transaction, 'json_encode');
        } elseif ($mds_payment_type == 'tution-fee') {
            $this->compleate_monthly_tution_fees($data_transaction, 'json_encode');
        } elseif ($mds_payment_type == 'exam-fee') {
             $this->compleate_exam_fees($data_transaction, 'json_encode');
        }
    }

    public function compleate_admission_application($data_transaction, $redirect_type = 'json_encode')
    {
        $student = $this->student_model->get_student_by_username($data_transaction['user_name']);
        $course = $this->course_model->get_course_by_id($student->course_id);
        $insertArr = [
            'trn_date' => date('Y-m-d H:i:s'),
            'perticulars' => "Admission of " . $course->title,
            'dr' => $course->admission_fees,
            'cr' => 0,
            'transaction_id' => $data_transaction['payment_id'],
            'mode' => "online",
            'user_id' => $student->user_id,
            'made_by' => $student->user_id,
            'student_id' => $student->id,

        ];
        $this->transaction_model->new_payment($insertArr);
        $updateStudent = [
            'pay_status' => 1,
        ];
        $this->student_model->updateSingleStudent($updateStudent, $student->id);
        if ($redirect_type == 'json_encode') {

            $this->session->set_flashdata('success', 'Payment Done Successfully');
            $data = array(
                'result' => 1,
                'redirect' => base_url() . "admission-compleated/" . $data_transaction['user_name'],
            );
            echo json_encode($data);
        }
    }

    public function compleate_monthly_tution_fees($data_transaction, $redirect_type = 'json_encode')
    {
        $fee = $this->tutionfee_model->get_tution_fee(clean_number($data_transaction['user_name']));
        $student =$this->student_model->get_student_by_id($fee->student_id);
        $insertArr = [
            'trn_date' => date('Y-m-d H:i:s'),
            'perticulars' => $fee->particulars,
            'dr' => $fee->amount,
            'cr' => 0,
            'transaction_id' => $data_transaction['payment_id'],
            'mode' => "online",
            'user_id' => $student->user_id,
            'student_id' => $student->id,
            'made_by' => $student->user_id,
        ];
        $this->transaction_model->new_payment($insertArr);
        $balance = $student->balance;
        $fees_paid = $student->fees_paid;
        $newFP = $fees_paid+ $fee->amount;
        $newBal = $balance- $fee->amount;
        $updateStudent = [
            'balance' => $newBal,
            'fees_paid' => $newFP,
        ];
        $this->student_model->updateSingleStudent($updateStudent, $student->id);
        $updateFees = [
            'status'=>1,
            'payment_on' => date('Y-m-d H:i:s'),
            'pay_type'=>'online',
            'trans_id' => $data_transaction['payment_id'],
        ];
        $this->tutionfee_model->update_monthly_tution_fees($updateFees,$fee->id);

        if ($redirect_type == 'json_encode') {
            $this->session->set_flashdata('success', 'Payment Done Successfully');
            $data = array(
                'result' => 1,
                'redirect' => student_url() . "monthly-tution-fees",
            );
            echo json_encode($data);
        }
    }

    public function compleate_exam_fees($data_transaction, $redirect_type = 'json_encode')
    {
        # code...
    }
}