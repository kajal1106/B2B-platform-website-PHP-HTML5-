<?php
require_once('config.php');

//if( $user->is_logged_in() ){ header('Location: dashboard.php'); }


if(isset($_POST['submit'])){
	if(isset($_POST['optradio']))
	{
		if($_POST['optradio']=="business")
		{
			$username = $_POST['username'];
			$password = $_POST['password'];

			if($user->login($username,$password))
			{
				$_SESSION['businessEmail'] = $username;
				$a = $_SERVER['HTTP_REFERER'];
				header('Location:'.$a);
				exit;

			} else {
				$a = $_SERVER['HTTP_REFERER'];
				header('Location: '.$a.'?action=error');
				exit;
			}
		}else if($_POST['optradio']=="client") {
			$username = $_POST['username'];
			$password = $_POST['password'];

			if($user->clientlogin($username,$password)){
				$_SESSION['clientEmail'] = $username;
				$a = $_SERVER['HTTP_REFERER'];
				header('Location:'.$a);
				exit;

			} else {
				$a = $_SERVER['HTTP_REFERER'];
				header('Location: '.$a.'?action=error');
				exit;
			}
		}

	}else {
		$a = $_SERVER['HTTP_REFERER'];
		header('Location: '.$a.'?action=not');
		exit;
	}


}//end if submit

?>
