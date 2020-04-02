<?php
$err ="";
 require('includes/config.php');



//if form has been submitted process it

	

$opt=$_POST["opt"];

if($opt=="business")
{

	//email validation
	if(!filter_var($_POST['vemail'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} else {
		$stmt = $db->prepare('SELECT businessEmail FROM business WHERE businessEmail = :email');
		$stmt->execute(array(':email' => $_POST['vemail']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
             

		if(empty($row['businessEmail'])){
			$error[] = 'Email provided is not on recognised.';
			$err = 'Email provided is not on recognised.';
		}

	}
	
	//if no errors have been created carry on
	if(!isset($error)){

		//create the activasion code
		$token = md5(uniqid(rand(),true));

		try {

			$stmt = $db->prepare("UPDATE business SET resetToken = :token, resetComplete='No' WHERE businessEmail = :email");
			$stmt->execute(array(
				':email' => $row['businessEmail'],
				':token' => $token
				
			));

			//send email
			$to = $row['businessEmail'];
			$subject = "Password Reset";
			$body = "<p>Someone requested that the password be reset.</p>
			<p>If this was a mistake, just ignore this email and nothing will happen.</p>
			<p>To reset your password, visit the following address: <a href='".DIR."businessreset.php?key=$token'>".DIR."businessreset.php?key=$token</a></p>";

			$mail = new Mail();
			$mail->setFrom(thebizroot);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			//redirect to index page
			

		//else catch the exception and show the error.
			$err = 'Link to generate your new password has been sent to your registered email address.';
		
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}
}else if($opt=="client")
{
	//email validation
	if(!filter_var($_POST['vemail'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} else {
		$stmt = $db->prepare('SELECT clientEmail FROM client WHERE clientEmail = :email');
		$stmt->execute(array(':email' => $_POST['vemail']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(empty($row['clientEmail'])){
			$error[] = 'Email provided is not on recognised.';
			$err = 'Email provided is not on recognised.';
		}

	}
	
		/**********************************************************************************************************/
	
	
	//if no errors have been created carry on
	if(!isset($error)){

		//create the activasion code
		$token = md5(uniqid(rand(),true));

		try {

	
		if($opt=="client"){
			$stmt = $db->prepare("UPDATE client SET resetToken = :token, resetComplete='No' WHERE clientEmail = :email");
			$stmt->execute(array(
				':email' => $row['clientEmail'],
				':token' => $token
			));

			//send email
			$to = $row['clientEmail'];
			$subject = "Password Reset";
			$body = "<p>Someone requested that the password be reset.</p>
			<p>If this was a mistake, just ignore this email and nothing will happen.</p>
			<p>To reset your password, visit the following address: <a href='".DIR."clientreset.php?key=$token'>".DIR."clientreset.php?key=$token</a></p>";

			$mail = new Mail();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();
			$err = 'Link to generate your new password has been sent to your registered email address.';
			
			//redirect to index page

		//else catch the exception and show the error.
		
		}

		
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}
	
}else
{
	$err = 'user not selected.';
	
}
?>


	<lable><?php echo $err;?></lable>