<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* PHP Mailer */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

class Sendmail extends CI_Controller
{

    public function index($page = 'index.php')
    {
        $this->load->view('page/'.$page);
    }

    public function viewDetail($page = 'detail.php')
    {   
       $data['key'] = $this->input->get('p');
       $this->load->view('page/'.$page,$data);
    }

    public function SendEmail()
    {       
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
     
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'your@gmail.com';                   // SMTP username
            $mail->Password = 'your_password_gmail';                   // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('example@gmail.com','name');

            $mail->addAddress($this->input->post('email'));        // Name is optional
            $mail->addReplyTo('example@gmail.com', 'name');

            //Content
            $mail->isHTML(true);                                   // Set email format to HTML
            $mail->Subject = $this->input->post('subject');
            $mail->Body    = strip_tags($this->input->post('body'));
            $mail->AltBody = 'Mailer';

            

            if ($mail->send()) {

                $response = array(

                    'message'=> 1,

                );

                echo json_encode($response);

            }else{

                $response = array(

                    'message'=> 0,

                );

                echo json_encode($response);

            }
        

    }
    
}
