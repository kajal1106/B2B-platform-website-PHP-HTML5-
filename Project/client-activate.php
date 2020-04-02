<?php
require('includes/config.php');
include('includes/classes/phpmailer/mailacoounts.php');

//collect values from the url
$memberID = trim($_GET['x']);
$active = trim($_GET['y']);

//if id is number and the active token is not empty carry on
if(is_numeric($memberID) && !empty($active)){

	//update users record set the active column to Yes where the memberID and active value match the ones provided in the array
	$stmt = $db->prepare("UPDATE client SET isActive = 'Yes' WHERE clientID = :clientID AND isActive = :active");
	$stmt->execute(array(
		':clientID' => $memberID,
		':active' => $active

	));

	$stmt = $db->prepare("SELECT clientEmail from client WHERE clientID = :clientID");
	$stmt->execute(array(':clientID' => $memberID));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$to = $row['clientEmail'];
	$subject = "Registration Successful";
	$body = "<p>Thank you for registering at Blender site.</p>
	<p></p>
	<p>Regards Site Admin</p>";

	$mail = new Mail();
			$mail->setFrom(Blender);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();
	//if the row was updated redirect the user
	if($stmt->rowCount() == 1){
		//require('includes/config.php');
		//redirect to login page
		header('Location: index.php?action=active');
		exit;

	} else {
		echo "Your account could not be activated.";
	}

}
?>
