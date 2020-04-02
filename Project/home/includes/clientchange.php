<?php
    require_once('config.php');

    if(isset($_POST['submit'])){

      //$error;
      if(strlen($_POST['curpass']) < 3){
    		$error[] = 'current Password is too short.';
    	}

      if(strlen($_POST['newpass']) < 3){
    		$error[] = 'Password is too short.';
    	}

    	if(strlen($_POST['repass']) < 3){
    		$error[] = 'Confirm password is too short.';
    	}

    	if($_POST['newpass'] != $_POST['repass']){
    		$error[] = 'Passwords do not match.';
    	}
      $stmt = $db->prepare('SELECT clientPassword FROM client WHERE clientEmail = :clientEmail');
      $stmt->execute(array(':clientEmail' => $_SESSION['clientEmail']));
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if($user->password_verify($_POST['curpass'],$row['clientPassword']) == 0)
      {
        $error[] = 'Wrong Current Password';
      }

      if(!isset($error)){

    		//hash the password

        //$row = $user->get_user_hash($_SESSION['businessEmail']);

    		if($user->password_verify($_POST['curpass'],$row['clientPassword']) == 1)
        {
          $newpassword = $user->password_hash($_POST['newpass'], PASSWORD_BCRYPT);
          $stmt = $db->prepare('update client set clientPassword = :clientPassword  WHERE clientEmail = :clientEmail');
      		$stmt->execute(array(':clientEmail' => $_SESSION['clientEmail'],
                          ':clientPassword' => $newpassword
                        ));
          header('Location: ../client-dashboard.php?action=success');
        }else {
          $err =  'Wrong Current Password';
          header('Location: ../client-dashboard.php?action='.$err);
        }

      }else {
        $err =  $error[0];
        header('Location: ../client-dashboard.php?action='.$err);
      }
    }
?>
