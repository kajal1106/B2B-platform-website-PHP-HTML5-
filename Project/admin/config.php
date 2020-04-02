<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Asia/Kolkata');

//database credentials
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','project');

//application address
define('DIR','https://localhost/home/');
define('SITEEMAIL','singh.kajal940@gmail.com');
try {

	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include('includes/classes/user.php');
include('phpmailer/mail.php');
$user = new User($db);
?>
