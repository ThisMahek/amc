<?php
/*
 * Custom Helpers
 *
 */
if (strpos($_SERVER['REQUEST_URI'], '/index.php') !== false) {
    $ci = &get_instance();
    $ci->load->helper('url');
    redirect(current_url());
    exit();
}
//check auth
if (!function_exists('auth_check')) {
    function auth_check()
    {
        // Get a reference to the controller object
        $ci = &get_instance();
        return $ci->authication_model->is_logged_in();
    }
}

if (!function_exists('is_approved')) {
    function is_approved()
    {
        // Get a reference to the controller object
        $ci = &get_instance();
        return $ci->authication_model->is_approved();
           
    }
}

//generate token
if (!function_exists('generate_token')) {
    function generate_token()
    {
        $token = uniqid("", TRUE);
        $token = str_replace(".", "-", $token);
        return $token . "-" . rand(10000000, 99999999);
    }
}

//remove special characters
if (!function_exists('remove_special_characters')) {
    function remove_special_characters($str)
    {
        $ci = &get_instance();
        $str = str_replace('#', '', $str);
        $str = str_replace(';', '', $str);
        $str = str_replace('!', '', $str);
        $str = str_replace('"', '', $str);
        $str = str_replace('$', '', $str);
        $str = str_replace('%', '', $str);
        $str = str_replace("'", '', $str);
        $str = str_replace('(', '', $str);
        $str = str_replace(')', '', $str);
        $str = str_replace('*', '', $str);
        $str = str_replace('+', '', $str);
        $str = str_replace('/', '', $str);
        $str = str_replace('\'', '', $str);
        $str = str_replace('<', '', $str);
        $str = str_replace('>', '', $str);
        $str = str_replace('=', '', $str);
        $str = str_replace('?', '', $str);
        $str = str_replace('[', '', $str);
        $str = str_replace(']', '', $str);
        $str = str_replace('\\', '', $str);
        $str = str_replace('^', '', $str);
        $str = str_replace('`', '', $str);
        $str = str_replace('{', '', $str);
        $str = str_replace('}', '', $str);
        $str = str_replace('|', '', $str);
        $str = str_replace('~', '', $str);
        $str = mysqli_real_escape_string($ci->db->conn_id, $str);
        return $str;
    }
}
//remove forbidden characters
if (!function_exists('remove_forbidden_characters')) {
    function remove_forbidden_characters($str)
    {
        $str = str_replace(';', '', $str);
        $str = str_replace('"', '', $str);
        $str = str_replace('$', '', $str);
        $str = str_replace('%', '', $str);
        $str = str_replace('*', '', $str);
        $str = str_replace('/', '', $str);
        $str = str_replace('\'', '', $str);
        $str = str_replace('<', '', $str);
        $str = str_replace('>', '', $str);
        $str = str_replace('=', '', $str);
        $str = str_replace('?', '', $str);
        $str = str_replace('[', '', $str);
        $str = str_replace(']', '', $str);
        $str = str_replace('\\', '', $str);
        $str = str_replace('^', '', $str);
        $str = str_replace('`', '', $str);
        $str = str_replace('{', '', $str);
        $str = str_replace('}', '', $str);
        $str = str_replace('|', '', $str);
        $str = str_replace('~', '', $str);
        return $str;
    }
}


//generate slug
if (!function_exists('str_slug')) {
    function str_slug($str)
    {
        $str = trim($str);
        return url_title(convert_accented_characters($str), "-", true);
    }
}

//clean slug
if (!function_exists('clean_slug')) {
    function clean_slug($slug)
    {
        $ci = &get_instance();
        $slug = urldecode($slug);
        $slug = $ci->security->xss_clean($slug);
        $slug = remove_special_characters($slug, true);
        return $slug;
    }
}

//clean number
if (!function_exists('clean_number')) {
    function clean_number($num)
    {
        $ci = &get_instance();
        $num = trim($num);
        $num = $ci->security->xss_clean($num);
        $num = intval($num);
        return $num;
    }
}

//clean string
if (!function_exists('clean_str')) {
    function clean_str($str)
    {
        $ci = &get_instance();
        $str = $ci->security->xss_clean($str);
        $str = remove_special_characters($str, false);
        return $str;
    }
}
//is admin
if (!function_exists('is_admin')) {
    function is_admin()
    {
        // Get a reference to the controller object
        $ci = &get_instance();
        return $ci->authication_model->is_admin();
    }
}
if (!function_exists('is_franchise')) {
    function is_franchise()
    {
        // Get a reference to the controller object
        $ci = &get_instance();
        return $ci->authication_model->is_franchise();
    }
}
if (!function_exists('debug')) 
{
    function debug($data)
    {
      echo "<pre>";
      print_r($data);
      echo "</pre>";
    }
}


//////////////////////////
//post method
if (!function_exists('post_method')) {
    function post_method()
    {
        $ci = &get_instance();
        if ($ci->input->method(FALSE) != 'post') {
            exit();
        }
    }
}

//get logged user
if (!function_exists('user')) {
    function user()
    {
        // Get a reference to the controller object
        $ci = &get_instance();
        $user = $ci->authication_model->get_logged_user();
        if (empty($user)) {
            $ci->auth_model->logout();
        } else {
            return $user;
        }
    }
}

//get ci core constructor
// if (!function_exists('get_ci_core_construct')) {
// 	function get_ci_core_construct()
// 	{
// 		return @ci_core_construct();
// 	}
// }
if (!function_exists('time_ago')) {
    function time_ago($timestamp)
    {
        $time_ago = strtotime($timestamp);
        $current_time = time();
        $time_difference = $current_time - $time_ago;
        $seconds = $time_difference;
        $minutes = round($seconds / 60);           // value 60 is seconds
        $hours = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec
        $days = round($seconds / 86400);          //86400 = 24 * 60 * 60;
        $weeks = round($seconds / 604800);          // 7*24*60*60;
        $months = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60
        $years = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60
        if ($seconds <= 60) {
            return "Just now";
        } else if ($minutes <= 60) {
            if ($minutes == 1) {
                return "1 " . "Minute ago";
            } else {
                return "$minutes " . "Minutes ago";
            }
        } else if ($hours <= 24) {
            if ($hours == 1) {
                return "1 " . "hour ago";
            } else {
                return "$hours " . "Hours ago";
            }
        } else if ($days <= 30) {
            if ($days == 1) {
                return "1 " . "day ago";
            } else {
                return "$days " . "Days ago";
            }
        } else if ($months <= 12) {
            if ($months == 1) {
                return "1 " . "month ago";
            } else {
                return "$months " . "Months ago";
            }
        } else {
            if ($years == 1) {
                return "1 " . "year ago";
            } else {
                return "$years " . "Years ago";
            }
        }
    }
}
//get user by id
if (!function_exists('get_user')) {
    function get_user($user_id)
    {
        // Get a reference to the controller object
        $ci = &get_instance();
        return $ci->auth_model->get_user($user_id);
    }
}

//admin url
if (!function_exists('admin_url')) {
    function admin_url()
    {
        $ci = &get_instance();
        return base_url() . 'admin/';
    }
}

//admin url
if (!function_exists('student_url')) {
    function student_url()
    {
        $ci = &get_instance();
        return base_url() . 'student-portal/';
    }
}
if (!function_exists('franchise_url')) {
    function franchise_url()
    {
        $ci = &get_instance();
        return base_url() . 'franchise-portal/';
    }
}

//generate unique id
if (!function_exists('generate_unique_id')) {
    function generate_unique_id()
    {
        $id = uniqid("", TRUE);
        $id = str_replace(".", "-", $id);
        return $id . "-" . rand(10000000, 99999999);
    }
}

//get settings
if (!function_exists('get_settings')) {
    function get_settings()
    {
        $ci = &get_instance();
        $ci->load->model('settings_model');
        return $ci->settings_model->get_settings();
    }
}

//get general settings
if (!function_exists('get_general_settings')) {
    function get_general_settings()
    {
        $ci = &get_instance();
        $ci->load->model('settings_model');
        return $ci->settings_model->get_general_settings();
    }
}
//generate static url
if (!function_exists('generate_url')) {
    function generate_url($route_1, $route_2 = null)
    {
        if (!empty($route_2)) {
            return base_url() . $route_1 . $route_2;
        } else {
            return base_url() . $route_1;
        }
    }
}
if (!function_exists('formatted_date')) {
    function formatted_date($timestamp)
    {
        return date("d-m-Y / H:i", strtotime($timestamp));
    }
}

if (!function_exists('formatted_date_only')) {
    function formatted_date_only($timestamp)
    {
        return date("d-m-Y", strtotime($timestamp));
    }
}
//get method
if (!function_exists('get_method')) {
    function get_method()
    {
        $ci = &get_instance();
        if ($ci->input->method(FALSE) != 'get') {
            exit();
        }
    }
}
if (!function_exists('getFormatedDate')) {
    function getFormatedDate($date)
    {
        $ret = date('M d, Y', strtotime($date));
        return $ret;
    }
}
//get recaptcha
if (!function_exists('generate_recaptcha')) {
    function generate_recaptcha()
    {
        $ci = &get_instance();
        if ($ci->recaptcha_status) {
            $ci->load->library('recaptcha');
            echo '<div class="form-group">';
            echo $ci->recaptcha->getWidget();
            echo $ci->recaptcha->getScriptTag();
            echo ' </div>';
        }
    }
}
//set cookie
if (!function_exists('helper_setcookie')) {
    function helper_setcookie($name, $value)
    {
        setcookie($name, $value, time() + (86400 * 30), "/"); //30 days
    }
}
//date difference in hours
function date_difference_in_hours($date1, $date2)
{
    $datetime_1 = date_create($date1);
    $datetime_2 = date_create($date2);
    $diff = date_diff($datetime_1, $datetime_2);
    $days = $diff->format('%a');
    $hours = $diff->format('%h');
    return $hours + ($days * 24);
}
//delete file from server
if (!function_exists('delete_file_from_server')) {
    function delete_file_from_server($path)
    {
        $full_path = FCPATH . $path;
        if (strlen($path) > 15 && file_exists($full_path)) {
            @unlink($full_path);
        }
    }
}

//delete file from server
if (!function_exists('getClassNameByID')) {
    function getClassNameByID($id)
    {
        if ($id != 0) {
            $ci = &get_instance();
            $res =  $ci->course_model->get_course_by_id($id);
            return $res->title;
        } else {
            return "NA";
        }
    }
}
if (!function_exists('genarateStudentID')) {
    function genarateStudentID($courseName)
    {
        $ci = &get_instance();
        $resp = $ci->db->query('SELECT id FROM `student_approval` ORDER BY `id` DESC LIMIT 1')->row();
        if (!empty($resp)) {
            $lastID = $resp->id + 1;
        } else {
            $lastID = 1;
        }
        $centerID = '';
        $prefix = $courseName.date('y');
        if ($lastID == 1) {
            $id = '01';
        } elseif ($lastID == 2) {
            $id = '02';
        } elseif ($lastID == 2) {
            $id = '02';
        } elseif ($lastID == 3) {
            $id = '03';
        } elseif ($lastID == 4) {
            $id = '04';
        } elseif ($lastID == 5) {
            $id = '05';
        } elseif ($lastID == 6) {
            $id = '06';
        } elseif ($lastID == 7) {
            $id = '07';
        } elseif ($lastID == 8) {
            $id = '08';
        } elseif ($lastID == 9) {
            $id = '09';
        } else {
            $id = $lastID;
        }
        $centerID = $prefix . $id;
        return $centerID;
    }
}

if (!function_exists('genarateTempStudentID')) {
    function genarateTempStudentID($courseName,$lastID)
    {
        $centerID = '';
        $prefix =$courseName ."T". date('y');
        if ($lastID == 1) {
            $id = '01';
        } elseif ($lastID == 2) {
            $id = '02';
        } elseif ($lastID == 2) {
            $id = '02';
        } elseif ($lastID == 3) {
            $id = '03';
        } elseif ($lastID == 4) {
            $id = '04';
        } elseif ($lastID == 5) {
            $id = '05';
        } elseif ($lastID == 6) {
            $id = '06';
        } elseif ($lastID == 7) {
            $id = '07';
        } elseif ($lastID == 8) {
            $id = '08';
        } elseif ($lastID == 9) {
            $id = '09';
        } else {
            $id = $lastID;
        }
        $centerID = $prefix . $id;
        return $centerID;
    }
}

if (!function_exists('genarateMarksheetSlNo')) {
    function genarateMarksheetSlNo()
    {
    $ci = &get_instance();
    $resp = $ci->db->query('SELECT id FROM `marksheet` ORDER BY `id` DESC LIMIT 1')->row();
    if (!empty($resp)) {
        $lastID = $resp->id + 1;
    } else {
        $lastID = 1;
    }
        if ($lastID == 1) {
            $id = '01';
        } elseif ($lastID == 2) {
            $id = '02';
        } elseif ($lastID == 2) {
            $id = '02';
        } elseif ($lastID == 3) {
            $id = '03';
        } elseif ($lastID == 4) {
            $id = '04';
        } elseif ($lastID == 5) {
            $id = '05';
        } elseif ($lastID == 6) {
            $id = '06';
        } elseif ($lastID == 7) {
            $id = '07';
        } elseif ($lastID == 8) {
            $id = '08';
        } elseif ($lastID == 9) {
            $id = '09';
        } else {
            $id = $lastID;
        }
    $centerID = '';
    $prefix = date('Y');
    $centerID = $prefix . $id;
    return $centerID;
    }
}

if (!function_exists('genarateCertificteSlNo')) {
    function genarateCertificteSlNo()
    {
        $ci = &get_instance();
        $resp = $ci->db->query('SELECT id FROM `certificates` ORDER BY `id` DESC LIMIT 1')->row();
        if (!empty($resp)) {
            $lastID = $resp->id + 1;
        } else {
            $lastID = 1;
        }
        if ($lastID == 1) {
            $id = '01';
        } elseif ($lastID == 2) {
            $id = '02';
        } elseif ($lastID == 2) {
            $id = '02';
        } elseif ($lastID == 3) {
            $id = '03';
        } elseif ($lastID == 4) {
            $id = '04';
        } elseif ($lastID == 5) {
            $id = '05';
        } elseif ($lastID == 6) {
            $id = '06';
        } elseif ($lastID == 7) {
            $id = '07';
        } elseif ($lastID == 8) {
            $id = '08';
        } elseif ($lastID == 9) {
            $id = '09';
        } else {
            $id = $lastID;
        }
        $centerID = '';
        $prefix = date('Y');
        $centerID = $prefix . $id;
        return $centerID;
    }
}

if (!function_exists('genarateRollNo')) {
    function genarateRollNo($lastID)
    {
        $centerID = '';
        $prefix = date('Y');
        if(strlen($lastID)<=6){
            $nlastID = str_pad($lastID, 6, "0", STR_PAD_LEFT);
        }else {
            $nlastID= $lastID;
        }
        $centerID = $prefix . $nlastID;
        return $centerID;
    }
}

if (!function_exists('genarateFranchiseEnrollmentNo')) {
    function genarateFranchiseEnrollmentNo($lastID)
    {
        $centerID = '';
        $prefix = 'SSGIPS-'.date('Y');
        if (strlen($lastID) <= 6) {
            $nlastID = str_pad($lastID, 6, "0", STR_PAD_LEFT);
        } else {
            $nlastID = $lastID;
        }
        $centerID = $prefix . $nlastID;
        return $centerID;
    }
}

if (!function_exists('genarateFranchiseRegistrationNo')) {
    function genarateFranchiseRegistrationNo($lastID)
    {
        $centerID = '';
        $prefix = "SSGIPS".date('Y');
        if ($lastID == 1) {
            $id = '01';
        } elseif ($lastID == 2) {
            $id = '02';
        } elseif ($lastID == 2) {
            $id = '02';
        } elseif ($lastID == 3) {
            $id = '03';
        } elseif ($lastID == 4) {
            $id = '04';
        } elseif ($lastID == 5) {
            $id = '05';
        } elseif ($lastID == 6) {
            $id = '06';
        } elseif ($lastID == 7) {
            $id = '07';
        } elseif ($lastID == 8) {
            $id = '08';
        } elseif ($lastID == 9) {
            $id = '09';
        } else {
            $id = $lastID;
        }
        $centerID = $prefix . $id;
        return $centerID;
    }
}

if (!function_exists('genarateEnrollmentNo')) {
    function genarateEnrollmentNo($course_name,$lastID)
    {
        $centerID = '';
        $prefix = $course_name.date('Y');
        if (strlen($lastID) <= 6) {
            $nlastID = str_pad($lastID, 6, "0", STR_PAD_LEFT);
        } else {
            $nlastID = $lastID;
        }
        $centerID = $prefix . $nlastID;
        return $centerID;
    }
}

if (!function_exists('genarateRegistrationNo')) {
    function genarateRegistrationNo($course_name,$lastID)
    {
        $centerID = '';
        $prefix = $course_name.date('Y');
        if ($lastID == 1) {
            $id = '01';
        } elseif ($lastID == 2) {
            $id = '02';
        } elseif ($lastID == 2) {
            $id = '02';
        } elseif ($lastID == 3) {
            $id = '03';
        } elseif ($lastID == 4) {
            $id = '04';
        } elseif ($lastID == 5) {
            $id = '05';
        } elseif ($lastID == 6) {
            $id = '06';
        } elseif ($lastID == 7) {
            $id = '07';
        } elseif ($lastID == 8) {
            $id = '08';
        } elseif ($lastID == 9) {
            $id = '09';
        } else {
            $id = $lastID;
        }
        $centerID = $prefix . $id;
        return $centerID;
    }
}




if (!function_exists('genarateRegistrationNo')) {
    function genarateRegistrationNo($courseName, $lastID)
    {
        $centerID = '';
        $prefix = $courseName . date('y');
        if (strlen($lastID) <= 6) {
            $nlastID = str_pad($lastID, 6, "0", STR_PAD_LEFT);
        } else {
            $nlastID = $lastID;
        }
        $centerID = $prefix . $lastID;
        return $centerID;
    }
}

if (!function_exists('getCourseNameByID')) {
    function getCourseNameByID($id)
    {
        $ci = &get_instance();
        $resp = $ci->course_model->get_course_by_id($id);
        if(!empty($resp)){
            return $resp->title;
        }else{
            return false;
        }
    }
}

if (!function_exists('getSessionByID')) {
    function getSessionByID($id)
    {
        $ci = &get_instance();
        $resp = $ci->academicsession_model->get_academicsession_by_id($id);
        if (!empty($resp)) {
            return $resp->session_name;
        } else {
            return false;
        }
    }
}

if (!function_exists('get_academic_session_by_id')) {
    function get_academic_session_by_id($id)
    {
        $ci = &get_instance();
        return $ci->academicsession_model->get_academicsession_by_id($id);
        
    }
}

if (!function_exists('getSubjectDataById')) {
    function getSubjectDataById($id)
    {
        $ci = &get_instance();
        return $ci->subject_model->get_post($id);
        
    }
}

if (!function_exists('getCoursedataByID')) {
    function getCoursedataByID($id)
    {
        $ci = &get_instance();
        $resp = $ci->course_model->get_course_by_id($id);
        if (!empty($resp)) {
            return $resp;
        } else {
            return false;
        }
    }
}

if (!function_exists('getCourseYearNo')) {
    function getCourseYearNo($id)
    {
        $ci = &get_instance();
        $resp = $ci->course_model->get_course_by_id($id);
        if (!empty($resp)) {
            return $resp->duration_year;
        } else {
            return false;
        }
    }
}

if (!function_exists('getStudentNameById')) {
    function getStudentNameById($id)
    {
        $ci = &get_instance();
        $resp = $ci->student_model->get_student_by_id($id);
        if (!empty($resp)) {
            return $resp->stu_name;
        } else {
            return false;
        }
    }
}

if (!function_exists('getPercentage')) {
    function getPercentage($marks,$full_marks)
    {
        return ceil(($marks/$full_marks)*100);
    }
}
function applicationFormDetails($franchise,$trans = [])
{
    $CI =& get_instance();
    $pay_status = '';
    if ($franchise->pay_status == "0") 
    {
      $pay_status = "<strong class='text-info'>Pending</strong>";
    } 
    else  if ($franchise->pay_status == "1") 
    {
      $pay_status = "<strong class='text-success'>Paid</strong>";
    } 
    else  if ($franchise->pay_status == "2") 
    {
       $pay_status = "<strong class='text-danger'>Canceled</strong>";
    }
    
    $rejected_cause = '';
    if ($franchise->status == "2") 
    {
       $rejected_cause = '<tr>
                            <td>Rejection Cause</td>
                            <td colspan="3">'. $franchise->rejection_cause .'</td>
                        </tr>';
    }
    $status = '';  
    if ($franchise->pay_status == "1")
    {
      $status = '<tr>
                <td>Fee paid On</td>
                <td>
                    '. ((!empty($trans->trn_date))?date('d-M-Y H:i:s', strtotime($trans->trn_date)):'') .' via
                    '. (!empty($trans->mode)?$trans->mode:'') .'
                </td>
                <td>Transaction ID</td>
                <td>'. ((!empty($trans->transaction_id))?$trans->transaction_id:'').'</td>
            </tr>';    
    }              
    elseif ($franchise->status == "2")
    {
        $status = '<!-- <tr>
                <td>Reject On</td>
                <td>
                    '. date('d-M-Y', strtotime($franchise->rejected_on)) .'
                </td>
                <td></td>
                <td></td>
            </tr> -->'; 
    }    
    elseif ($franchise->status == "3")
    {
        $status ='<!-- <tr>
                    <td>Dispute On</td>
                    <td>
                        '. date('d-M-Y', strtotime($franchise->dispute_on)) .'
                    </td>
                    <td></td>
                    <td></td>
                </tr> -->';
    }
    $html = '<tr>
                    <td>Proposed Center Name </td>
                    <td><strong class="text-primary">'.$franchise->franchise_name.'</strong></td>
                    <td>CENTER  CODE</td>
                    <td><strong class="text-primary">'. $franchise->enroll_no .'</strong></td>
             <tr>     
             <tr>
                    <td>Application Status</td>
                    <td><strong class="text-info">'.$CI->config->item('franchise_status')[$franchise->status].'</strong>
                    </td>
                    <td>Payment Status</td>
                    <td>'.$pay_status.'
                    </td>
            </tr>    
            '.$rejected_cause.'
            <tr>
                <td>Franchise Name</td>
                <td>'. $franchise->franchise_name .'</td>
                <td>Franchise Address</td>
                <td>
                    Address Line 1 :'. ($franchise->franchise_address_1) .' <br>
                    Address Line 2: '. ($franchise->franchise_address_2) .'<br>
                    District : '. ($franchise->franchise_district) .'<br>
                    State : '. ($franchise->franchise_state) .'<br>
                    Pin : '. ($franchise->franchise_pin) .'
                </td>    
            </tr>
            <tr>
                <td>President/Manager Name </td>
                <td>'. $franchise->president_name  .'</td>
                <td>President Aadhar No.</td>
                <td>'. $franchise->president_aadhar_number .'</td>
            </tr>
            <tr>
                <td>Pan Number</td>
                <td>'. $franchise->franchise_pan_number  .'</td>
                <td>President DOB</td>
                <td>'. (!empty($franchise->president_dob)?date('d, M Y',strtotime($franchise->president_dob)):'')  .'</td>
            </tr>
            <tr>
                <td>Franchise Email</td>
                <td>'. $franchise->franchise_email  .'</td>
                <td>Franchise Mobile</td>
                <td>'. $franchise->franchise_contact  .'</td>
            </tr>'.$status;
            return $html;
}