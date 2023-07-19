<?php defined('BASEPATH') or exit('No direct script access allowed');

class Newsletter_model extends CI_Model
{
    //add to subscriber
    public function add_subscriber($email)
    {
        $data = array(
            'email' => $email
        );
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('subscribers', $data);
    }

    //update subscriber token
    public function update_subscriber_token($email)
    {
        $subscriber = $this->get_subscriber($email);
        if (!empty($subscriber)) {
            if (empty($subscriber->token)) {
                $data = array(
                    'token' => generate_unique_id()
                );
                $this->db->where('email', $email);
                $this->db->update('subscribers', $data);
            }
        }
    }

    //get subscribers
    public function get_subscribers()
    {
        return $this->db->order_by('id DESC')->get('subscribers')->result();
    }

    //get subscriber
    public function get_subscriber($email)
    {
        return $this->db->where('email', clean_str($email))->get('subscribers')->row();
    }

    //get subscriber by id
    public function get_subscriber_by_id($id)
    {
        return $this->db->where('id', clean_number($id))->get('subscribers')->row();
    }

    //delete from subscribers
    public function delete_from_subscribers($id)
    {
        $this->db->where('id', clean_number($id));
        return $this->db->delete('subscribers');
    }

    //get subscriber by token
    public function get_subscriber_by_token($token)
    {
        return $this->db->where('token', clean_str($token))->get('subscribers')->row();
    }

    //unsubscribe email
    public function unsubscribe_email($email)
    {
        $this->db->where('email', clean_str($email));
        $this->db->delete('subscribers');
    }

    //update settings
    public function update_settings()
    {
        $data = array(
            'newsletter_status' => $this->input->post('newsletter_status', true),
            'newsletter_popup' => $this->input->post('newsletter_popup', false)
        );
        $this->db->where('id', 1);
        return $this->db->update('general_settings', $data);
    }

    //send email
    public function send_email($email, $subject, $body)
    {
        $this->load->model("email_model");
        if ($this->email_model->send_email_newsletter($email, $subject, $body)) {
            return true;
        }
        return false;
    }

    /*
    *-------------------------------------------------------------------------------------------------
    * NEWSLETTER SEND FOR CRON
    *-------------------------------------------------------------------------------------------------
    */    
    public function add_newsletter_cron($data)
    {
        return $this->db->insert('newsletter_cron_emails', $data);
    }

    public function update_newsletter_cron($id)
    {
        $data = array(
            'status' => 1,
        );
        $this->db->where('id', $id);
        return $this->db->update('newsletter_cron_emails', $data);
    }
    public function delete_newsletter_cron()
    {
        $this->db->where('status', 1);
        $this->db->delete('newsletter_cron_emails');
    }
    



}
