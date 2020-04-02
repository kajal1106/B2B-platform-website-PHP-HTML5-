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
      $stmt = $db->prepare('SELECT businessPassword FROM business WHERE businessEmail = :businessEmail');
      $stmt->execute(array(':businessEmail' => $_SESSION['businessEmail']));
      $row = $stmt->fetch(PDO::FETCH_ASSOC);


      if(!isset($error)){

    		//hash the password




        //$row = $user->get_user_hash($_SESSION['businessEmail']);

    		if($user->password_verify($_POST['curpass'],$row['businessPassword']) == 1)
        {
          $newpassword = $user->password_hash($_POST['newpass'], PASSWORD_BCRYPT);
          $stmt = $db->prepare('update  business set businessPassword = :businessPassword  WHERE businessEmail = :businessEmail');
      		$stmt->execute(array(':businessEmail' => $_SESSION['businessEmail'],
                          ':businessPassword' => $newpassword
                        ));
          header('Location: ../business-dashboard.php?action=success');
        }else
        {
          $error[] = 'Wrong Current Password';
        }
      }
      else {
        $err =  $error[0];
        header('Location: ../business-dashboard.php?action='.$err);
      }
    }
?>
