<?php
  include('includes/config.php');
  if( !$user->is_logged_in() ){ header('Location: index.php'); }

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>TheBizroot - Professional, Responsive and Flat Admin Template</title>

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
        <style media="screen">
        .loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
        </style>
        <!-- Load a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="js/vendor/modernizr-respond.min.js"></script>
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    </head>

    <!-- Add the class .fixed to <body> for a fixed layout on large resolutions (min: 1200px) -->
    <!-- <body class="fixed"> -->
    <body>
             <!-- Page Container -->




                 <!-- Primary Navigation -->

                   <?php include('inc/nav.php'); ?>




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
                      <li><a href="">Users</a></li>
                      <li class="active"><a href="user_client.php">Client</a></li>
                    </ul>
                    <!-- END Navigation info -->


                    <!-- END Nav Dash -->

                    <!-- Tiles -->
                    <!-- Row 1 -->

                    <div class="col-sm-offset-1 col-sm-10">
                        <!-- Datatables Tile -->
                        <div class="dash-tile dash-tile-2x">
                            <div class="dash-tile-header">
                                <div class="dash-tile-options">

                                </div>
                                Client
                            </div>
                            <div class="dash-tile-content">
                                <div class="dash-tile-content-inner-fluid">
                                    <table id="dash-example-orders" class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                              <th>Sr no.</th>
                                              <th >Name</th>
                                              <th>Email</th>
                                              <th>Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                                $active ='Yes';
                                                $i=1;
                                                $stmt = $db->prepare("SELECT client.clientId, client.clientEmail, clientcontactinformation.clientName from client
                                                                      LEFT JOIN clientcontactinformation ON client.clientID = clientcontactinformation.clientID where isActive = :active");
                                                $stmt->bindParam(':active', $active, PDO::PARAM_STR);
                                                $stmt->execute();
                                                while($row = $stmt->fetch(PDO::FETCH_GROUP))
                                                {
                                          ?>
                                            <tr>
                                                <td ><?php echo $i;?></td>
                                                <td><?php echo $row[2];?></td>
                                                <td ><?php echo $row[1];?></td>
                                                <td class="text-center">
                                                    <div class="btn-group">

                                                        <button  title="View" class="btn btn-xs btn-success viewc" id="<?php echo $row[0];?>" data-toggle="modal" data-target="#view_client"><i class="fa fa-pencil"></i></button>
                                                        <!-- <a href="javascript:void(0)" data-toggle="tooltip" title="Feature" class="btn btn-xs btn-danger" ><i class="fa fa-times"></i></a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++;
                                          } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END Datatables Tile -->
                    </div>
                    <!-- END Row 1 -->

                    <!-- Row 2 -->
                    <!-- END Row 3 -->
                    <!-- END Tiles -->
                </div>
                <!-- END Page Content -->

                <!-- Footer -->
              <?php include('inc/footer.php'); ?>
                <!-- END Footer -->
            </div>
            <!-- END Inner Container -->


            <!-- Modal -->
<div class="modal fade" id="view_client" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Client Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body viewclientt">
        <div class="loader" id="loader"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning editclient">Edit</button>
        <button type="button" class="btn btn-primary saveclient" data-dismiss="modal" disabled>Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
        </div>
        <!-- END Page Container -->

        <!-- Scroll to top link, check main.js - scrollToTop() -->
        <a href="javascript:void(0)" id="to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- User Modal Settings, appears when clicking on 'User Settings' link found on user dropdown menu (header, top right) -->

        <!-- END User Modal Settings -->

        <!-- Excanvas for canvas support on IE8 -->
        <!--[if lte IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js -->
        <script src="js/vendor/bootstrap.min.js"></script>

        <!-- Jquery plugins and custom javascript code -->
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/user_clients.js"></script>

        <!-- Javascript code only for this page -->

    </body>
</html>
