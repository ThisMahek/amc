<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Core_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //general settings
        $this->general_settings = $this->settings_model->get_general_settings();
        //check auth
        
        $this->auth_check = auth_check();
        if ($this->auth_check) {
            $this->auth_user = user();
        }
        //settings
        $this->settings = $this->settings_model->get_settings();
        //application name
        $this->app_name = $this->general_settings->application_name;
        $this->courses = $this->course_model->get_all_courses();
        $this->footer_pages = $this->page_model->get_footer_pages();
        $this->header_pages = $this->page_model->get_top_menu_pages();
        $this->courses = $this->course_model->get_all_courses();
       //update last seen time
        $this->authication_model->update_last_seen();
        $this->image_gallery_per_page = $this->general_settings->image_gallery_per_page;
        $this->video_gallery_per_page = $this->general_settings->video_gallery_per_page;
    }
   
}

class Home_Core_Controller extends Core_Controller
{
    public function __construct()
    {
        parent::__construct();

       
       
       // $this->menu_links = $this->page_model->get_menu_links($this->selected_lang->id);

        //$this->categories = $this->category_model->get_categories();
        //$this->parent_categories = get_parent_categories($this->categories);

        //recaptcha status
        $global_data['recaptcha_status'] = true;
        if (empty($this->general_settings->recaptcha_site_key) || empty($this->general_settings->recaptcha_secret_key)) {
            $global_data['recaptcha_status'] = false;
        }
        $this->recaptcha_status = $global_data['recaptcha_status'];
        $this->load->vars($global_data);
        //$this->bannerData = $this->slider_model->get_banner_item_row();
    }

  

    //verify recaptcha
    public function recaptcha_verify_request()
    {
        if (!$this->recaptcha_status) {
            return true;
        }

        $this->load->library('recaptcha');
        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) && $response['success'] === true) {
                return true;
            }
        }
        return false;
    }

    public function paginate($url, $total_rows, $per_page)
    {
        //initialize pagination
        $page = $this->security->xss_clean($this->input->get('page'));
        $page = clean_number($page);
        if (empty($page) || $page <= 0) {
            $page = 0;
        }

        if ($page != 0) {
            $page = $page - 1;
        }

        $config['num_links'] = 4;
        $config['base_url'] = $url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['reuse_query_string'] = true;
        $this->pagination->initialize($config);

        $per_page = clean_number($per_page);

        return array('per_page' => $per_page, 'offset' => $page * $per_page, 'current_page' => $page + 1);
    }
}

class Admin_Core_Controller extends Core_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function paginate($url, $total_rows)
    {
        //initialize pagination
        $page = $this->security->xss_clean($this->input->get('page'));
        $per_page = $this->input->get('show', true);
        $page = clean_number($page);
        if (empty($page) || $page <= 0) {
            $page = 0;
        }

        if ($page != 0) {
            $page = $page - 1;
        }

        if (empty($per_page)) {
            $per_page = 15;
        }
        $config['num_links'] = 4;
        $config['base_url'] = $url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['reuse_query_string'] = true;
        $this->pagination->initialize($config);

        return array('per_page' => $per_page, 'offset' => $page * $per_page);
    }
}
