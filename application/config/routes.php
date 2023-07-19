<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home_controller';
$route['404_override'] = 'home_controller/error_404';
$route['error-404'] = 'home_controller/error_404';
$route['translate_uri_dashes'] = FALSE;
//common route
$route['login']             = 'auth_controller/index';
$route['login-check']       = 'auth_controller/login_post';
$route['logout']            = 'auth_controller/logout';
$route['change-password']   = 'auth_controller/change_password';
$route['update-password']   = 'auth_controller/change_password_post';
$route['reset-password']    = 'auth_controller/reset_password';
$route['dashboard']    = 'dashboard/index';
$route['contact-us'] = 'home_controller/contact';
$route['placements'] = 'home_controller/placements';
$route['contact-post']['POST'] = 'home_controller/contact_post';
$route['joinus-save'] = 'home_controller/engage_post';
$route['save-volunteer'] = 'home_controller/save_volunteer';
$route['download-file'] = 'home_controller/download_post_file';
$route['clean-disk-space'] = 'cron_controller/clean_temp_file';
$route['update-sitemap'] = 'cron_controller/update_sitemap';
$route['image-gallery']['GET'] = 'home_controller/image_gallery';
$route['video-gallery']['GET'] = 'home_controller/video_gallery';
$route['ck-file-upload']   = 'ajax_controller/ckFileUpload';
$route['student-registration'] = 'home_controller/register';
$route['franchise-registration/(:any)'] = 'home_controller/franchises_register';
$route['franchise_registration_save'] = 'home_controller/franchises_register_post';
$route['franchise_update_save'] = 'home_controller/edit_application_post';
$route['save-application']= 'home_controller/register_post';
$route['professors'] = 'home_controller/all_professor';
$route['professor' . '/(:any)']['GET'] = 'home_controller/professor_details/$1';
$route['notice' . '/(:any)']['GET'] = 'home_controller/notice_details/$1';
$route['job'. '/(:any)/(:any)']['GET'] = 'home_controller/job_post/$1/$2';
$route['course' . '/(:any)']['GET'] = 'home_controller/single_course/$1';
$route['result']['GET'] = 'home_controller/result';
$route['search-result']['POST'] = 'home_controller/result_search';

$route['search-franchise']['GET'] = 'home_controller/search_franchise';
$route['search-franchise-result']['POST'] = 'home_controller/result_search_result';
//payment
$route['admission-payment' . '/(:any)']['GET'] = 'payment_controller/index/$1';
$route['cancel_payment' . '/(:any)']['GET'] = 'payment_controller/cancel_payment/$1';
$route['admission-compleated' . '/(:any)']['GET'] = 'home_controller/registration_compleated/$1';
$route['admission-payment']['POST'] = 'payment_controller/razorpay_payment_post';
//email send 
$route['auto-send-email-post']['POST'] = 'ajax_controller/send_email';

//cronjob
$route['cron/send-newsletter-email']    = 'cron_crontroller/sendNewsletterEmails';
$route['cron/genarate-tution-fees']    = 'cron_crontroller/genarateMothlyFees';



/*
 *
 * STUDENT PORTAL
 *
 */
$route['student-portal']= 'student_controller/index';
$route['student-portal/reupload-documents']= 'student_controller/reupload_docs';
$route['student-portal/save-upload']= 'student_controller/reupload_docs_post';
$route['student-portal/notice-board']= 'student_controller/get_all_notice';
$route['student-portal/exam-notice']= 'student_controller/get_all_exam_notice';
$route['student-portal/exam-notice' . '/(:any)']['GET'] = 'student_controller/exam_notice_details/$1';
$route['student-portal/monthly-tution-fees']= "student_controller/monthly_tution_fees";
$route['student-portal/monthly-tution-fee-payment' . '/(:any)']['GET'] = 'student_controller/monthly_tution_fees_payment/$1';
$route['student-portal/marksheet']= 'student_controller/marksheet';
$route['student-portal/certificate']= 'student_controller/certificate';


/*
 *
 * FRANCHISE PORTAL
 *
 */
$route['franchise-portal'] = 'Franchise_controller/index';
$route['update-franchise']    = 'Franchise_controller/update_franchise_post';
$route['franchise-portal/reupload-documents'] = 'Franchise_controller/reupload_docs';
$route['franchise-portal/save-upload'] = 'Franchise_controller/reupload_docs_post';
$route['franchise-portal/add-student']    = 'Franchisestudent_controller/add_student';
$route['franchise-portal/save-student']    = 'Franchisestudent_controller/add_student_post';
$route['franchise-portal/students']    = 'Franchisestudent_controller/students';
$route['franchise-portal/pending-student']    = 'Franchisestudent_controller/pending_students';
$route['franchise-portal/approved-student']    = 'Franchisestudent_controller/approve_student_list';
$route['franchise-portal/rejected-student']    = 'Franchisestudent_controller/reject_student_list';
$route['franchise-portal/dispute-student']    = 'Franchisestudent_controller/dispute_student_list';
$route['franchise-portal/view-application/(:num)']    = 'Franchisestudent_controller/view_application/$1';
$route['franchise-portal/reject-application/(:num)']    = 'Franchisestudent_controller/reject_student_app/$1';
$route['franchise-portal/edit-student-application/(:num)']    = 'Franchisestudent_controller/edit_application/$1';
$route['franchise-portal/update-student-application']    = 'Franchisestudent_controller/edit_application_post';
$route['franchise-portal/approve-application/(:num)']    = 'Franchisestudent_controller/approve_application/$1';
$route['franchise-portal/view_profile']    = 'Franchise_controller/view_profile';
$route['franchise-portal/update_view']    = 'Franchise_controller/update_view';
$route['franchise-portal/update-franchise-application']    = 'Franchise_controller/edit_application_post';
/*
 *
 * ADMIN ROUTES
 *
 */
//settings
$route['admin']         = 'admin_controller/index';
$route['admin/email-settings']    = 'admin_controller/emailSettings';
$route['admin/pagination-settings']    = 'admin_controller/paginationSettings';
$route['admin/settings']    = 'admin_controller/settings';
$route['admin/visual-settings'] = 'admin_controller/visual_settings';
$route['admin/payment-settings'] = 'admin_controller/payment_settings';
$route['admin/pagination-settings']    = 'admin_controller/paginationSettings';
#slider
$route['admin/sliders']    = 'admin_controller/sliders';
$route['admin/add-slider']    = 'admin_controller/sliders';
$route['admin/update-slider-item/(:num)'] = 'admin_controller/update_slider_item/$1';
//home page
$route['admin/about-us'] = 'admin_controller/home_about_settings';
$route['admin/counter'] = 'admin_controller/home_counter_settings';
//testimonials
$route['admin/testimonials']    = 'testimonial_controller/testimonials';
$route['admin/add-testimonial']    = 'testimonial_controller/add_testimonial';
$route['admin/save-testimonial']    = 'testimonial_controller/add_testimonial_post';
$route['admin/edit-testimonial/(:num)']    = 'testimonial_controller/edit_testimonial/$1';
$route['admin/update-testimonial']    = 'testimonial_controller/edit_testimonial_post';

//courses
$route['admin/courses']    = 'course_controller/courses';
$route['admin/add-courses']    = 'course_controller/add_courses';
$route['admin/save-courses']    = 'course_controller/save_courses';
$route['admin/edit-courses/(:num)']    = 'course_controller/edit_courses/$1';
$route['admin/update-courses']    = 'course_controller/update_courses';
//session
$route['admin/academic-session']    = 'academicsession_controller/sessions';
$route['admin/add-sessions']    = 'academicsession_controller/add_sessions';
$route['admin/save-sessions']    = 'academicsession_controller/save_sessions';
$route['admin/edit-sessions/(:num)']    = 'academicsession_controller/edit_sessions/$1';
$route['admin/update-sessions']    = 'academicsession_controller/update_sessions';
# pages
$route['admin/all-pages']    = 'page_controller/pages';
$route['admin/add-page']    = 'page_controller/add_page';
$route['admin/save-page']    = 'page_controller/add_page_post';
$route['admin/edit-page/(:num)']    = 'page_controller/update_page/$1';
$route['admin/update-page']    = 'page_controller/update_page_post';
//partners
$route['admin/partners']    = 'partner_controller/index';
$route['admin/add-partner']    = 'partner_controller/add_partner';
$route['admin/save-partner']    = 'partner_controller/add_partner_post';
$route['admin/edit-partner/(:num)']    = 'partner_controller/update_partner/$1';
$route['admin/update-partner']    = 'partner_controller/update_partner_post';
// teams
$route['admin/all-member']    = 'team_controller/all_member';
$route['admin/add-member']    = 'team_controller/add_member';
$route['admin/save-member']    = 'team_controller/add_member_post';
$route['admin/update-member']    = 'team_controller/edit_member_post';
$route['admin/edit-member/(:num)']   = 'team_controller/edit_member/$1';
#contact messages
$route['admin/contact-messages']    = 'admin_controller/contact_messages';
$route['admin/reply-messages-save']    = 'admin_controller/reply_message_post';
$route['admin/reply-message/(:num)']    = 'admin_controller/reply_message/$1';
$route['admin/view-reply-message/(:num)']    = 'admin_controller/view_reply_message/$1';
//newsletter
$route['admin/newsletter']    = 'admin_controller/newsletter';
// notice
$route['admin/notices']    = 'notice_controller/notices';
$route['admin/add-notice']    = 'notice_controller/newnotice';
$route['admin/save-notice']    = 'notice_controller/add_post_post';
$route['admin/update-notice']    = 'notice_controller/edit_notice_post';
$route['admin/edit-notice/(:num)']   = 'notice_controller/editnotice/$1';
// job
$route['admin/jobs']    = 'job_controller/jobs';
$route['admin/add-job']    = 'job_controller/newjob';
$route['admin/save-job']    = 'job_controller/add_post_post';
$route['admin/update-job']    = 'job_controller/edit_job_post';
$route['admin/edit-job/(:num)']   = 'job_controller/editjob/$1';
#job Cats
$route['admin/job-categories']    = 'Job_category_controller/jobCategories';
$route['admin/add-job-category']    = 'Job_category_controller/newjobCategory';
$route['admin/save-job-category']    = 'Job_category_controller/addjobCategory_post';
$route['admin/edit-job-category/(:num)']    = 'Job_category_controller/update_job_category/$1';
$route['admin/update-job-category']    = 'Job_category_controller/update_job_category_post';
//exam notice
$route['admin/exam-notice']    = 'examnotice_controller/index';
$route['admin/add-exam-notice']    = 'examnotice_controller/add_examnotice';
$route['admin/save-exam-notice']    = 'examnotice_controller/add_examnotice_post';
$route['admin/update-exam-notice']    = 'examnotice_controller/update_examnotice_post';
$route['admin/edit-exam-notice/(:num)']   = 'examnotice_controller/update_examnotice/$1';
//Assignment
$route['admin/assignments']    = 'assignment_controller/assignments';
$route['admin/add-assignment']    = 'assignment_controller/add_assignment';
$route['admin/save-assignment']    = 'assignment_controller/add_post_post';
$route['admin/update-assignment']    = 'assignment_controller/edit_assignment_post';
$route['admin/edit-assignment/(:num)']   = 'assignment_controller/editassignment/$1';
//subject
$route['admin/subjects']    = 'subject_controller/subjects';
$route['admin/add-subject']    = 'subject_controller/add_subject';
$route['admin/save-subject']    = 'subject_controller/add_subject_post';
$route['admin/update-subject']    = 'subject_controller/update_subject_post';
$route['admin/edit-subject/(:num)']   = 'subject_controller/update_subject/$1';
//Franchise
//$route['admin/add-franchise']    = 'adminfranchise_controller/add_franchise';
//$route['admin/save-franchise']    = 'adminfranchise_controller/add_franchise_post';
$route['admin/franchises']    = 'adminfranchise_controller/franchises';
$route['admin/approved-franchise']    = 'adminfranchise_controller/approve_franchise_list';
$route['admin/pending-franchise']    = 'adminfranchise_controller/pending_franchises';
$route['admin/un-complete-pending']    = 'adminfranchise_controller/un_complete_form';
//$route['admin/payment-pending-franchise']    = 'adminfranchise_controller/payment_pending_franchises';

$route['admin/rejected-franchise']    = 'adminfranchise_controller/reject_franchise_list';
$route['admin/dispute-franchise']    = 'adminfranchise_controller/dispute_franchise_list';
$route['admin/view-franchise-application/(:num)']    = 'adminfranchise_controller/view_application/$1';
$route['admin/reject-franchise-application/(:num)']    = 'adminfranchise_controller/reject_franchise_app/$1';
$route['admin/edit-franchise-application/(:num)']    = 'adminfranchise_controller/edit_application/$1';
$route['admin/update-franchise-application']    = 'adminfranchise_controller/edit_application_post';
$route['admin/franchise-approve-application/(:num)']    = 'adminfranchise_controller/frachise_approve_application/$1';

//student
$route['admin/add-student']    = 'adminstudent_controller/add_student';
$route['admin/save-student']    = 'adminstudent_controller/add_student_post';
$route['admin/students']    = 'adminstudent_controller/students';
$route['admin/pending-student']    = 'adminstudent_controller/pending_students';
$route['admin/approved-student']    = 'adminstudent_controller/approve_student_list';
$route['admin/rejected-student']    = 'adminstudent_controller/reject_student_list';
$route['admin/dispute-student']    = 'adminstudent_controller/dispute_student_list';
$route['admin/view-application/(:num)']    = 'adminstudent_controller/view_application/$1';
$route['admin/reject-application/(:num)']    = 'adminstudent_controller/reject_student_app/$1';
$route['admin/edit-student-application/(:num)']    = 'adminstudent_controller/edit_application/$1';
$route['admin/update-student-application']    = 'adminstudent_controller/edit_application_post';
$route['admin/approve-application/(:num)']    = 'adminstudent_controller/approve_application/$1';
// gallery image
#Gallery Image
$route['admin/image-gallery']    = 'gallery_controller/image_gallery';
$route['admin/add-image-gallery']    = 'gallery_controller/add_image_gallery';
$route['admin/save-image-gallery']    = 'gallery_controller/add_image_gallery_post';
$route['admin/update-image-gallery']    = 'gallery_controller/update_image_gallery_post';
$route['admin/edit-image-gallery/(:num)']   = 'gallery_controller/update_image_gallery/$1';

#Gallery Image
$route['admin/video-gallery']    = 'video_gallery_controller/video_gallery';
$route['admin/add-video-gallery']    = 'video_gallery_controller/add_video_gallery';
$route['admin/save-video-gallery']    = 'video_gallery_controller/add_video_gallery_post';
$route['admin/update-video-gallery']    = 'video_gallery_controller/update_video_gallery_post';
$route['admin/edit-video-gallery/(:num)']   = 'video_gallery_controller/update_video_gallery/$1';
#marksheet
$route['admin/marksheets']    = 'marksheet_controller/marksheets';
$route['admin/add-marksheet']    = 'marksheet_controller/add_marksheet';
$route['admin/save-update-marks']    = 'marksheet_controller/add_marksheet_post';
$route['admin/pending-marksheets']    = 'marksheet_controller/pending_marksheets';
$route['admin/add-edit-marksheet/(:num)']    = 'marksheet_controller/add_edit_marksheet/$1';
$route['admin/create-marksheet/(:num)/(:num)']    = 'marksheet_controller/create_marksheet/$1/$2';
$route['admin/waiting-marksheets']    = 'marksheet_controller/waiting_marksheets';
$route['admin/pass-fail/(:num)']    = 'marksheet_controller/mark_pass_fail/$1';
$route['admin/publish-marksheet/(:num)']    = 'marksheet_controller/publish_marksheet/$1';
$route['admin/print-marksheet/(:num)']    = 'marksheet_controller/print_marksheet/$1';

//certificates
$route['admin/certificats']    = 'certificate_controller/certificats';
$route['admin/publish-certificate/(:num)']    = 'certificate_controller/publish_certificate/$1';
//back dated marksheet
$route['admin/postdated-marksheet']    = 'oldmarksheet_controller/index';
$route['admin/add-postdated-marksheet']    = 'oldmarksheet_controller/add_new';
$route['admin/save-postdated-marksheet']    = 'oldmarksheet_controller/add_new_post';
$route['admin/old-marksheet-marks-breakups/(:num)']    = 'oldmarksheet_controller/marks_breakups/$1';
$route['admin/edit-old-marksheet/(:num)']    = 'oldmarksheet_controller/edit_marksheet/$1';
$route['admin/update-old-marks-details']    = 'oldmarksheet_controller/update_marks_breakups';
$route['admin/add-old-marks-details']    = 'oldmarksheet_controller/add_new_marks_breakups';
$route['admin/save-old-marksheet']    = 'oldmarksheet_controller/edit_marksheet_post';


#admin rout ends
$route['(:any)']['GET'] = 'home_controller/any/$1';