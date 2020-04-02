<?php
include('includes/config.php');
if(isset($_POST['submit'])){

 $stmt = $db->prepare('select username from manager where username = :username');
    $stmt->execute(array(':username' => $_POST['username'] ));
    if(!$r1= $stmt->fetch(PDO::FETCH_ASSOC))
    {
  $hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);
  $stmt = $db->prepare('INSERT INTO manager (username,password,email) VALUES (:username,:password,:email)');
  $stmt->execute(array(':username' => $_POST['username'], ':password' => $hashedpassword,':email' => $_POST['emailid'] ));
  echo "<script type='text/javascript'>alert('EDITOR added successfully..');</script>";

   header('Location: editor-settings.php?action=success');
    }else
    {	
    
    header('Location: editor-settings.php?action=error');
    }
  try {
  }catch(PDOException $e) {
      $error[] = $e->getMessage();
      echo $e->getMessage();
  }
}
?>
