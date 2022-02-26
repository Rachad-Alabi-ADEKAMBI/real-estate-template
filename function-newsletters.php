<?php


use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require_once "public/PHPMailer/src/Exception.php";
require_once "public/PHPMailer/src/PHPMailer.php"; 
require_once "public/PHPMailer/src/SMTP.php";

function sendNewsletters($subject, $message, $receiver){

  $mail = new PHPMailer(true);

  try {
      //Server settings
     // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'gnou.o2switch.net';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'vqwi3868';                     //SMTP username
      $mail->Password   = '2?xdKn+gwgF2';                               //SMTP password
      $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('contact@fineblock.eu', 'Fineblock');
      $mail->addAddress($receiver);     //Add a recipient
   
      include 'traitements/db.php';
       
      $mail->addReplyTo('contact@fineblock.eu', 'Fineblock');
    //  $mail->addCC('cc@example.com');
     // $mail->addBCC('bcc@example.com');

    $req = $pdo->query("SELECT * FROM newsletters ORDER BY id  DESC
    LIMIT 1");

      //Attachments
      //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional nam
      while ($datas = $req->fetch()){
        $fileName1 = $datas['image1'];
        $fileName2 = $datas['image2'];
        $fileName3 = $datas['image3']; 
        $fileName4 = $datas['image4']; 
     
      }
      //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
      $mail->addAttachment('public/images/newslettersFiles/'.$fileName1 , $fileName1); 
      $mail->addAttachment('public/images/newslettersFiles/'.$fileName2 , $fileName2); 
      $mail->addAttachment('public/images/newslettersFiles/'.$fileName3 , $fileName3); 
      $mail->addAttachment('public/images/newslettersFiles/'.$fileName4 , $fileName4); 
      
     // $mail->$path;    //Optional name
  
      //Content
      $mail->isHTML(false);                                  //Set email format to HTML
      $mail->Subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';;
      $mail->Body    = $message;
      $mail->charset = "utf-8";
     // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
     // echo "Le message a été envoyé";
  } catch (Exception $e) {
      echo "Message non envoyé. Mailer Error: {$mail->ErrorInfo}";
  }

}
