<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home_core_Controller extends CI_Controller
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

