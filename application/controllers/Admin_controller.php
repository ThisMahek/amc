<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_controller extends Admin_Core_Controller {
	function __construct () {
		parent::__construct();
		if (!auth_check()) {
			redirect('login');
		}
		if (!is_admin()) {
			redirect('dashboard');
		}
	}

    public function index()
    {
        $data['title'] = "Admin Panel";
        $data['total_student'] = $this->student_model->get_student_count();
        $data['pending_student'] = $this->student_model->get_student_count(['status'=>0]);
        $data['reject_student'] = $this->student_model->get_student_count(['status' => 2]);
        $data['approve_student'] = $this->student_model->get_student_count(['status' => 1]);
        $data['disputed_applications'] = $this->student_model->get_student_dashboard(['status' => 3]);
        $data['pending_apps'] = $this->student_model->get_student_dashboard(['status' => 0]);
        $data['last_contacts'] = $this->contact_model->get_last_contact_messages();
        
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/index',$data);
        $this->load->view('admin/includes/footer');
    }

    public function settings()
    {
        $data['title'] = "settings";
        $data['panel_settings'] = $this->settings_model->get_panel_settings();
        $data['settings'] = $this->settings_model->get_settings();
        $data['general_settings'] = $this->settings_model->get_general_settings();

        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/settings/settings');
        $this->load->view('admin/includes/footer');
    }
    /**
     * Recaptcha Settings Post
     */
    public function recaptcha_settings_post()
    {
        if ($this->settings_model->update_recaptcha_settings()) {
            $this->session->set_flashdata('success', "Setting Updated");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "Unable To Update Settings");
            redirect($this->agent->referrer());
        }
    }

    /**
     * Settings Post
     */
    public function settings_post()
    {
        if ($this->settings_model->update_settings()) {
            $this->settings_model->update_general_settings();
            $this->session->set_flashdata('success', "Setting Updated");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "Unable To Update Settings");
            redirect($this->agent->referrer());
        }
    }

    public function emailSettings()
    {
        $data['title'] = "Email Settings";
        $data['general_settings'] = $this->settings_model->get_general_settings();
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/settings/email-settings');
        $this->load->view('admin/includes/footer');
    }

    /**
     * Email Settings Post
     */
    public function emailSettings_post()
    {
        if ($this->settings_model->update_email_settings()) {
            $this->session->set_flashdata('success', "Setting Updated");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "Unable To Update Settings");
            redirect($this->agent->referrer());
        }
    }

    
    public function payment_settings()
    {
        $data['title'] = "payment Settings";
        $data['general_settings'] = $this->settings_model->get_general_settings();
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/settings/payment-settings');
        $this->load->view('admin/includes/footer');
    }

    public function payment_settings_post()
    {
        if ($this->settings_model->update_razorpay_settings()) {
            $this->session->set_flashdata('success', "Setting Updated");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "Unable To Update Settings");
            redirect($this->agent->referrer());
        }
    }


    /*
    *PAGINATION SETTING
    */
    public function paginationSettings()
    {
        $data['title'] = "Pagination Settings";
        $data['general_settings'] = $this->settings_model->get_general_settings();
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/settings/pagination-settings');
        $this->load->view('admin/includes/footer');
    }

    /**
     * PAGINATION Settings Post
     */
    public function paginationSettings_post()
    {
        if ($this->settings_model->update_pagination_settings()) {
            $this->session->set_flashdata('success', "Setting Updated");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "Unable To Update Settings");
            redirect($this->agent->referrer());
        }
    }


    /*
    *-------------------------------------------------------------------------------------------------
    * Visual SETTINGS
    *-------------------------------------------------------------------------------------------------
    */

    /*
    * Visual Settings
    */
    public function visual_settings()
    {
        $data['title'] = "visual settings";
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/settings/visual_settings', $data);
        $this->load->view('admin/includes/footer');
    }

    /**
     * Visual Settings Post
     */
    public function visual_settings_post()
    {
        if ($this->settings_model->update_visual_settings()) {
            $this->session->set_flashdata('success', "Setting Updated");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "Unable To Update Settings");
            redirect($this->agent->referrer());
        }
        
    }
    /*
    *-------------------------------------------------------------------------------------------------
    * Contact Message
    *-------------------------------------------------------------------------------------------------
    */
    public function contact_messages()
    {
        $data['title'] = "Contact Messages";
        $data['messages'] = $this->contact_model->get_contact_messages();
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/contact/contact_messages', $data);
        $this->load->view('admin/includes/footer');
    }

    /**
     * Delete Contact Message Post
     */
    public function delete_contact_message_post()
    {
        $id = $this->input->post('id', true);

        if ($this->contact_model->delete_contact_message($id)) {
            $this->session->set_flashdata('success', "Message Deleted");
        } else {
            $this->session->set_flashdata('error', "Unable to delete meassage");
        }
    }

    public function reply_message($id)
    {
        $data['title'] = "Reply Contact Message";
        $data['message'] = $this->contact_model->get_contact_message($id);
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/contact/reply_contact_messages', $data);
        $this->load->view('admin/includes/footer');
    }

    public function reply_message_post()
    {
        $this->form_validation->set_rules('email', "Reply To", 'required|xss_clean');
        $this->form_validation->set_rules('reply_subject', "Sujbect", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('reply_message', "Message", 'required|xss_clean');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            $id = $this->input->post('id', true);
            $data=[
                'reply_message' => $this->input->post('reply_message', true),
                'reply_subject' => $this->input->post('reply_subject', true),
                'is_replied'=>1,
            ];
            if ($this->contact_model->add_reply($data,$id)) {
                //send email to customer 
                
                $this->session->set_flashdata('success', "Reply added suucessfully");
                redirect(admin_url() . 'contact-messages');
            } else {
                $this->session->set_flashdata('error', "Unable to add reply");
                redirect($this->agent->referrer());
            }
        }
    }

    public function view_reply_message($id)
    {
        $data['title'] = "View Reply Contact Message";
        $data['message'] = $this->contact_model->get_contact_message($id);
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/contact/view_reply_contact_messages', $data);
        $this->load->view('admin/includes/footer');
    }

    /*
    *-------------------------------------------------------------------------------------------------
    * NEWSLETTER
    *-------------------------------------------------------------------------------------------------
    */


    /**
     * Newsletter
     */
    public function newsletter()
    {
        $data['title'] = "Newsletter";
        $data['subscribers'] = $this->newsletter_model->get_subscribers();
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/newsletter/newsletter', $data);
        $this->load->view('admin/includes/footer');
    }

    /**
     * Send Email
     */
    public function newsletter_send_email()
    {
        
        $data['title'] = "Newsletter";
        $emails = $this->input->post('email');
        if (empty($emails)) {
            $this->session->set_flashdata('error', "No Eamil seleted!");
            redirect($this->agent->referrer());
            exit();
        }
        $data['emails'] = $emails;
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/newsletter/send_email', $data);
        $this->load->view('admin/includes/footer');
    }

    /**
     * Send Email Post
     */
    public function newsletter_send_email_post()
    {
        $fres = false;
        $subject = $this->input->post('subject',true);
        $message = $this->input->post('message',true);
        $sender = $this->input->post('sender',true);
        $sendUserArr = explode("|",$sender);
        foreach ($sendUserArr as $to) {
            $data = ['email'=>$to, 'subject'=>$subject, 'body'=> $message, 'status'=>0];
            if ($this->newsletter_model->add_newsletter_cron($data)){
                $fres=true;
            }else{
                $fres = false;
            }
        }
        if ($fres) {
            $this->session->set_flashdata('success', "Newsletter contains saved succesfuly. System will autoshoot the emails");
            redirect(admin_url() . 'newsletter');
        } else {
            $this->session->set_flashdata('error', "Unable save newsletter contails");
            redirect(admin_url() . 'newsletter');
        }
    }

   
    /**
     * Delete Newsletter Post
     */
    public function delete_newsletter_post()
    {

        $id = $this->input->post('id', true);
        $data['newsletter'] = $this->newsletter_model->get_subscriber_by_id($id);
        if (empty($data['newsletter'])) {
            $this->session->set_flashdata('error', "Unable to delete");
        } else {
            if ($this->newsletter_model->delete_from_subscribers($id)) {
                $this->session->set_flashdata('success', " Item successfully deleted!");
            } else {
                $this->session->set_flashdata('error', "Unable to delete");
            }
        }
    }

    /*
    *-------------------------------------------------------------------------------------------------
    * Slider SETTINGS
    *-------------------------------------------------------------------------------------------------
    */
    public function sliders()
    {
        $data['title'] = ("slider items");
        $data['slider_items'] = $this->slider_model->get_slider_items_all();
        $data['lang_search_column'] = 3;
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/slider/slider', $data);
        $this->load->view('admin/includes/footer');
    }

    /**
     * Add Slider Item Post
     */
    public function add_slider_item_post()
    {
        if ($this->slider_model->add_item()) {
            $this->session->set_flashdata('success', ("Slider Added"));
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', ("Unable to add slider"));
            redirect($this->agent->referrer());
        }
    }

    /**
     * Update Slider Item
     */
    public function update_slider_item($id)
    {
        $data['title'] = ("update slider item");
        //get item
        $data['item'] = $this->slider_model->get_slider_item($id);

        if (empty($data['item'])) {
            redirect($this->agent->referrer());
        }
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/slider/update_slider', $data);
        $this->load->view('admin/includes/footer');
    }


    /**
     * Update Slider Item Post
     */
    public function update_slider_item_post()
    {
        //item id
        $id = $this->input->post('id', true);
        if ($this->slider_model->update_item($id)) {
            $this->session->set_flashdata('success', ("Item Updated"));
            redirect(admin_url() . 'sliders');
        } else {
            $this->session->set_flashdata('error', ("Update Errer"));
            redirect($this->agent->referrer());
        }
    }

    /**
     * Update Slider Settings Post
     */
    public function update_slider_settings_post()
    {
        if ($this->slider_model->update_slider_settings()) {
            $this->session->set_flashdata('success', ("Item Updated"));
            $this->session->set_flashdata('msg_settings', 1);
        } else {
            $this->session->set_flashdata('error', ("Update Errer"));
            $this->session->set_flashdata('msg_settings', 1);
        }
        redirect($this->agent->referrer());
    }

    /**
     * Delete Slider Item Post
     */
    public function delete_slider_item_post()
    {
        $id = $this->input->post('id', true);
        if ($this->slider_model->delete_slider_item($id)) {
            $this->session->set_flashdata('success', ("Slider deleted"));
        } else {
            $this->session->set_flashdata('error', ("Unable to delete item"));
        }
    }

    /*
    *-------------------------------------------------------------------------------------------------
    * HOMEPAGE CONTENT SETTINGS
    *-------------------------------------------------------------------------------------------------
    */

    public function home_about_settings()
    {
        $data['title'] = "Home About Settings";
        $data['panel_data'] = $this->homepage_model->get_about_data();
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/hompage/about');
        $this->load->view('admin/includes/footer');
    }

    public function home_about_settings_post()
    {
        if ($this->homepage_model->update_about_data()) {
            $this->session->set_flashdata('success', "Data Updated");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "Unable To Update Data");
            redirect($this->agent->referrer());
        }
    }

    /*
    *-------------------------------------------------------------------------------------------------
    * HOMEPAGE Counter SETTINGS
    *-------------------------------------------------------------------------------------------------
    */

    public function home_counter_settings()
    {
        $data['title'] = "Home About Settings";
        $data['panel_data'] = $this->homepage_model->get_counter_data();
        $this->load->view('admin/includes/header', $data);
        $this->load->view('admin/hompage/counter');
        $this->load->view('admin/includes/footer');
    }

    public function home_counter_settings_post()
    {
       
        if ($this->homepage_model->update_counter_data()) {
            $this->session->set_flashdata('success', "Data Updated");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "Unable To Update Data");
            redirect($this->agent->referrer());
        }
    }




}