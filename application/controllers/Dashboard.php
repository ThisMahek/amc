<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Home_Core_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!auth_check()) {
            redirect('login');
        }
    }

    public function index()
    {
        $userRole = $this->session->userdata('bp_sess_usertype');
        switch ($userRole) {
            case 'admin':
                redirect('admin');
                break;
            case 'student':
                redirect('student-portal');
                break;
            case 'franchise':
            {
                redirect('franchise-portal');
            }
            break;    
            /*case 'staff':
                redirect('staff-portal');
                break; */
            default:
                redirect('login');
                break;
        }
    }
}
