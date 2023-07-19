<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . "third_party/phpmailer/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email_model extends CI_Model
{
    //send email activation
   /* public function send_email_activation($user_id)
    {
        $user_id = clean_number($user_id);
        $user = $this->authication_model->get_user($user_id);
        if (!empty($user)) {
            $token = $user->token;
            //check token
            if (empty($token)) {
                $token = generate_token();
                $data = array(
                    'token' => $token
                );
                $this->db->where('id', $user->id);
                $this->db->update('users', $data);
            }

            $data = array(
                'subject' => trans("confirm_your_account"),
                'to' => $user->email,
                'template_path' => "email/email_activation",
                'token' => $token
            );

            $this->send_email($data);
        }
    }*/

    //send email reset password
    public function send_email_reset_password($user_id)
    {
        $user_id = clean_number($user_id);
        $user = $this->authication_model->get_user($user_id);
        if (!empty($user)) {
            $token = $user->token;
            //check token
            if (empty($token)) {
                $token = generate_token();
                $data = array(
                    'token' => $token
                );
                $this->db->where('id', $user->id);
                $this->db->update('users', $data);
            }

            $data = array(
                'subject' => "Reset Password",
                'to' => $user->email,
                'template_path' => "email/email_reset_password",
                'token' => $token,
                'cc' =>  false,
            );

            $this->send_email($data);
        }
    }

    //send email newsletter
    public function send_email_notification($data)
    {
            $mailData = array(
                'subject' => $data['subject'],
                'email_content' => $data['email_content'],
                'to' => $data['to_mail'],
                'template_path' => "email/email_general",
                'email_button_text' =>  $data['email_button_text'],
                'email_link' =>  $data['email_link'],
                'cc' =>  $data['cc'],
            );
            return $this->send_email($mailData);
        
    }

    //send email
    public function send_email($data)
    {
        $configs =  $this->settings_model->get_general_settings();
        $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host = $configs->mail_host;
                $mail->SMTPAuth = true;
                $mail->SMTPDebug = 0;
                $mail->Username = $configs->mail_username;
                $mail->Password = $configs->mail_password;
                $mail->SMTPSecure = 'tls';
                $mail->CharSet = 'UTF-8';
                $mail->Port = $configs->mail_port;
                //Recipients
                $mail->setFrom($configs->mail_username, $configs->mail_title);
                $mail->addAddress($data['to']);
                // if($data['cc']==true){
                // $mail->AddCC('bccsmonline@gmail.com');
                // }
                $mail->AddReplyTo($configs->mail_username, $configs->mail_title);
                //Content
                $mail->isHTML(true);
                $mail->Subject = $data['subject'];
                if (isset($data['file'])) 
                {
                  if(is_array($data['file']))
                  {
                    foreach ($data['file'] as $key => $file) 
                    {
                      $file_name = isset($data['file_name'][$key])?$data['file_name'][$key]:'';  
                      $mail->addAttachment($data['file'],$file_name);
                    }
                  }
                  else
                  {
                     $file_name = isset($data['file_name'])?$data['file_name']:'';  
                     $mail->addAttachment($file,$file_name);
                  }  
                  
                }
                if (isset($data['template_path'])) 
                {
                   $mail->Body = $this->load->view($data['template_path'], $data, TRUE, 'text/html');
                }
                else 
                {
                   $mail->Body = $data['email_content']; 
                }    
                
                $mail->send();
                return true;
            } catch (Exception $e) {
                $this->session->set_flashdata('error', $mail->ErrorInfo);
                return false;
            } 
            return true;
    }
}
