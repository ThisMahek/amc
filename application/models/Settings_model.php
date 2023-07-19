<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model
{
    //update settings
    public function update_settings()
    {
        $data = array(
            'site_title' => $this->input->post('site_title', true),
            'homepage_title' => $this->input->post('homepage_title', true),
            'site_description' => $this->input->post('site_description', true),
            'keywords' => $this->input->post('keywords', true),
            'facebook_url' => $this->input->post('facebook_url', true),
            'twitter_url' => $this->input->post('twitter_url', true),
            'instagram_url' => $this->input->post('instagram_url', true),
            'linkedin_url' => $this->input->post('linkedin_url', true),
            'youtube_url' => $this->input->post('youtube_url', true),
            'contact_text' => $this->input->post('contact_text', false),
            'contact_address' => $this->input->post('contact_address', true),
            'contact_email' => $this->input->post('contact_email', true),
            'contact_phone' => $this->input->post('contact_phone', true),
            'about_us' => $this->input->post('about_us', true),
            'map' => $this->input->post('map'),
        );
        $lang_id = $this->input->post('lang_id', true);

        $this->db->where('lang_id', 1);
        return $this->db->update('settings', $data);
    }

    //update general settings
    public function update_general_settings()
    {
        $data = array(
            'application_name' => $this->input->post('application_name', true),
            'custom_css_codes' => $this->input->post('custom_css_codes', false),
            'custom_javascript_codes' => $this->input->post('custom_javascript_codes', false),
        );
        $this->db->where('id', 1);
        return $this->db->update('general_settings', $data);
    }

    //update recaptcha settings
    public function update_recaptcha_settings()
    {
        $data = array(
            'recaptcha_site_key' => $this->input->post('recaptcha_site_key', true),
            'recaptcha_secret_key' => $this->input->post('recaptcha_secret_key', true),
            'recaptcha_lang' => $this->input->post('recaptcha_lang', true),
        );
        $this->db->where('id', 1);
        return $this->db->update('general_settings', $data);

    }

    //update email settings
    public function update_email_settings()
    {
        $data = array(
            'mail_protocol' => $this->input->post('mail_protocol', true),
            'mail_title' => $this->input->post('mail_title', true),
            'mail_host' => $this->input->post('mail_host', true),
            'mail_port' => $this->input->post('mail_port', true),
            'mail_username' => $this->input->post('mail_username', true),
            'mail_password' => $this->input->post('mail_password', true),
        );

        $this->db->where('id', 1);
        return $this->db->update('general_settings', $data);
    }

    //update email verification
    public function update_email_verification()
    {
        $data = array(
            'email_verification' => $this->input->post('email_verification', true),
        );

        $this->db->where('id', 1);
        return $this->db->update('general_settings', $data);
    }


    //update email settings
    public function update_pagination_settings()
    {
        $data = array(
            'image_gallery_per_page' => $this->input->post('image_gallery_per_page', true),
            'video_gallery_per_page' => $this->input->post('video_gallery_per_page', true),
            );

        $this->db->where('id', 1);
        return $this->db->update('general_settings', $data);
    }

    //update seo tools
    public function update_seo_tools()
    {
        $data_general = array(
            'google_analytics' => $this->input->post('google_analytics', false)
        );
        $this->db->where('id', 1);
        return $this->db->update('general_settings', $data_general);
    }

    //update paypal settings
    public function update_paypal_settings()
    {
        $data = array(
            'paypal_enabled' => $this->input->post('paypal_enabled', true),
            'paypal_mode' => $this->input->post('paypal_mode', true),
            'paypal_client_id' => trim($this->input->post('paypal_client_id', true)),
            'paypal_secret_key' => trim($this->input->post('paypal_secret_key', true))
        );
        $this->db->where('id', 1);
        return $this->db->update('payment_settings', $data);
    }

    //update stripe settings
    public function update_stripe_settings()
    {
        $data = array(
            'stripe_enabled' => $this->input->post('stripe_enabled', true),
            'stripe_publishable_key' => trim($this->input->post('stripe_publishable_key', true)),
            'stripe_secret_key' => trim($this->input->post('stripe_secret_key', true))
        );

        $this->db->where('id', 1);
        return $this->db->update('payment_settings', $data);
    }

    //update paystack settings
    public function update_paystack_settings()
    {
        $data = array(
            'paystack_enabled' => $this->input->post('paystack_enabled', true),
            'paystack_secret_key' => trim($this->input->post('paystack_secret_key', true)),
            'paystack_public_key' => trim($this->input->post('paystack_public_key', true))
        );

        $this->db->where('id', 1);
        return $this->db->update('payment_settings', $data);
    }

    //update razorpay settings
    public function update_razorpay_settings()
    {
        $data = array(
            'razorpay_key_id' => trim($this->input->post('razorpay_key_id', true)),
            'razorpay_key_secret' => trim($this->input->post('razorpay_key_secret', true))
        );

        $this->db->where('id', 1);
        return $this->db->update('general_settings', $data);
    }

    //update pagseguro settings
    public function update_pagseguro_settings()
    {
        $data = array(
            'pagseguro_enabled' => $this->input->post('pagseguro_enabled', true),
            'pagseguro_mode' => $this->input->post('pagseguro_mode', true),
            'pagseguro_email' => trim($this->input->post('pagseguro_email', true)),
            'pagseguro_token' => trim($this->input->post('pagseguro_token', true))
        );

        $this->db->where('id', 1);
        return $this->db->update('payment_settings', $data);
    }

 

    //update visual settings
    public function update_visual_settings()
    {
        $this->load->library('upload');
        $data = array(
        );
        // upload logo
        if ($_FILES['logo']['name'] != '') {
            $path = FCPATH . 'uploads/logo/';
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('logo')) {
                $file_data = $this->upload->data();
                $data["logo"] = $file_data['file_name'];
                $data["logo_email"] = $file_data['file_name'];
            } else {
                return false;
            }
            
        }
        // upload favicon
        if ($_FILES['favicon']['name'] != '') {
            $path = FCPATH . 'uploads/logo/';
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('favicon')) {
                $file_data = $this->upload->data();
                $data["favicon"] = $file_data['file_name'];
            } else {
                return false;
            }
        }
        $this->db->where('id', 1);
        return $this->db->update('general_settings', $data);
    }

    /*
    * UPLoad Section
    *
    */
    //logo image upload
    public function logo_upload($file_name)
    {
        print_r($_FILES);exit;
        $config['upload_path'] = FCPATH . 'uploads/logo/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|svg';
        $config['file_name'] = 'logo_' . uniqid();
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($file_name)) {
            $data = array('upload_data' => $this->upload->data());
            if (isset($data['upload_data']['full_path'])) {
                return 'uploads/logo/' . $data['upload_data']['file_name'];
            }
        }
        return null;
    }

    //favicon image upload
    public function favicon_upload($file_name)
    {
        $config['upload_path'] = FCPATH . 'uploads/logo/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = 'favicon_' . uniqid();
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($file_name)) {
            $data = array('upload_data' => $this->upload->data());
            if (isset($data['upload_data']['full_path'])) {
                return 'uploads/logo/' . $data['upload_data']['file_name'];
            }
        }
        return null;
    }

    

    //update cache system
    public function update_cache_system()
    {
        $data = array(
            'cache_system' => $this->input->post('cache_system', true),
            'refresh_cache_database_changes' => $this->input->post('refresh_cache_database_changes', true),
            'cache_refresh_time' => $this->input->post('cache_refresh_time', true) * 60
        );

        $this->db->where('id', 1);
        return $this->db->update('general_settings', $data);
    }

    //update storage settings
    public function update_storage_settings()
    {
        $data = array(
            'storage' => $this->input->post('storage', true)
        );

        $this->db->where('id', 1);
        return $this->db->update('storage_settings', $data);
    }

    //update system settings
    public function update_system_settings()
    {
        $data = array(
            'physical_products_system' => $this->input->post('physical_products_system', true),
            'digital_products_system' => $this->input->post('digital_products_system', true),
            'marketplace_system' => $this->input->post('marketplace_system', true),
            'classified_ads_system' => $this->input->post('classified_ads_system', true),
            'bidding_system' => $this->input->post('bidding_system', true),
            'multi_vendor_system' => $this->input->post('multi_vendor_system', true),
            'vat_status' => $this->input->post('vat_status', true),
            'commission_rate' => $this->input->post('commission_rate', true),
            'timezone' => trim($this->input->post('timezone', true))
        );

        $this->db->where('id', 1);
        return $this->db->update('general_settings', $data);
    }

  

    //update navigation
    public function update_navigation()
    {
        $data = array(
            'menu_limit' => $this->input->post('menu_limit', true),
            'selected_navigation' => $this->input->post('navigation', true)
        );

        $this->db->where('id', 1);
        return $this->db->update('general_settings', $data);
    }

    //get general settings
    public function get_general_settings()
    {
        $this->db->where('id', 1);
        $query = $this->db->get('general_settings');
        return $query->row();
    }

    //get system settings
    public function get_system_settings()
    {
        $this->db->where('id', 1);
        $query = $this->db->get('general_settings');
        return $query->row();
    }

    //get payment settings
    public function get_payment_settings()
    {
        $this->db->where('id', 1);
        $query = $this->db->get('payment_settings');
        return $query->row();
    }

    //get storage settings
    public function get_storage_settings()
    {
        $this->db->where('id', 1);
        $query = $this->db->get('storage_settings');
        return $query->row();
    }

    //get panel settings
    public function get_panel_settings()
    {
        //return @get_user_session();
    }

    //get index settings
    public function get_index_settings()
    {
        //return @get_current_user_session();
    }

    //get settings
    public function get_settings()
    {
        $this->db->where('id', 1);
        $query = $this->db->get('settings');
        return $query->row();
    }

    //get routes
    public function get_routes()
    {
        $query = $this->db->query("SELECT * FROM routes WHERE id = 1");
        return $query->row();
    }

    //get settings
    public function get_donation_settings($lang_id)
    {
        $this->db->where('lang_id', $lang_id);
        $query = $this->db->get('donation_settings');
        return $query->row();
    }

    public function update_donation_settings()
    {
        $data = array(
            'donation_heading' => $this->input->post('donation_heading', true),
            'donation_description' => $this->input->post('donation_description', true),
            'account_name' => $this->input->post('account_name', true),
            'bank_name' => $this->input->post('bank_name', true),
            'account_no' => $this->input->post('account_no', true),
            'ifsc_code' => $this->input->post('ifsc_code', true),
            'branch_address' => $this->input->post('branch_address', true),
        );
        $oldImg = $this->input->post('oldIng', true);
        if ($_FILES['donation_image']['name'] != '') {
            $path = FCPATH . 'uploads/misc/';
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('donation_image')) {
                $file_data = $this->upload->data();
                $data["donation_image"] = $file_data['file_name'];
            } else {
                return false;
            }
        }
        if(!empty($oldIng)){
            delete_file_from_server('uploads/misc/'.$oldIng);
        }

        $lang_id = $this->input->post('lang_id', true);
        $this->db->where('lang_id', $lang_id);
        return $this->db->update('donation_settings', $data);
    }

    /*
    *-------------------------------------------------------------------------------------------------
    * FONT SETTINGS
    *-------------------------------------------------------------------------------------------------
    */

    //get selected fonts
    public function get_selected_fonts()
    {
        $sql = "SELECT * FROM fonts WHERE id = ?";
        $query = $this->db->query($sql, array(clean_number($this->settings->site_font)));
        return $query->row();
    }

    //get fonts
    public function get_fonts()
    {
        $query = $this->db->query("SELECT * FROM fonts ORDER BY font_name");
        return $query->result();
    }

    //get font
    public function get_font($id)
    {
        $sql = "SELECT * FROM fonts WHERE id =  ?";
        $query = $this->db->query($sql, array(clean_number($id)));
        return $query->row();
    }

    //add font
    public function add_font()
    {
        $data = array(
            'font_name' => $this->input->post('font_name', true),
            'font_url' => $this->input->post('font_url', false),
            'font_family' => $this->input->post('font_family', true),
            'is_default' => 0
        );
        return $this->db->insert('fonts', $data);
    }

    //set site font
    public function set_site_font()
    {
        $lang_id = $this->input->post('lang_id', true);
        $data = array(
            'site_font' => $this->input->post('site_font', true)
        );
        $this->db->where('lang_id', clean_number($lang_id));
        return $this->db->update('settings', $data);
    }

    //update font
    public function update_font($id)
    {
        $data = array(
            'font_name' => $this->input->post('font_name', true),
            'font_url' => $this->input->post('font_url', false),
            'font_family' => $this->input->post('font_family', true)
        );
        $this->db->where('id', clean_number($id));
        return $this->db->update('fonts', $data);
    }

    //delete font
    public function delete_font($id)
    {
        $font = $this->get_font($id);
        if (!empty($font)) {
            $this->db->where('id', $font->id);
            return $this->db->delete('fonts');
        }
        return false;
    }

    //update seo settings
    public function update_seo_settings()
    {
        $general = array(
            'google_analytics' => $this->input->post('google_analytics', false),
        );

        $this->db->where('id', 1);
        return $this->db->update('general_settings', $general);
    }

    /*
    *
    *get engage with us
    */
    //get settings
    public function get_engage_settings($lang_id)
    {
        $this->db->where('lang_id', $lang_id);
        $query = $this->db->get('engage_with_us');
        return $query->row();
    }

    public function update_engage()
    {
        $data = array(
            'heading' => $this->input->post('heading', true),
            'content' => $this->input->post('content', true),
            'meta_keywords' => $this->input->post('meta_keywords', true),
            'meta_description' => $this->input->post('meta_description', true),
        );
        $lang_id = $this->input->post('lang_id', true);
        $this->db->where('lang_id', $lang_id);
        return $this->db->update('engage_with_us', $data);
    }

    /*
    *-------------------------------------------------------------------------------------------------
    * JOIN US SETTINGS
    *-------------------------------------------------------------------------------------------------
    */
    public function get_organisation_member_settings($lang_id)
    {
        $this->db->where('lang_id', $lang_id);
        $query = $this->db->get('organisation_member_settings');
        return $query->row();
    }

    public function update_organisation_member_settings()
    {
        $data = array(
            'heading' => $this->input->post('heading', true),
            'content' => $this->input->post('content', true),
            'meta_keywords' => $this->input->post('meta_keywords', true),
            'meta_description' => $this->input->post('meta_description', true),
        );
        $lang_id = $this->input->post('lang_id', true);
        $this->db->where('lang_id', $lang_id);
        return $this->db->update('organisation_member_settings', $data);
    }
    public function get_volunteer_member_settings($lang_id)
    {
        $this->db->where('lang_id', $lang_id);
        $query = $this->db->get('volunteer_member_settings');
        return $query->row();
    }

    public function update_volunteer_member_settings()
    {
        $data = array(
            'heading' => $this->input->post('heading', true),
            'content' => $this->input->post('content', true),
            'meta_keywords' => $this->input->post('meta_keywords', true),
            'meta_description' => $this->input->post('meta_description', true),
        );
        $lang_id = $this->input->post('lang_id', true);
        $this->db->where('lang_id', $lang_id);
        return $this->db->update('volunteer_member_settings', $data);
    }
  
    

  

  
}
