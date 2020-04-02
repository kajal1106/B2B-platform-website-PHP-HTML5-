<?php
include('includes/config.php');
  if( !$user->is_logged_in() ){ header('Location: index.php'); }

	 
  
                               try{
                           $results = $db->prepare("select * from newsletter");
                           $results->execute();
                           }
                           catch (Exception $ex) {
                              //echo $ex;
                           echo $ex;
                            // echo "failed";
                           exit();
                           }
                           //$sub= $results->fetchALL(PDO::FETCH_BOTH);
                             $cu= $results->fetchALL(PDO::FETCH_BOTH);
							 
                             $i=0;
							 require 'PHPMailer-master/PHPMailerAutoload.php';
    //echo $cu[$i]['newsemail'];
   $mail = new PHPMailer();
   // echo $cu[$i]['mailer'];
   $mail ->IsSmtp();
                             while(!empty($cu[$i]['newsemail']) && isset($cu[$i]['newsemail']) ) {
								 $mailto =  $cu[$i]['newsemail'];
								 //echo $i;
								 //echo $cu[$i]['newsemail'];
								 
	 
    $mailSub = $_POST['sub'];
    $mailMsg = $_POST['msg'];
   
    echo 'isstep';
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'tls';
   $mail ->Host = "thebizroot.com";
   $mail ->Port = 25; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "noreply@thebizroot.com";
   $mail ->Password = "Bizroot@123";
   $mail ->SetFrom("noreply@thebizroot.com");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);
    $i++;
	
   if(!$mail->Send())
   {
       echo "Mail Not Sent";
	   break;
   }
   else
   {
       echo "Mail Sent";
   }
								 
								 
                         
                          }
                             
                             
                             
	 
?>




   

