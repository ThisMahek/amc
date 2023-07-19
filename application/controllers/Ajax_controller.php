<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ajax_controller extends Home_Core_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
    }

    public function index()
    {
        # code...
    }

    public function extraImageUpload()
    {
        if ($_FILES['extra_image']['name'] != '') {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('extra_image')) {
                $file_data = $this->upload->data();
                //compress & resize 
                $this->resizeImage($file_data);
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }

    public function featuredImageUpload()
    {
        if ($_FILES['featured_image']['name'] != '') {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg|jfif';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('featured_image')) {
                $file_data = $this->upload->data();
                //compress & resize 
                $this->resizeImage($file_data);
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }

    public function teamImageUpload()
    {
        if ($_FILES['member_image']['name'] != '') {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('member_image')) {
                $file_data = $this->upload->data();
                //compress & resize 
                $this->resizeTeamImage($file_data);
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }

    public function resizeImage($file_data)
    {
        $this->load->library('image_lib');
        $path = FCPATH . "/uploads/tempimg/";
        $height = 450;
        $width = 750;
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path . $file_data["raw_name"] . $file_data['file_ext'];
        $config['new_image'] = $path . $file_data["raw_name"] . $file_data['file_ext'];
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = "60";
        $config['width']         = $width;
        $config['height']       = $height;
        $this->image_lib->clear();
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }

    public function resizeTeamImage($file_data)
    {
        $this->load->library('image_lib');
        $path = FCPATH . "/uploads/tempimg/";
        $height = 390;
        $width = 390;
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path . $file_data["raw_name"] . $file_data['file_ext'];
        $config['new_image'] = $path . $file_data["raw_name"] . $file_data['file_ext'];
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = "60";
        $config['width']         = $width;
        $config['height']       = $height;
        $this->image_lib->clear();
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }
    // remove extra image 
    public function removeExtraImage()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }
    // remove extra image 
    public function removefeaturedImage()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }


    // remove extra image 
    public function removeMemberImage()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }


    // upload files
    public function uploadFiles()
    {
        if ($_FILES['upload_files']['name'] != '') {
            $path = FCPATH . "/uploads/tempfiles/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'pdf|xls|doc|docx|xlsx|zip';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = false;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('upload_files')) {
                $file_data = $this->upload->data();
                //compress & resize 
                $this->resizeImage($file_data);
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }



    public function ckFileUpload()
    {

        $path = "/uploads/misc/";
        $rpath = "/uploads/misc/";

        /*  $filename = "6c1bc64f1120a728ef73ac0d71aec47d.jpeg";
        $CKEditorFuncNum = 1;
        $url = base_url() . $rpath . $filename;
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction('" . $CKEditorFuncNum . "', '" . $url . "', 'Send OK')</script>";
        exit; */


        if ($_FILES['upload']['name'] != '') {
            $path = FCPATH . "/uploads/misc/";
            $rpath = "uploads/misc/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('upload')) {
                $file_data = $this->upload->data();
                $filename = $file_data['file_name'];
                $CKEditorFuncNum = 1;
                $url = base_url() . $rpath . $filename;
                echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction('" . $CKEditorFuncNum . "', '" . $url . "', 'Send OK')</script>";
            } else {
                echo "<script>alert('Send Fail" . $this->upload->display_errors('', '') . "')</script>";
            }
        } else {
            echo "<script>alert('Blank File')</script>";
        }
    }

    /*
    *------------------------------------------------------------------------------------------
    * NEWSLETTER
    *------------------------------------------------------------------------------------------
    */

    /**
     * Add to Newsletter
     */
    public function add_to_newsletter()
    {
       post_method();
       
        $vld = $this->input->post('url', true);
        if (!empty($vld)) {
            exit();
        }
        $data = array(
            'result' => 0,
            'response' => "",
            'is_success' => "",
        );
        $email = clean_str($this->input->post('email', true));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data['response'] = '<h5 class="text-danger m-t-5 sub-message"> Invalid email address! </h5>';
        } else {
            if ($email) {
                if (empty($this->newsletter_model->get_subscriber($email))) {
                    if ($this->newsletter_model->add_subscriber($email)) {
                        $data['response'] = '<h5 class="text-success m-t-5 sub-message">Your email address has been successfully added!</h5>';
                        $data['is_success'] = 1;
                    }
                } else {
                    $data['response'] = '<h5 class="text-danger m-t-5 sub-message">Your email address is already registered!</h5>';
                }
            }
        }
        $data['result'] = 1;
        echo json_encode($data);
    }

    /*
    *------------------------------------------------------------------------------------------
    * STUDENT
    *------------------------------------------------------------------------------------------
    */
    public function uploadstudentImage()
    {
        if ($_FILES['avatar']['name'] != '') {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('avatar')) {
                $file_data = $this->upload->data();
                //compress & resize 
                //$this->resizeImage($file_data);
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }

    public function remove_student_img()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }

    public function uploadstSignImage()
    {
        if ($_FILES['sign_img']['name'] != '') {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('sign_img')) {
                $file_data = $this->upload->data();
                //compress & resize 
                //$this->resizeImage($file_data);
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }

    public function removeSignImg()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }

    public function uploadstCertificateImage()
    {
        if ($_FILES['cast_certi_img']['name'] != '') {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('cast_certi_img')) {
                $file_data = $this->upload->data();
                //compress & resize 
                //$this->resizeImage($file_data);
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }

    public function removeCustImg()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }

    public function uploadIdProveImage()
    {
        if ($_FILES['id_prof_img']['name'] != '') {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('id_prof_img')) {
                $file_data = $this->upload->data();
                //compress & resize 
                //$this->resizeImage($file_data);
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }

    public function removeIdProveImg()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }


    public function uploadGraduateImg()
    {
        if ($_FILES['graduate_marksheet_img']['name'] != '') {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('graduate_marksheet_img')) {
                $file_data = $this->upload->data();
                //compress & resize 
                //$this->resizeImage($file_data);
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }

    public function removeGraduateImg()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }

    public function uploadHsImge()
    {
        if ($_FILES['hs_marksheet_img']['name'] != '') {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('hs_marksheet_img')) {
                $file_data = $this->upload->data();
                //compress & resize 
                //$this->resizeImage($file_data);
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }

    public function removeHSImage()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }

    public function uploadMpimg()
    {
        if ($_FILES['mp_marksheet_img']['name'] != '') {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('mp_marksheet_img')) {
                $file_data = $this->upload->data();
                //compress & resize 
                //$this->resizeImage($file_data);
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }

    public function removeMpImage()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }
     public function disputFranchiseApplication()
    {
        $franchise_id  = clean_number($this->input->post('franchise_id', true));
        $franchise = $this->franchise_model->get_franchise_by_id($franchise_id);
        if (!empty($franchise)) 
        {
            $updateArr = array(
                'dispute_on' => date('Y-m-d H:i:s'),
                'status' => 4,
                'franchise_id'=>$franchise_id
            );
            $updateArr2 = array(
                'approval_status' => 3,
            );
            $this->franchise_model->addUpdateFranchise($updateArr, 'edit');
            $this->authication_model->updateUsers($updateArr2, $franchise->user_id);
            $maildata = array(
                'subject' => "Franchise Approved application found dispute",
                'to_mail' => $franchise->franchise_email,
                'email_content' => "<P> Dear ".$franchise->franchise_name.", <br> we have found some dispute  on your uploded documents,please login to your panel and re-upload the required documents, otherwise the application trated as cancel.<br> Thanks<br>Alternative Medicine Center",
                'email_button_text' => "Check Application Status",
                'email_link' => base_url('login'),
                'cc' => false,
                'email_type' => 'genaral',
            );
            $this->session->set_flashdata('success', "Application Mark As Disputed");
            $this->session->set_userdata('mds_send_email_data', json_encode($maildata));
            $status['status'] = 1;
            $status['redirect'] = admin_url(). 'pending-franchise';
            echo (json_encode($status));
        } else {
            $this->session->set_flashdata('error', "Please Try Again...");
            $status['status'] = 0;
            $status['redirect'] = admin_url() . 'pending-franchise';
            echo (json_encode($status));
        }
    }
    public function disputStudentApplication()
    {
        $studentID  = clean_number($this->input->post('studentID', true));
        $student = $this->student_model->get_student_by_id($studentID);
        if (!empty($student)) {
            $updateArr = array(
                'dispute_on' => date('Y-m-d H:i:s'),
                'status' => 3,
            );
            $updateArr2 = array(
                'approval_status' => 3,
            );
            $this->student_model->updateSingleStudent($updateArr, $student->id);
            $this->authication_model->updateUsers($updateArr2, $student->user_id);
            $maildata = array(
                'subject' => "Studnet admission application found dispute",
                'to_mail' => $student->email,
                'email_content' => "<P> Dear Student, <br> we have found some dispute  on your uploded documents,please login to your panel and re-upload the required documents, otherwise the application trated as cancel.<br> Thanks<br> ",
                'email_button_text' => "Check Application Status",
                'email_link' => base_url('login'),
                'cc' => false,
                'email_type' => 'genaral',
            );
            $this->session->set_flashdata('success', "Application Mark As Disputed");
            $this->session->set_userdata('mds_send_email_data', json_encode($maildata));
            $status['status'] = 1;
            $status['redirect'] = admin_url(). 'pending-student';
            echo (json_encode($status));
        } else {
            $this->session->set_flashdata('error', "Please Try Again...");
            $status['status'] = 0;
            $status['redirect'] = admin_url() . 'pending-student';
            echo (json_encode($status));
        }
    }

    public function deleteDisputImage()
    {
        $stu_id  = clean_number($this->input->post('stu_id', true));
        $delFileName  = $this->input->post('delFileName', true);
        $student = $this->student_model->get_student_by_id($stu_id);
        if (!empty($student)) {
            $image = $student->$delFileName;
            $path = FCPATH . "/uploads/student_images/";
            //update to null 
            $updateArr = array(
                $delFileName => '',
            );
            $this->student_model->updateSingleStudent($updateArr, $student->id);
            if ($delFileName == 'avatar') {
                $this->authication_model->updateUsers($updateArr, $student->user_id);
            }
            unlink($path . $image);
            $status['error'] = 0;
            echo (json_encode($status));
        } else {
            $status['error'] = 1;
            echo (json_encode($status));
        }
    }

    /*
    *------------------------------------------------------------------------------------------
    * EMAIL FUNCTIONS
    *------------------------------------------------------------------------------------------
    */

    //send email
    public function send_email()
    {
        $email_type = $this->input->post('email_type', true);
        if ($email_type == 'contact') 
        {
            $this->send_email_contact_message();
        } elseif ($email_type == 'admission_approve') {
            $this->send_email_admission_approve();
        }elseif ($email_type == 'application_approve') {
            $this->send_email_admission_approve();
        }
        elseif ($email_type == 'verification') 
        {
            $this->eMailMobileAndAadhatVerification();
        }
        else if ($email_type == 'franchise_welcome') 
        {
           // $this->sendFranchiseWelcomeMail();
        } 
        elseif ($email_type == 'genaral') 
        {
            $this->send_email_general();
        }
    }
    public function createPdf($franchise_id)
    {
        $this->load->library("Pdf","pdf");
        $franchise_id = !empty($franchise_id)?$franchise_id:2;
        $frannchise_data = $this->franchise_model->get_franchise_by_id($franchise_id);
        
        $welcomeImage = base_url().'assets/welcome_image.png';
        ob_start();
        include_once (FCPATH.'assets/franchise_welcome_leter.html');
        $welcome_letter = ob_get_clean();     
 
        $welcome_letter = str_replace("{FranchiseName}",$frannchise_data->franchise_name,$welcome_letter);
        $welcome_letter = str_replace("{welcomeImage}",$welcomeImage,$welcome_letter);
        $welcome_letter_file_name = "welcome_letter_".time().".pdf";
       /* $welcome_letter = '<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <style>
      @page {
  size: letter portrait;
}
  </style>
</head>
<body>
        <img alt="" src="'.$welcomeImage.'"/ style="height:auto;width:100%">
</body>
</html>';*/
        $aData = [];
        $aData['file_name'] = "welcome_letter";//$welcome_letter_file_name;
        $aData['is_save_on_dir'] = true;
        $aData['html_content'] = $welcome_letter;
        //$aData['test'] = true;
        $aData['page_size'] = 'legal';
        $this->pdf->load_view('',$aData);
    }
    public function sendFranchiseWelcomeMail()
    {
       $this->load->library("Pdf","pdf"); 
       $franchise_id = $this->input->post('franchise_id',true); 
       $frannchise_data = $this->franchise_model->get_franchise_by_id($franchise_id);
       $welcomeImage = base_url().'assets/welcome_image.png';
       $this->load->model("email_model");
        ob_start();
        include_once (FCPATH.'assets/franchise_welcome_leter.html');
        $welcome_letter = ob_get_clean();     

        $welcome_letter = str_replace("{FranchiseName}",$frannchise_data->franchise_name,$welcome_letter);
        $welcome_letter = str_replace("{welcomeImage}",$welcomeImage,$welcome_letter);
        $welcome_letter_file_name = "welcome_letter_".time().".pdf";
        $aData = [];
        $aData['file_name'] = $welcome_letter_file_name;
        $aData['is_save_on_dir'] = true;
        $aData['html_content'] = $welcome_letter;
        $aData['page_size'] = 'letter';
        //$aData['test'] = true;
        $this->pdf->load_view('',$aData);
        $email_content = " <div>
                               <h1>WELCOME</h1>
                               <h2>To the SSGIPS Family<h2> 
                               <div style=''> ".$frannchise_data->franchise_name."<div>
                               <p>we are honored that you have chosen <strong>ALTERNATIVE MEDICINE CENTER </strong> as your professional home.</p>
                               <p>Our commitment to you is to put our people first. Making this place for you to excel,archive greatness & grow your institution franchise.We have SSGIPS will be place you call home for a very long time…</p>
                                <div>Thank You & welcom  to the SSGIPS family!</div>
                           </div>
                        ";  
        //$aFiles = [FCPATH.'assets/terms_and_conditions.pdf',FCPATH . "/uploads/tempfiles/".$welcome_letter_file_name];
        $aFiles = [FCPATH.'assets/terms_and_conditions.pdf'];
        $aFileName = ['Terms & Conditions SSGIPS'];                              
        $data = array(
                'template_path' => "email/email_general",
                'to' =>$frannchise_data->franchise_email,
                'subject' => "Welcome to become Franchise of SSGIPS",
                'email_content' => $email_content,
                'email_link' => "",
                'file'=>$aFiles,
                'file_name'=>$aFileName,
                'email_button_text' => "",
                'cc'=>false,
            );
        
         $this->email_model->send_email($data);   
    }
    public function eMailMobileAndAadhatVerification()
    {
        $aResponse = array('status'=>false);
        $aParam = $_REQUEST;
        if (!isset($aParam['email']) || empty($aParam['email'])) 
        {
           $aResponse['message'] = "Email can't be empty!";
        }
        elseif (!filter_var($aParam['email'], FILTER_VALIDATE_EMAIL)) 
        {
           $aResponse['message'] = "Invalid Email!";
        }
        else
        {
            $verification_code = rand(1000,9999);
            $this->load->model("email_model");
            $email_content = '<h3>Verify your email address<h3>
                              <p>Thanks for starting the new SSGIPS Franchise account creation process. We want to make sure it\'s really you. Please enter the following verification code when prompted. If you don’t want to create an account, you can ignore this message.</p><br>
                              <div style="font-weight:bold;padding-bottom:15px">Verification code</div>
                              <div style="color:#000;font-size:36px;font-weight:bold;padding-bottom:15px">'.$verification_code.'</div>
                              ';
            $data = array(
                'template_path' => "email/email_general",
                'to' => $this->input->post('email', true),
                'subject' => "SSGIPS Email Verification",
                'email_content' => $email_content,
                'email_link' => "",
                'email_button_text' => "",
                'cc'=>false,
            );
            if($this->email_model->send_email($data))
             {
                $aUpdate = [
                            'verification_type'=>'email',
                            'user_id'=>$this->input->post('user_id', true),
                            'verification_value'=>$this->input->post('email', true),
                            'verification_code'=>$verification_code,
                           ];          
                $verification_id = $this->authication_model->addUpdateVerification($aUpdate);
                $aResponse = array('status'=>true,'verification_id'=>$verification_id,'message'=>"Verification code send on your email , Please enter code to verified your email id");           
             }   
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($aResponse));    
    }
        //send email general
    public function send_email_general()
    {
        $this->load->model("email_model");
        $data = array(
            'template_path' => "email/email_general",
            'to' => $this->input->post('to_mail', true),
            'subject' => $this->input->post('subject', true),
            'email_content' => $this->input->post('email_content', true),
            'email_link' => $this->input->post('email_link', true),
            'email_button_text' => $this->input->post('email_button_text', true),
            'cc'=>false,
        );
        $this->email_model->send_email($data);
    }

    public function send_email_contact_message()
    {
            $data = array(
                'subject' => 'Contact Message',
                'to' => $this->general_settings->contact_email,
                'template_path' => "email/email_contact_message",
                'message_name' => $this->input->post('message_name', true),
                'message_email' => $this->input->post('message_email', true),
                'message_text' => $this->input->post('message_text', true)
            );
            $this->email_model->send_email($data);
        
    }

    public function send_email_admission_approve()
    {
         $id = $this->input->post('student_id', true);
         $student = $this->student_model->get_student_by_id($id);
         $course = $this->course_model->get_course_by_id($student->course_id);
         $aca_sess = $this->academicsession_model->get_academicsession_by_id($student->session_id);
        $maildata = [
            'template_path' => "email/email_general",
            'subject' => "Admission application Approved",
            'to' => $student->email,
            'email_button_text' => "",
            'email_link' => "",
            'cc' => false,
            'email_content' => "<P> Dear Student, <br> We are happy to inform you that your application  has been approved. You have sheduled to batch " . $aca_sess->session_name . " Which will be started form " . date('d-M-Y',strtotime($aca_sess->start_date)) . " please contact with the authority for further details.<br> Thanks<br> ",
        ];
        $this->email_model->send_email($maildata);
    }


    public function getCourseDetails()
    {
        $id = $this->input->post('courseid',true);
        $courseData = $this->course_model->get_course_by_id($id);
        if(!empty($courseData)){
            $status['error'] = 0;
            $status['data'] = $courseData;
            echo (json_encode($status));
        }else{
            $status['error'] = 1;
            echo (json_encode($status));
        }
    }

    public function getStudentListsForMarksheet()
    {
        $course_id = $this->input->post('course_id', true);
        $session_id = $this->input->post('session_id', true);
        $students = $this->student_model->get_students_condition(['isuued_certificate'=>0, 'course_id'=> $course_id, 'session_id'=> $session_id]);
        $html= '<table class="table table-bordered table-striped dataTable " id="cs_datatable" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr>
                               <th>ID</th>
                                <th>Student Name</th>
                                <th>Reg NO</th>
                                <th>Roll NO</th>
                                <th>Enroll NO</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>';
        if(!empty($students)){
            foreach ($students as $student) {
                $html.= '
                   <tr>
                    <td>'.$student->id.'</td>
                    <td>'.$student->stu_name.'</td>
                    <td>'.$student->reg_no.'</td>
                    <td>'.$student->roll_no.'</td>
                    <td>'.$student->enroll_no.'</td>
                    <td><a href="'.admin_url().'add-edit-marksheet/'.$student->id.'" class="btn btn-primary">Add Edit Marksheet</a></td>
                   </tr>
                ';
            }
        }
        $html.= '</tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Reg NO</th>
                                <th>Roll NO</th>
                                <th>Enroll NO</th>
                                <th>Option</th>
                            </tr>
                        </tfoot>
                    </table>';
        echo $html;
    }
    /* FRANCHISE DOCUMENT UPLOAD*/
    public function uploadRegistrationCertificateImg()
    {
        if ($_FILES['registration_certificate_img']['name'] != '') 
        {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('registration_certificate_img')) 
            {
                $file_data = $this->upload->data();
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }
    public function removeRegistrationCertificateImg()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }
    public function uploadFrPanCard()
    {
        if ($_FILES['franchise_pan_card_img']['name'] != '') 
        {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('franchise_pan_card_img')) 
            {
                $file_data = $this->upload->data();
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }
    public function removeFrPanCard()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }
    public function uploadUniqueId()
    {
        if ($_FILES['unique_id_img']['name'] != '') 
        {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('unique_id_img')) 
            {
                $file_data = $this->upload->data();
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }
    public function removeUniqueId()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }
    public function uploadMsmeCertificate()
    {
        if ($_FILES['msme_certificate_img']['name'] != '') 
        {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('msme_certificate_img')) 
            {
                $file_data = $this->upload->data();
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }
    public function removeMsmeCertificate()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }
    public function uploadAadharCard()
    {
        if ($_FILES['president_aadhar_img']['name'] != '') 
        {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('president_aadhar_img')) 
            {
                $file_data = $this->upload->data();
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }
    public function removeAadharCard()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }
    public function uploadPresidentPanCard()
    {
        if ($_FILES['president_pan_img']['name'] != '') 
        {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('president_pan_img')) 
            {
                $file_data = $this->upload->data();
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }
    public function removePresidentPanCard()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }
    public function uploadPresidentImage()
    {
        if ($_FILES['president_photograph_img']['name'] != '') 
        {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('president_photograph_img')) 
            {
                $file_data = $this->upload->data();
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }
    public function removePresidentImage()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }
    public function uploadSignatureImages()
    {
        if ($_FILES['president_signature_img']['name'] != '') 
        {
            $path = FCPATH . "/uploads/tempimg/";
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('president_signature_img')) 
            {
                $file_data = $this->upload->data();
                $status['error'] = 0;
                $status['uploded_message'] = $file_data['file_name'];
            } else {
                $status['error'] = 1;
                $status['message'] = $this->upload->display_errors();
            }
            echo (json_encode($status));
        }
    }
    public function removeSignatureImages()
    {
        $image  = $this->input->post('image', true);
        $path = FCPATH . "/uploads/tempimg/";
        unlink($path . $image);
        $status['error'] = 0;
        echo (json_encode($status));
    }
    public function verified_email()
    {
       $aResponse = array('status'=>false,'message'=>'wrong code try again');
        $aParam = $_REQUEST;
        if (!isset($aParam['verification_code']) || empty($aParam['verification_code'])) 
        {
           $aResponse['message'] = "Verification Id can't be empty!";
        }
        elseif (!isset($aParam['verification_id']) || empty($aParam['verification_id'])) 
        {
           $aResponse['message'] = "Verification Id Can't be empty!";
        }
        else
        {
           $aVerificationCode = $this->authication_model->get_verification_code_by_id($aParam['verification_id']);
           if ($aParam['verification_code'] == $aVerificationCode->verification_code) 
           {
              $aResponse = array('status'=>true,'message'=>'Your email id is verified','email_verification'=>1);
              $aUpdate = ['where'=>['user_name'=>$aVerificationCode->verification_value],'email_verification'=>1];
              $this->franchise_model->addUpdateFranchise($aUpdate,'edit');
           }
        } 
        echo (json_encode($aResponse));   
    }
    function downloadApplicationForm($id)
    {
        $this->load->library("Pdf","pdf");
        $logoImage = base_url().'assets/ssgips_logo.png';
        $transParentLogo = base_url().'assets/ssgips_transparent_logo.png';
        $signatureImage = base_url().'assets/signature.PNG';
        $franchise = $this->franchise_model->get_franchise_by_id($id);
        $trans =  $this->transaction_model->get_admission_trannsaction_by_userID($franchise->user_id,'franchise_registeration');
        $html = applicationFormDetails($franchise,$trans);
        //echo $html;die();
        $pdfData = array('FranchiseDetails'=>$html,'logoPath'=>$logoImage,'ReferenceNo'=>$franchise->reg_no,'GenrateDate'=>date('d, M Y'),'signatureImage'=>$signatureImage,'transParentLogo'=>$transParentLogo);
        ob_start();
        include_once (FCPATH.'assets/franchise_application_form.html');
        $staticPdfContent = ob_get_clean();
        ob_end_clean();
        $replaceKeys = array_keys($pdfData);        
        $keyArr = array();
        foreach ($replaceKeys as $data) {
          $keyArr[] = '{'.$data.'}';
        }
        $replace_this = $keyArr;
        $replace_with = array_values($pdfData);
        $pdfContent = str_replace($replace_this, $replace_with, $staticPdfContent);
        //echo $pdfContent;die;
        $aData = [];
        $aData['file_name'] = "Applicatio_form_".$franchise->enroll_no.'.pdf';
        $aData['is_save_on_dir'] = false;
        $aData['html_content'] = $pdfContent;
        //$aData['test'] = true;
        $this->pdf->load_view('',$aData);
    }
}
