<?php

//PHPMailer lib
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// echo $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';


class Mail {

    public $gmail_username = "*****@gmail.com" ;
    public $gmail_password = "****";
    
    public $res;
    public $name;
    public $body;
    public $subject;        
    
    public function __construct( $res, $name, $subject, $body ) {
        $this->res = $res;
        $this->name = $name;
        $this->body = $body;
        $this->subject = $subject;
    }
    
    public function sendmail(){
        
        $mail = new PHPMailer(true);
        
        try {
            
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();    
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;                                  // Enable SMTP authentication
            $mail->Username = $this->gmail_username;                // SMTP username
            $mail->Password = $this->gmail_password;               // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                   // TCP port to connect to
            
            //Recipients
            $mail->setFrom($this->gmail_username, 'The Vegad Prtint Store');
            $mail->addAddress( $this->res, $this->name);     // Add a recipient
            
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $this->subject;
            $mail->Body = $this->body;
            
            $mail->send();
            
            return 1;
        } catch (Exception $e) {        
//            return 'Message could not be sent. Mailer Error: $mail->ErrorInfo' ;
            return -1;
        }//end try catch
        
    }
}