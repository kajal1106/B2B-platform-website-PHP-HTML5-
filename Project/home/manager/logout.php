<?php require('includes/config.php');

//logout
$user->logout();

//logged in return to index page
$a = $_SERVER['HTTP_REFERER'];
header('Location: '.$a);
exit;
?>
