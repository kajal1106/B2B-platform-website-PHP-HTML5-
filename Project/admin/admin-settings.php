<?php
  include('includes/config.php');
  if( !$user->is_logged_in() ){ header('Location: index.php'); }
?>
<?php

    if(isset($_POST['submit'])){

      //$error;
      if(strlen($_POST['curpass']) < 3){
    		$error[] = 'a';
    	}

      if(strlen($_POST['newpass']) < 3){
    		$error[] = 'b';
    	}

    	if(strlen($_POST['repass']) < 3){
    		$error[] = 'c';
    	}

    	if($_POST['newpass'] != $_POST['repass']){
    		$error[] = 'd';
    	}
      $stmt = $db->prepare('SELECT password FROM admin WHERE username = :username');
      $stmt->execute(array(':username' => $_SESSION['admin']));
      $row = $stmt->fetch(PDO::FETCH_ASSOC);


      if(!isset($error)){

    		//hash the password




        //$row = $user->get_user_hash($_SESSION['businessEmail']);

    		if($user->password_verify($_POST['curpass'],$row['password']) == 1)
        {
          $newpassword = $user->password_hash($_POST['newpass'], PASSWORD_BCRYPT);
          $stmt = $db->prepare('update admin set password = :password  WHERE username = :username');
      		$stmt->execute(array(':username' => $_SESSION['admin'],
                          ':password' => $newpassword
                        ));
          header('Location: admin-settings.php?action=success');
        }
        else {

            header('Location: admin-settings.php?action=e');

        }

      }
      else {
        $err =  $error[0];
        header('Location: admin-settings.php?action='.$err);
      }
    }
?>

<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Admin</title>
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

        <!-- Load a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="js/vendor/modernizr-respond.min.js"></script>
    </head>

    <!-- Add the class .fixed to <body> for a fixed layout on large resolutions (min: 1200px) -->
    <!-- <body class="fixed"> -->
    <body>
             <!-- Page Container -->




                 <!-- Primary Navigation -->

                   <?php include('inc/nav.php'); ?>

                   <?php
             						if(isset($_GET['action']))
             						{
             							if($_GET['action']=='success')
             							{
             								echo "<script type='text/javascript'>alert('password Changed successfully..');</script>";
             							}
                          if($_GET['action']=='a')
             							{
             								echo "<script type='text/javascript'>alert('current Password is too short.');</script>";
             							}
                          if($_GET['action']=='b')
             							{
             								echo "<script type='text/javascript'>alert('Password is too short.');</script>";
             							}
                          if($_GET['action']=='c')
             							{
             								echo "<script type='text/javascript'>alert('Confirm Password is too short.');</script>";
             							}
                          if($_GET['action']=='d')
             							{
             								echo "<script type='text/javascript'>alert('Passwords do not match.');</script>";
             							}
                          if($_GET['action']=='e')
             							{
             								echo "<script type='text/javascript'>alert('Wrong Current Password');</script>";
             							}
             						}

             			?>


        <div id="page-container">
            <!-- Header -->
            <!-- Add the class .navbar-fixed-top or .navbar-fixed-bottom for a fixed header on top or bottom respectively -->
            <!-- <header class="navbar navbar-inverse navbar-fixed-top"> -->
            <!-- <header class="navbar navbar-inverse navbar-fixed-bottom"> -->
            <header class="navbar navbar-inverse">
                <!-- Mobile Navigation, Shows up  on smaller screens -->
                <ul class="navbar-nav-custom pull-right hidden-md hidden-lg">
                    <li class="divider-vertical"></li>
                    <li>
                        <!-- It is set to open and close the main navigation on smaller screens. The class .navbar-main-collapse was added to aside#page-sidebar -->
                        <a href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-main-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>
                <!-- END Mobile Navigation -->

                <!-- Logo -->
               <?php include('inc/header.php'); ?>
                <!-- END Header Widgets -->
            </header>
            <!-- END Header -->

            <!-- Inner Container -->
            <div id="inner-container">
                <!-- Sidebar -->

                <!-- END Sidebar -->

                <!-- Page Content -->
                <div id="page-content">
                    <!-- Navigation info -->
                    <ul id="nav-info" class="clearfix">
                        <li><a href="index.php"><i class="fa fa-home"></i></a></li>

                        <li class="active"><a href="admin-settings.php">Admin Settings</a></li>
                    </ul>
                    <!-- END Navigation info -->
                    <!-- <div class="col-sm-offset-1 col-sm-10">
                      <div class="form-group">
                  <label class="control-label col-md-2" for="example-select">Select Industry</label>
                  <div class="col-sm-8">
                      <select id="example-select" name="example-select" class="form-control">
                          <option>html</option>
                          <option>css</option>
                          <option>javascript</option>
                          <option>php</option>
                          <option>mysql</option>
                      </select>
                  </div>
              </div> <br>
              <div class="form-group">
          <label class="control-label col-md-2" for="example-select">Select Industry</label>
          <div class="col-sm-8">
              <input type="text" class="col-md-6" id="example-input-prepend2" name="example-input-prepend2" class="form-control" placeholder="Enter Industry Name">
          </div>
      </div>
              <div class="form-group">
<label class="control-label col-md-">Industry Name</label>
<input type="text" class="col-md-6" id="example-input-prepend2" name="example-input-prepend2" class="form-control" placeholder="Enter Industry Name">
</div>
<input type="submit" class="btn btn-success col-sm-offset-5" style="margin-top:2%;" name="Add" value="Add Industry">
                    </div> -->

                    <div class="">
                      <div class="row">

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" style="background-color:#e9e9e9;padding:5%;">
                          <h3 style="margin-top:-2%;text-align:center;">Admin Settings</h3>
                          <form class="form-horizontal" action = "admin-settings.php" method="POST" >
                          <div class="form-group">
                      <label for="passwordInputHor" class="col-sm-3 control-label">Old Password </label>
                      <div class="col-sm-9">
                        <input id="passwordInputHor" name="curpass"type="password" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                  <label for="passwordInputHor" class="col-sm-3 control-label">New Password </label>
                  <div class="col-sm-9">
                    <input id="passwordInputHor" name ="newpass" type="password" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                      <label for="passwordInputHor" class="col-sm-3 control-label">Confirm Password </label>
                      <div class="col-sm-9">
                        <input id="passwordInputHor" name="repass" type="password" class="form-control">
                      </div>
                    </div>
                          <input type="submit" class="btn btn-success col-sm-offset-5" style="margin-top:3%;" name="submit" value="Change Password">
                        </form>
                        </div>
                      </div>
                    </div>
                    <!-- Nav Dash -->
                  </div>
                 <?php include('inc/footer.php'); ?>
                </div>
              </div>
        <!-- Excanvas for canvas support on IE8 -->
        <!--[if lte IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

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
                // Initialize dash Datatables
                $('#dash-example-orders').dataTable({
                    columnDefs: [{orderable: false, targets: [0]}],
                    pageLength: 6,
                    lengthMenu: [[6, 10, 30, -1], [6, 10, 30, "All"]]
                });
                $('.dataTables_filter input').attr('placeholder', 'Search');

                // Dash example stats
                var dashChart = $('#dash-example-stats');

                var dashChartData1 = [
                    [0, 200],
                    [1, 250],
                    [2, 360],
                    [3, 584],
                    [4, 1250],
                    [5, 1100],
                    [6, 1500],
                    [7, 1521],
                    [8, 1600],
                    [9, 1658],
                    [10, 1623],
                    [11, 1900],
                    [12, 2100],
                    [13, 1700],
                    [14, 1620],
                    [15, 1820],
                    [16, 1950],
                    [17, 2220],
                    [18, 1951],
                    [19, 2152],
                    [20, 2300],
                    [21, 2325],
                    [22, 2200],
                    [23, 2156],
                    [24, 2350],
                    [25, 2420],
                    [26, 2480],
                    [27, 2320],
                    [28, 2380],
                    [29, 2520],
                    [30, 2590]
                ];
                var dashChartData2 = [
                    [0, 50],
                    [1, 180],
                    [2, 200],
                    [3, 350],
                    [4, 700],
                    [5, 650],
                    [6, 700],
                    [7, 780],
                    [8, 820],
                    [9, 880],
                    [10, 1200],
                    [11, 1250],
                    [12, 1500],
                    [13, 1195],
                    [14, 1300],
                    [15, 1350],
                    [16, 1460],
                    [17, 1680],
                    [18, 1368],
                    [19, 1589],
                    [20, 1780],
                    [21, 2100],
                    [22, 1962],
                    [23, 1952],
                    [24, 2110],
                    [25, 2260],
                    [26, 2298],
                    [27, 1985],
                    [28, 2252],
                    [29, 2300],
                    [30, 2450]
                ];

                // Initialize Chart
                $.plot(dashChart, [
                    {data: dashChartData1, lines: {show: true, fill: true, fillColor: {colors: [{opacity: 0.05}, {opacity: 0.05}]}}, points: {show: true}, label: 'All Visits'},
                    {data: dashChartData2, lines: {show: true, fill: true, fillColor: {colors: [{opacity: 0.05}, {opacity: 0.05}]}}, points: {show: true}, label: 'Unique Visits'}],
                    {
                        legend: {
                            position: 'nw',
                            backgroundColor: '#f6f6f6',
                            backgroundOpacity: 0.8
                        },
                        colors: ['#555555', '#db4a39'],
                        grid: {
                            borderColor: '#cccccc',
                            color: '#999999',
                            labelMargin: 5,
                            hoverable: true,
                            clickable: true
                        },
                        yaxis: {
                            ticks: 5
                        },
                        xaxis: {
                            tickSize: 2
                        }
                    }
                );

                // Create and bind tooltip
                var previousPoint = null;
                dashChart.bind("plothover", function (event, pos, item) {

                    if (item) {
                        if (previousPoint !== item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0],
                                y = item.datapoint[1];

                            $('<div id="tooltip" class="chart-tooltip"><strong>' + y + '</strong> visits</div>')
                                .css({top: item.pageY - 30, left: item.pageX + 5})
                                .appendTo("body")
                                .show();
                        }
                    }
                    else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });
            });
        </script>
    </body>
</html>
