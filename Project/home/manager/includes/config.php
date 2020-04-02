<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Asia/Kolkata');

//database credentials
define('DBHOST','localhost');
define('DBUSER','thebio7j_bizroot');
define('DBPASS','Bizroot@123');
define('DBNAME','thebio7j_bizroot');

//application address
define('DIR','http://www.thebizroot.com/');
define('SITEEMAIL','jeetpatel@citryxsolutions.in');
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
include('classes/user.php');
include('classes/phpmailer/mail.php');
$user = new User($db);
?>
