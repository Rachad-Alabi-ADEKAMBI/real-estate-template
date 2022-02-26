<?php
/*
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require_once "public/PHPMailer/src/Exception.php";
require_once "public/PHPMailer/src/PHPMailer.php"; 
require_once "public/PHPMailer/src/SMTP.php";

function sendmail($subject, $message, $receiver){

  $mail = new PHPMailer(true);

  try {
      //Server settings
    //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'gnou.o2switch.net';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'vqwi3868';                     //SMTP username
      $mail->Password   = '2?xdKn+gwgF2';                               //SMTP password
      $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('contact@fineblock.eu', 'contact@fineblock.eu');
      $mail->addAddress($receiver);     //Add a recipient
      //$mail->addAddress('ellen@example.com');               //Name is optional
      $mail->addReplyTo('contact@fineblock.eu', 'fineblock');
    //  $mail->addCC('cc@example.com');
     // $mail->addBCC('bcc@example.com');
  
      //Attachments
      //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
      
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
    //  $mail->Subject = $subject;
      $mail->Body   = $message;
      $mail->Subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

      $mail->charset = "utf-8";
     // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      //echo "Le message a été envoyé";
  } catch (Exception $e) {
      echo "Message non envoyé. Mailer Error: {$mail->ErrorInfo}";
  }

}

*/