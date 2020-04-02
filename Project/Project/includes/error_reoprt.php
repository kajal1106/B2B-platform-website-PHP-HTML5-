<?php
include('config.php');
  
	 
  $errortype = $_POST['selectbasic'];
$mgs = "hello";

$mailto = "baghelsuraj567@gmail.com";

                              
	require 'PHPMailer-master/PHPMailerAutoload.php';
    //echo $cu[$i]['newsemail'];
   $mail = new PHPMailer();
   // echo $cu[$i]['mailer'];
   $mail ->IsSmtp();
   
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'tls';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 587; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "baghelsuraj567@gmail.com";
   $mail ->Password = "@@623355";
   $mail ->SetFrom("baghelsuraj567@gmail.com");
   $mail ->Subject = $errortype;
   $mail ->Body = $mgs;
   $mail ->AddAddress($mailto);
    
	
   if(!$mail->Send())
   {
       echo "Mail Not Sent";
	  
   }
   else
   {
       echo "Mail Sent";
   }
            	 
?>




   






