<?php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   require 'C:\xampp\htdocs\shortcourses_ms\vendor\autoload.php';

   try {
   //Initialize PHPMailer and set SMTP protocol
      $mail = new PHPMailer(TRUE);
      $mail->isSMTP();
      $mail->SMTPDebug = 1;//to allow debugging
      $mail->SMTPAuth = TRUE;
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;
      $mail->Host = 'smtp.gmail.com';
      $mail->Username = 'ishimwebernardin90@gmail.com';
      $mail->Password = 'Irakiza@123';

   //Set Email requirements, header and body
      $mail->IsHTML(true);
      $mail->setFrom('ishimwebernardin90@gmail.com', 'name');
   	$mail->addAddress('batymbaru@gmail.com', 'name');
     	$mail->Subject = 'Email From IPRC Ngoma short courses management';
     	$mail->Body = 'Hello, Dear applicant your application submitted successfully your informed on your result';

   //Send the Email and catch eexceptions
      if($mail->send()){
         echo('Email successfully sent!');
      }
   } catch (Exception $e) {
      echo 'LocalException: '.$e->errorMessage();
   }
   
?>
