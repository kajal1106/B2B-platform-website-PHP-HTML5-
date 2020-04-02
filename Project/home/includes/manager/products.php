<?php
  include('includes/config.php');
  if( !$user->is_logged_in() ){ header('Location: index.php'); }

?>

<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>TheBizroot</title>

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

        <!-- Load a specific file here from css/themes/ folder to alter the default theme of the template -->
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
                        <li class="active"><a href="products.php">Products</a></li>
                    </ul>
                    <!-- END Navigation info -->
                    <div class="container">
                      <div class="row">


                    <div class=" col-sm-11">
                        <!-- Datatables Tile -->
                        <div class="dash-tile dash-tile-2x">
                            <div class="dash-tile-header">

                                Products
                            </div>
                            <div class="dash-tile-content">
                                <div class="dash-tile-content-inner-fluid">
                                    <table id="dash-example-orders" class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                              <th>Sr no.</th>
                                              <th>Product Image</th>
                                              <th >Product Name</th>
                                              <th>Product Company</th>
                                              <th>Product Industry</th>
                                              <th>Product Sub-Industry</th>
                                            <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          $i=1;
                                          $stmtfetch = $db->prepare('SELECT porductinformation.productID, porductinformation.productName, productimage.imagePath, industrylist.industryName,porductinformation.businessID, businesscontactinformation.businessName,industrysublist.subindustryName, porductinformation.productOffer FROM porductinformation
                                          	LEFT JOIN productimage ON porductinformation.productID = productimage.productID
                                          	LEFT JOIN industrysubtype ON porductinformation.businessID = industrysubtype.businessID
                                          	LEFT JOIN industrylist ON industrylist.industryID = (select industryID from industrysubtype where porductinformation.businessID = industrysubtype.businessID)
                                            LEFT JOIN industrysublist ON industrysublist.IndustrySublistID = (select IndustrySublistID from industrysubtype where porductinformation.businessID = industrysubtype.businessID)
                                          	LEFT JOIN businesscontactinformation ON porductinformation.businessID = businesscontactinformation.businessID
                                          	group by productID;');
                                          $stmtfetch->execute();
                                          while($row = $stmtfetch->fetch(PDO::FETCH_GROUP))
                                          			{?>
                                            <tr>

                                                <td ><?php echo $i;?></td>
                                                <td> <div class="thumbnails-options">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-primary"><i class="fa fa-cloud-download"></i></button>
                                    <button class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="thumbnail"><img class="img-box" src="<?php echo DIR.$row[2];?>" alt="fakeimg"></a></td>
                                                <td ><?php echo $row[1];?></td>
                                                <td><?php echo $row[5];?></td>
                                                <td><?php echo $row[3];?></td>
                                                <td><?php echo $row[6];?></td>
                                                  <td class="text-center">
                                                    <div class="btn-group">

                                                        <button  title="View" class="btn btn-xs btn-success viewpro" id="<?php  echo $row[0]; ?>" data-toggle="modal" data-target="#edit_product"><i class="fa fa-pencil"></i></button>
                                                        <!-- <a href="javascript:void(0)" title="Feature" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++; }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END Datatables Tile -->
                    </div>

                  </div>
                </div>

             <!-- Modal -->
<div class="modal fade" id="edit_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body viewproduct">
          <div class="loader" id="loader"></div>


      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>

                    <!-- Nav Dash -->
                  </div>
                 <?php include('inc/footer.php'); ?>
                </div>
              </div>
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
        <script src="js/products.js"></script>
        <!-- Javascript code only for this page -->

    </body>
</html>
