<?php
require_once('includes/config.php');

if( $user->is_logged_in() ){ header('Location: dashboard.php'); }


if(isset($_POST['submit'])){

			$username = $_POST['username'];
			$password = $_POST['password'];

			if($user->login($username,$password))
			{
				$_SESSION['manager'] = $username;
				header('Location: dashboard.php');
				exit;

			} else {
				header('Location: index.php?action=error');
				exit;
			}
}//end if submit

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>The Bizroot</title>

        <meta name="description" content="uAdmin is a Professional, Responsive and Flat Admin Template created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width,initial-scale=1">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="css/bootstrap.css">

        <!-- Related styles of various javascript plugins -->
        <link rel="stylesheet" href="css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="css/main.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="js/vendor/modernizr-respond.min.js"></script>
    </head>
    <body class="login">
			<?php
					 if(isset($_GET['action']))
					 {
						 if($_GET['action']=='error')
						 {
							 echo "<script type='text/javascript'>alert('Wrong Username and Password..');</script>";
						 }
					 }
					 ?>
        <!-- Login Container -->
        <div id="login-container">
            <div id="login-logo">
                <a href="">
                    <img src="../images/logo.png" alt="logo">
                </a>
            </div>

            <!-- Login Buttons -->
            <div id="login-buttons">
                <h5 class="page-header-sub"> </h5>

                <button id="login-btn-email" class="btn btn-default">Are You Manager ?</button>
            </div>
            <!-- END Login Buttons -->

            <!-- Login Form -->
            <form id="login-form" action="index.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <a href="javascript:void(0)" class="login-back"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="input-group">
                            <input type="text" id="login-email" name="username" placeholder="Username.." class="form-control">
                            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="input-group">
                            <input type="password" id="login-password" name="password" placeholder="Password.." class="form-control">
                            <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="btn-group btn-group-sm pull-right">
 <button type="button" id="login-button-pass" class="btn btn-warning" title="Forgot pass?" data-toggle="modal" data-target="#forgotpassword"><i class="fa fa-lock"></i></button>
                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-arrow-right"></i> Login</button>
                    </div>

                </div>
            </form>
            <!-- END Login Form -->




        </div>


        <!-- Modal -->
<div class="modal fade" id="forgotpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recover Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form action="reset.php" method = "POST">
      <div class="modal-body">
        <input placeholder="Your Recovery Mail " class="form-control" name = "vemail" type="email" data-error="Bruh, that email address is invalid" required/ >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Send</button>
      </div>
		</from>
    </div>
  </div>
</div>
        <!-- END Login Container -->

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js -->
        <script src="js/vendor/bootstrap.min.js"></script>

        <!-- Jquery plugins and custom javascript code -->
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Javascript code only for this page -->
        <script>
            $(function () {
                var loginButtons = $('#login-buttons');
                var loginForm = $('#login-form');

                // Reveal login form
                $('#login-btn-email').click(function () {
                    loginButtons.slideUp(600);
                    loginForm.slideDown(450);
                });

                // Hide login form
                $('.login-back').click(function () {
                    loginForm.slideUp(450);
                    loginButtons.slideDown(600);
                });
            });
        </script>
    </body>
</html>
