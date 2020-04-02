<?php
include('includes/config.php');
include('includes/classes/phpmailer/mailenquiry.php');
define('SITEEMAIL1','enquiry@thebizroot.com');
$stmtfetch = $db->prepare('INSERT INTO newsletter(newsemail) VALUES(:newsemail)');
$stmtfetch->execute(array(':newsemail'=>$_POST['emailid']));
if( $user->is_logged_in() ){
  $stmtfetch = $db->prepare('SELECT * FROM clientlead where clientLeadId =:clientLeadId');
  $stmtfetch->execute(array(':clientLeadId'=>$_POST['ref']));
  $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);

  $stmtfetch1 = $db->prepare('SELECT * FROM businesscontactinformation where businessID =:businessID');
  $stmtfetch1->execute(array(':businessID'=>$_SESSION['businessID']));
  $row1 = $stmtfetch1->fetch(PDO::FETCH_ASSOC);

  $to = $_POST['emailid'];
  $subject = "Reference of Lead From Thebizroot";
  $body = "<p>Please check regarding lead at <a href = '".DIR.'lead-single-listing.php?lid='.$_POST['ref']."'>thebizroot site</a>.</p>
  <p>lead Name ".$row['leadName']."</p>
  <p>lead refral send by ".$row1['businessName']."</p>
  <p>Regards thebizroot</p>";

  $mail = new Mail();
  $mail->setFrom(SITEEMAIL1);
  $mail->addAddress($to);
  $mail->subject($subject);
  $mail->body($body);
  $mail->send();

  //redirect to index page
  header('Location: business-dashboard.php');

}else if($user->is_client_logged_in()) {
  $stmtfetch = $db->prepare('SELECT * FROM clientlead where clientLeadId =:clientLeadId');
  $stmtfetch->execute(array(':clientLeadId'=>$_POST['ref']));
  $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);

  $stmtfetch1 = $db->prepare('SELECT * FROM clientcontactinformation where clientID =:clientID');
  $stmtfetch1->execute(array(':clientID'=>$_SESSION['clientID']));
  $row1 = $stmtfetch1->fetch(PDO::FETCH_ASSOC);


  $to = $_POST['emailid'];
  $subject = "Reference of Lead From Thebizroot";
  $body = "<p>Please check regarding lead at <a href = '".DIR.'lead-single-listing.php?lid='.$_POST['ref']."'>thebizroot site</a>.</p>
  <p>lead Name ".$row['leadName']."</p>
  <p>lead refral send by ".$row1['clientName']."</p>
  <p>Regards Site Admin</p>";

  $mail = new Mail();
  $mail->setFrom(SITEEMAIL1);
  $mail->addAddress($to);
  $mail->subject($subject);
  $mail->body($body);
  $mail->send();

  //redirect to index page
  header('Location: client-dashboard.php');
}


?>
