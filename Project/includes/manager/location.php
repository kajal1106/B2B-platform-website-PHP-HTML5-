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
                        <li class="active"><a href="location.php">Location Management</a></li>
                    </ul>
                    <!-- END Navigation info -->
                    <div class="col-sm-offset-1 col-sm-10">
                        <!-- Users Tile -->
                        <div class="dash-tile dash-tile-2x remove-margin">
                            <div class="dash-tile-header">
                                 Location Management
                            </div>
                            <div class="dash-tile-content">
                                <div class="dash-tile-content-inner-fluid">
                                    <!-- Users tabs links -->
                                    <ul id="dash-example-tabs" class="nav nav-tabs" data-toggle="tabs">
                                        <li class="active"><a href="#dash-example-tabs-admin">Country</a></li>
                                        <li><a href="#dash-example-tabs-mods">State</a></li>
                                        <li><a href="#dash-example-tabs-newusers">City</a></li>
                                    </ul>
                                    <!-- END Users tabs links -->

                                    <!-- User tabs content -->
                                    <div class="tab-content">
                                        <!-- Admins Tab -->
                                        <div class="tab-pane active" id="dash-example-tabs-admin">

                                              <!-- Datatables Tile -->
                                              <div class="dash-tile dash-tile-2x">
                                                  <!-- <div class="dash-tile-header">

                                                   Countries

                                                      <button type="button" data-toggle="modal" data-target="#addcountry" class="btn col-sm-offset-8 btn-success">Add Country</button>




                                                  </div> -->
                                                  <div class="dash-tile-content">
                                                      <div class="dash-tile-content-inner-fluid">
                                                        <table id="dash-example-orders" class="table table-striped table-bordered table-condensed">
                                                            <thead>
                                                                <tr>
                                                                  <th>Sr no.</th>
                                                                  <th >Country Name</th>
                                                                  <th>Flag</th>
                                                                  <th>No OF Business</th>
                                                                    <!-- <th>Action</th> -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                              <?php
                                                              $i=1;
                                                              $q = $db->prepare("SELECT * FROM country");
                                                              $q->execute();

                                                              while($r = $q->fetch(PDO::FETCH_ASSOC))
                                                              {
                                                              ?>
                                                                <tr>

                                                                    <td ><?php echo $i;?></td>
                                                                    <td><?php echo $r['countryName']?></td>
                                                                    <td > <a  class="thumbnail"><img src="<?php echo DIR.$r['countryFlag']?>" alt="fakeimg"></a></td>
                                                                    <td>
                                                                      <?php
                                                                      $q1 = $db->prepare("SELECT count(businessaddress.businessID) FROM businessaddress
                                                                      LEFT JOIN business ON business.businessID = businessaddress.businessID
                                                                       where countryID = :countryID and business.isActive = :active");
                                                                      $q1->execute(array(':countryID' => $r['countryID'], ':active' => 'Yes' ));
                                                                      $r1 = $q1->fetch(PDO::FETCH_GROUP);
                                                                      echo $r1[0];

                                                                    $i++;  ?>
                                                                    </td>

                                                                     <!-- <td class="text-center">
                                                                    <div class="btn-group">
                                                                      <button title="View" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>
                                                                      </div>
                                                                </td> -->
                                                                </tr>
                                                              <?php } ?>

                                                            </tbody>
                                                        </table>
                                                      </div>
                                                  </div>
                                              </div>
                                              <!-- END Datatables Tile -->

                                        </div>
                                        <!-- END Admins Tab -->

                                        <!-- Mods Tab -->
                                        <div class="tab-pane" id="dash-example-tabs-mods">
                                          <div class="dash-tile dash-tile-2x">
                                              <!-- <div class="dash-tile-header">

                                                 State
                                                    <button type="button" data-toggle="modal" data-target="#addstate" class="btn col-sm-offset-8 btn-success">Add State</button>
                                              </div> -->
                                              <div class="dash-tile-content">
                                                  <div class="dash-tile-content-inner-fluid">
                                                    <table id="dash-example-orders" class="table table-striped table-bordered table-condensed">
                                                        <thead>

                                                            <tr>
                                                              <th>Sr no.</th>
                                                              <th >State Name</th>
                                                              <th >Country Name</th>
                                                              <!-- <th>Action</th> -->
                                                              <th>NO Of Business</th>
                                                            </tr>

                                                        </thead>
                                                        <tbody>
                                                          <?php
                                                        //  require('includes/config.php');
                                                          $i=1;
                                                          $q = $db->prepare("SELECT * FROM state");
                                                          $q->execute();
                                                          while($r = $q->fetch(PDO::FETCH_ASSOC))
                                                          {?>
                                                            <?php
                                                            $q1 = $db->prepare("SELECT countryName FROM country where countryID =:countryID");
                                                            $q1->execute(array(':countryID' => $r['countryID']));
                                                            $r1 = $q1->fetch(PDO::FETCH_ASSOC);
                                                            //echo $r1['countryName'];
                                                            ?>
                                                            <tr>
                                                                <td ><?php echo $i;?></td>
                                                                <td ><?php echo $r['stateName'];?></td>
                                                                <td ><?php echo $r1['countryName']?></td>
                                                                <!-- <td class="text-center">
                                                                     <div class="btn-group">
                                                                      <button  title="View" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>
                                                                      </div>
                                                                </td> -->
                                                                <td>
                                                                  <?php
                                                                  $q1 = $db->prepare("SELECT count(businessaddress.businessID) FROM businessaddress
                                                                  LEFT JOIN business ON business.businessID = businessaddress.businessID
                                                                   where stateId = :countryID and business.isActive = :active");
                                                                  $q1->execute(array(':countryID' => $r['stateID'], ':active' => 'Yes' ));
                                                                  $r1 = $q1->fetch(PDO::FETCH_GROUP);
                                                                  echo $r1[0];

                                                                $i++;  ?>
                                                                </td>
                                                            </tr>
                                                            <?php $i++; } ?>
                                                        </tbody>
                                                    </table>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                        <!-- END Mods Tab -->

                                        <!-- New Users Tab -->
                                        <div class="tab-pane" id="dash-example-tabs-newusers">


                                             <div class="dash-tile dash-tile-2x">
                                              <!-- <div class="dash-tile-header">

                                                 City
                                                    <button type="button" data-toggle="modal" data-target="#addcity" class="btn col-sm-offset-8 btn-success">Add City</button>
                                              </div> -->
                                              <div class="dash-tile-content">
                                                  <div class="dash-tile-content-inner-fluid">
                                                    <table id="dash-example-orders" class="table table-striped table-bordered table-condensed">
                                                        <thead>
                                                            <tr>
                                                              <th>Sr no.</th>
                                                              <th >City Name</th>
                                                              <th >State Name</th>
                                                              <th >Country Name</th>
                                                              <th>NO Of Business</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                          <?php
                                                        //  require('includes/config.php');
                                                          $i=1;
                                                          $q = $db->prepare("SELECT * FROM city");
                                                          $q->execute();
                                                          while($r = $q->fetch(PDO::FETCH_ASSOC))
                                                          {?>
                                                            <tr>

                                                                <td ><?php echo $i;?></td>
                                                                <td ><?php echo $r['cityName'];?></td>
                                                                <?php
                                                              //  require('includes/config.php');
                                                                $i=1;
                                                                $q2 = $db->prepare("SELECT * FROM state where stateID =:stateID");
                                                                $q2->execute(array(':stateID' => $r['stateID']));
                                                                $r2 = $q2->fetch(PDO::FETCH_ASSOC)
                                                                ?>
                                                                  <?php
                                                                  $q1 = $db->prepare("SELECT countryName FROM country where countryID =:countryID");
                                                                  $q1->execute(array(':countryID' => $r2['countryID']));
                                                                  $r1 = $q1->fetch(PDO::FETCH_ASSOC);
                                                                  //echo $r1['countryName'];
                                                                  ?>
                                                                <td ><?php echo $r2['stateName']?></td>
                                                                 <td ><?php echo $r1['countryName']?></td>
                                                                <!-- <td class="text-center">
                                                                    <div class="btn-group">
                                                                      <button title="View" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>
                                                                      </div>
                                                                </td> -->
                                                                <td>
                                                                  <?php
                                                                  $q1 = $db->prepare("SELECT count(businessaddress.businessID) FROM businessaddress
                                                                  LEFT JOIN business ON business.businessID = businessaddress.businessID
                                                                   where cityID = :countryID and business.isActive = :active");
                                                                  $q1->execute(array(':countryID' => $r['cityID'], ':active' => 'Yes' ));
                                                                  $r1 = $q1->fetch(PDO::FETCH_GROUP);
                                                                  echo $r1[0];

                                                                $i++;  ?>
                                                                </td>
                                                            </tr>
                                                          <?php $i++;} ?>
                                                        </tbody>
                                                    </table>
                                                  </div>
                                              </div>
                                          </div>

                                        </div>
                                        <!-- END New Users Tab -->
                                    </div>
                                    <!-- END User tabs content -->
                                </div>
                            </div>
                        </div>
                        <!-- END Users Tile -->




                        <!--Add Country Modal -->
<div class="modal fade" id="addcountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Country Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
            <div class="col-md-10 col-md-offset-1">


                <input type="text" placeholder="Enter Country Name" class="form-control input-sm"><br>
                 <input type="text" placeholder="Enter Country Code" class="form-control input-sm"><br>

                 <label class="label-info">  <a class="thumbnail"><img src="img/placeholders/image_light_160x120.png" alt="fakeimg"></a><input type="file" id="fileName2" onchange="PreviewImagepl2();" name="fileName2"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" >UPLOAD FLAG IMAGE</label>



            </div>

       </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">ADD</button>
      </div>
    </div>
  </div>
</div>



     <!--Add City Modal -->
<div class="modal fade" id="addcity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">City Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
            <div class="col-md-10 col-md-offset-1">
   <select type="text" placeholder="Select Country " class="form-control input-sm">
                    <option>INDIA</option>

</select>


                    <br>

                     <select type="text" placeholder="Select State " class="form-control input-sm">
                    <option>Maharashtra</option>

</select>


                    <br>
                 <input type="text" placeholder="Enter City Name" class="form-control input-sm"><br>




            </div>

       </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">ADD</button>
      </div>
    </div>
  </div>
</div>



                        <!--Add Country Modal -->
<div class="modal fade" id="addstate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">State Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
            <div class="col-md-10 col-md-offset-1">


                <select type="text" placeholder="Select Country " class="form-control input-sm">
                    <option>INDIA</option>

</select>


                    <br>
                 <input type="text" placeholder="Enter State Name" class="form-control input-sm"><br>





            </div>

       </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">ADD</button>
      </div>
    </div>
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
