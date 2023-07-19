<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminfranchise_controller extends Admin_Core_Controller
{

    public function __construct()
    {
        parent::__construct();
        //check user
        if (!is_admin()) {
            redirect(base_url() . 'login');
        }
    }

    public function add_franchise()
    {
        $data['courses'] = $this->course_model->get_all_courses();
        $data['title'] = ("Add franchise");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/franchise/add_franchise', $data);
        $this->load->view('admin/includes/footer');
        
    }

    public function add_franchise_post()
    {
        
        $this->form_validation->set_rules('franchise_name', 'Franchise Name', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_email', 'Email-id', 'required|xss_clean|max_length[255]|valid_email');
        $this->form_validation->set_rules('franchise_contact', 'Franchise Contact', 'required|xss_clean');
        
        $this->form_validation->set_rules('franchise_address_1', 'Franchise address line 1', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_district', 'Franchise distirct', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_state', 'Franchise address state', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_pin', 'Franchise address pin', 'required|xss_clean');
        
        
        $this->form_validation->set_rules('password', "Password", 'required|xss_clean|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('confurm_password', "Re-type Password", 'required|xss_clean|matches[password]|min_length[4]|max_length[50]');
        if ($this->form_validation->run() === false) 
        {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->franchise_model->input_values());
            redirect($this->agent->referrer());
        } 
        else 
        {
            if($this->franchise_model->add())
            {
                $last_id = $this->db->insert_id();
                
                $userName = $this->franchise_model->register_account($last_id);
                $last_user_id = $this->db->insert_id();
                //update franchise Table of ID
                $this->franchise_model->updatefranchiseIDS($last_id, $last_user_id);
                
                // update franchise balance
                $franchise = $this->franchise_model->get_franchise_by_id($last_id);
                $this->session->set_flashdata('success', "franchise added Successfully with registration number : ". $franchise->user_name);
                redirect(admin_url() . "franchises");
            }else
            {
                $this->session->set_flashdata('error', "Unable to add franchise");
                redirect('change-password');
                redirect(admin_url() . "franchises");
            }
        }
    }

    public function franchises()
    {
        $data['franchises'] = $this->franchise_model->get_all_franchises();
        
        $data['title'] = ("franchises");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/franchise/index', $data);
        $this->load->view('admin/includes/footer');
    }
    public function pending_franchises()
    {
        $data['franchises'] = $this->franchise_model->get_all_pending_franchises();
        $data['title'] = ("Pending Approval franchises");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/franchise/index', $data);
        $this->load->view('admin/includes/footer');
    }
    public function un_complete_form()
    {
        $data['franchises'] = $this->franchise_model->get_all_un_complete_franchises();
        $data['title'] = ("Un Complete Form Fracnhise");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/franchise/index', $data);
        $this->load->view('admin/includes/footer');
    }

    public function dispute_franchise_list()
    {
        $data['franchises'] = $this->franchise_model->get_all_dispute_franchises();
        $data['title'] = ("Dispute franchises");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/franchise/index', $data);
        $this->load->view('admin/includes/footer');
    }

    public function reject_franchise_list()
    {
        $data['franchises'] = $this->franchise_model->get_all_reject_franchises();
        $data['title'] = ("Rejected franchises");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/franchise/index', $data);
        $this->load->view('admin/includes/footer');
    }

    public function approve_franchise_list()
    {
        $data['franchises'] = $this->franchise_model->get_all_approved_franchises();
        $data['title'] = ("Approved franchises");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/franchise/index', $data);
        $this->load->view('admin/includes/footer');
    }

    public function view_application($id)
    {
        $data['franchise'] = $this->franchise_model->get_franchise_by_id($id);
        $data['course'] = $this->course_model->get_course_by_id($data['franchise']->course_id);
        $data['trans'] = $this->transaction_model->get_admission_trannsaction_by_userID($data['franchise']->user_id,'franchise_registeration');
        $data['title'] = ("Application Details");
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/franchise/application_details', $data);
        $this->load->view('admin/includes/footer');
    }


    public function reject_franchise_app($id)
    {
        clean_number($id);
        $franchise = $this->franchise_model->get_franchise_by_id($id);
        if (!empty($franchise)) {
            $data['title'] = "Reject Fracnhise application";
            $data['franchise'] = $franchise;
            $courses = $this->course_model->get_course_by_id(json_decode($franchise->course_id,true));
            $courses = json_decode(json_encode($courses), true);
            $data['courses'] = array_column($courses, 'title_name') ;
            $this->load->view('admin/includes/header', $data);
            $this->load->view('admin/franchise/reject_application', $data);
            $this->load->view('admin/includes/footer', $data);
        } 
        else 
        {
            $this->session->set_flashdata('error', "Invalid User");
            redirect($this->agent->referrer());
        }
    }

    public function reject_franchise_app_post()
    {
        $this->form_validation->set_rules('rejection_cause', "Rejection Cause", 'required|xss_clean|trim|min_length[5]');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($this->agent->referrer());
        } else {
            $id = clean_number($this->input->post('id', true));
            $franchise = $this->franchise_model->get_franchise_by_id($id);
            $updateArr = array(
                'approval_status' => 2,
            );
            $updateArr2 = array(
                'rejected_on' => date('Y-m-d H:i:s'),
                'status' => 3,
                'rejection_cause' => $this->input->post('rejection_cause', true),
                'franchise_id' => $id,
            );
                $this->franchise_model->addUpdateFranchise($updateArr2, 'edit');
            if ($this->authication_model->updateUsers($updateArr, $franchise->user_id)) 
            {
                $maildata = array(
                    'subject' => "Franchise application rejected",
                    'to_mail' => $franchise->franchise_email,
                    'email_content' => "<P> Dear ".$franchise->franchise_name.", <br> we are reject your application due to " . $this->input->post('rejection_cause', true) . " please contact with the authority for further details.<br> Thanks<br> Alternative Medicine Center",
                    'email_button_text' => "Find rejection Cause",
                    'email_link' => base_url(). 'login',
                    'cc' => false,
                    'email_type' => 'genaral',
                );
                $this->session->set_userdata('mds_send_email_data', json_encode($maildata));
                $this->session->set_flashdata('success', "Application Rejected");
                redirect('admin/franchises');
            } else {
                $this->session->set_flashdata('error', "Please Try Again");
                redirect($this->agent->referrer());
            }
        }
    }

    public function edit_application($id)
    {
        clean_number($id);
        $franchise = $this->franchise_model->get_franchise_by_id($id);
        if (!empty($franchise)) {
            $data['title'] = "Edit Application";
            $data['franchise_data'] = $franchise;
            $data['courses'] = $this->course_model->get_all_courses();
            $data['state'] = $this->config->item('state');
            $this->load->view('admin/includes/header', $data);
            $this->load->view('admin/franchise/edit_application', $data);
            $this->load->view('admin/includes/footer', $data);
        } else {
            $this->session->set_flashdata('error', "Invalid User");
            redirect($this->agent->referrer());
        }
    }

    public function edit_application_post()
    {
        $user = user();
        $this->form_validation->set_rules('franchise_name', 'Franchise Name', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_address_1', 'Franchise address line 1', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_district', 'Franchise distirct', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_state', 'Franchise address state', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_pin', 'Franchise address pin', 'required|xss_clean');
        $this->form_validation->set_rules('president_name', 'President Name', 'required|xss_clean');
        $this->form_validation->set_rules('president_aadhar_number', 'President Aadhar No.', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_pan_number', 'Franchise Pan Number', 'required|xss_clean');
        $this->form_validation->set_rules('president_dob', 'President Date Of Birth', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_contact', 'Franchise Contact', 'required|xss_clean');
        $this->form_validation->set_rules('franchise_email', 'Franchise Email', 'required|xss_clean');
        $this->form_validation->set_rules('course_id[]', 'Coure Id', 'required|xss_clean');
        if ($this->form_validation->run() === false) 
        {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->franchise_model->input_values());
            redirect($this->agent->referrer());
        } 
        else 
        {
            $data = $this->franchise_model->input_values();
            $data['franchise_id'] = $this->input->post('franchise_id',true);
            $data['status'] = 1;
            if($this->franchise_model->addUpdateFranchise($data,'edit'))
            {
                $franchise = $this->franchise_model->get_franchise_by_id($franchise_id);
                $this->session->set_flashdata('success', "Franchise Updated Successfully with registration number : ". $franchise->user_name);
                redirect(admin_url() . "franchises");
            }
            else
            {
                $this->session->set_flashdata('error', "Unable to add franchise");
                //redirect('change-password');
                redirect($this->agent->referrer());
            }
        }
    }

    public function frachise_approve_application($id)
    {
        clean_number($id);
        $franchise = $this->franchise_model->get_franchise_by_id($id);
        if (!empty($franchise)) {
            $data['title'] = "Approve Application";
            $data['franchise'] = $franchise;
            $courses = $this->course_model->get_course_by_id(json_decode($franchise->course_id,true));
            $courses = json_decode(json_encode($courses), true);
            $data['courses'] = array_column($courses, 'title_name') ;
            $data['franchise_feees'] = $this->franchise_model->get_franchise_fees($id);
            $this->load->view('admin/includes/header', $data);
            $this->load->view('admin/franchise/approve_application', $data);
            $this->load->view('admin/includes/footer', $data);
        } else {
            $this->session->set_flashdata('error', "Invalid User");
            redirect($this->agent->referrer());
        }
    }

    public function application_approve_post()
    {
        //debug($_POST);
        $this->form_validation->set_rules('is_payment_done','Payment Status','required|xss_clean');
        if ($this->input->post('is_payment_done',true) == 1) 
        {
           $this->form_validation->set_rules('payment_mode','Payment Mode','required|xss_clean');
           $this->form_validation->set_rules('transaction_reference','Transaction Reference','required|xss_clean');
           $this->form_validation->set_rules('transaction_date','Transaction Date','required|xss_clean');
           $this->form_validation->set_rules('transaction_time','Transaction Time','required|xss_clean');
        }
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else 
        {
            $id = clean_number($this->input->post('id', true));
            $franchise_data = $this->franchise_model->get_franchise_by_id($id);
            $franchise_fees = $this->franchise_model->get_franchise_fees();
            $aData = ['id'=>$id,'is_payment_done'=>$this->input->post('is_payment_done',true),'number_of_course'=>$this->input->post('number_of_course',true)];
            $courses = json_decode($franchise_data->course_id);
            $total_fees = $franchise_fees->franchise_fees+($franchise_fees->per_course_feee*count($courses));
            if ($this->input->post('is_payment_done',true) == 1) 
            {
                $aTransactionData = [
                                 'trn_date'=>date('Y-m-d H:i',strtotime($this->input->post('transaction_date',true).' '.$this->input->post('transaction_time',true) )),
                                 'dr'=>$total_fees,
                                 'transaction_id'=>$this->input->post('transaction_reference',true),
                                 'mode'=>$this->input->post('payment_mode',true),
                                 'payment_type'=>'franchise_registeration',
                                 'user_id'=>$franchise_data->user_id,
                                ];
               // debug($aTransactionData);die();                
                $this->transaction_model->new_payment($aTransactionData);
            }    
            
            if ($this->franchise_model->Approved($aData)) 
            {
                $maildata = array(
                    'franchise_id' => $id,
                    'email_type' => 'application_approve',
                );
                $this->session->set_userdata('mds_send_email_data', json_encode($maildata));
                $this->session->set_flashdata('success', "Application Approved");
                redirect(admin_url() . "approved-franchise");
            } else 
            {
                $this->session->set_flashdata('error', "unable to approve your application");
                redirect(admin_url() . "pending-franchise");
            }
        }
    }


}