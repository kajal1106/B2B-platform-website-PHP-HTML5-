<?php
  include('includes/config.php');
  if( !$user->is_logged_in() ){ header('Location: index.php'); }
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

        <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that dont support it, eg IE8) -->
        <script src="js/vendor/modernizr-respond.min.js"></script>
    </head>

    <!-- Add the class .fixed to <body> for a fixed layout on large resolutions (min: 1200px) -->
    <!-- <body class="fixed"> -->
    <body>
             <!-- Page Container -->

	<?php
				if(isset($_GET['action']))
				{
					if($_GET['action']=='error')
					{
						echo "<script type='text/javascript'>alert('industry added already..');</script>";

					}
					if($_GET['action']=='success')
					{
						echo "<script type='text/javascript'>alert('Industry added Successfully');</script>";
					}
				}

	?>


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
                        <li><a href="">Categories</a></li>
                        <li class="active"><a href="">Industries</a></li>
                    </ul>
                    <!-- END Navigation info -->


                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <!-- Users Tile -->
                        <div class="dash-tile dash-tile-2x remove-margin">
                            <div class="dash-tile-header">
                                Industries
                            </div>
                            <div class="dash-tile-content">
                                <div class="dash-tile-content-inner-fluid">
                                    <!-- Users tabs links -->
                                    <ul id="dash-example-tabs" class="nav nav-tabs" data-toggle="tabs">
                                        <li class="active"><a href="#viewindustry">View industries</a></li>
                                        <li><a href="#addindustry">Add industries</a></li>
                                         <li><a href="#addsubindustry">Add Sub industries</a></li>

                                    </ul>
                                    <!-- END Users tabs links -->

                                    <!-- User tabs content -->
                                    <div class="tab-content">
                                        <!-- Admins Tab -->
                                        <div class="tab-pane active" id="viewindustry">

                                              <!-- Datatables Tile -->
                                              <div class="dash-tile dash-tile-2x">

                                                  <div class="dash-tile-content">
                                                      <div class="dash-tile-content-inner-fluid">

                                                          <table id="dash-example-orders" class="table table-striped table-bordered table-condensed">

                                                              <thead>

                                                                  <tr>
                                                                    <th>Sr no.</th>
                                                                    <th ><i class="fa fa-user"></i> Industries</th>


                                                                    <th>View Sub Indsutry</th>


                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                                <?php
                                                                 $i=1;
                                                                    $stmtfetch = $db->prepare('SELECT * FROM industrylist');
                                                                    $stmtfetch->execute();
                                                                    while($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
                                                                    {
                                                                    ?>
                                                                  <tr>

                                                                      <td ><?php echo $i;?></td>
                                                                      <td><?php echo $row['industryName'];?></td>

                                                                       <td class="text-center">
                                                                          <div class="">
                                                                              <button title="editsubindustry" class="btn btn-xs btn-primary viewsub" id="<?php echo $row['industryID'];?>" data-toggle="modal" data-target="#viewsubindustry"><i class="fa fa-cog"></i></button>
                                                                          </div>
                                                                      </td>


                                                                  </tr>
                                                                  <?php
                                                                $i++; }
                                                                ?>
                                                              </tbody>
                                                          </table>
                                                      </div>
                                                  </div>
                                              </div>
                                              <!-- END Datatables Tile -->






                                        </div>
                                        <!-- END Admins Tab -->

                                        <!-- Mods Tab -->
                                        <div class="tab-pane" id="addindustry">
                                          <form action="addindustry.php" method="POST">
                                          <div class="input-group">
                                            <span class="input-group-addon">Industry Name:</span>
                                            <input type="text" id="example-input-prepend2" name="addindustry" class="form-control" placeholder="Enter Industry Name" required>
                                        </div>
                                        <input type="submit" class="btn btn-success col-sm-offset-5" style="margin-top:2%;" name="Add" value="Add Industry"><br><br>
                      <!-- Datatables Tile -->
                                        </form>
                                              <div class="dash-tile dash-tile-2x">

                                                  <div class="dash-tile-content">
                                                      <div class="dash-tile-content-inner-fluid">

                                                          <table id="industry" class="table table-striped table-bordered table-condensed">

                                                              <thead>

                                                                  <tr>
                                                                    <th>Sr no.</th>
                                                                    <th ><i class="fa fa-user"></i> Industries</th>

                                                                        <th>Edit/View</th>


                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                                <?php
                                                                 $i=1;
                                                                    $stmtfetch = $db->prepare('SELECT * FROM industrylist');
                                                                    $stmtfetch->execute();
                                                                    while($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
                                                                    {
                                                                    ?>
                                                                  <tr>

                                                                      <td ><?php echo $i; ?></td>
                                                                      <td><?php echo $row['industryName']?></td>

                                                                       <td class="text-center">
                                                                          <div class="">
                                                                              <button title="editsubindustry" class="btn btn-xs btn-primary editindustry" data-toggle="modal" id="<?php echo $row['industryID'];?>" value="<?php echo $row['industryID'];?>" data-target="#vieweditindustry"><i class="fa fa-cog"></i></button>
                                                                          </div>
                                                                      </td>


                                                                  </tr>
                                                                <?php $i++; } ?>
                                                              </tbody>
                                                          </table>
                                                      </div>
                                                  </div>
                                              </div>
                                              <!-- END Datatables Tile -->


                                        </div>


<div class="tab-pane" id="addsubindustry">




  <form action="addsubindustry.php" method="POST">
      <div class="form-group" >
      <div class="col-sm-3">
        <label class="control-label " for="example-select">Select Industry</label>
      </div>
       <div class="col-sm-8">
      <select id="example-select" name="industryn" class="form-control">
        <option>Select Industry</option>
        <?php
        $stmtfetch = $db->prepare('SELECT * FROM industrylist');
        $stmtfetch->execute();
        while($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
        {

        ?>
        <option value="<?php echo $row['industryID']?>"><?php echo $row['industryName']?></option>
        <?php
        }
        ?>
      </select>
      </div>
      </div>
      <div class="form-group">
      <div class="col-sm-3">
      <label class="control-label">Sub Industry Name</label>
      </div>
      <div class="col-sm-8">
      <input type="text"  id="example-input-prepend2" name="subindustry" class="form-control" placeholder="Enter Industry Name" required>
      </div>
      </div>
      <input type="submit" class="btn btn-success col-sm-offset-5" style="margin-top:3%;" name="Add" value="Add Sub Industry"><br><br>
  </form>
                        <!-- Datatables Tile -->
                                              <div class="dash-tile dash-tile-2x">

                                                  <div class="dash-tile-content">
                                                      <div class="dash-tile-content-inner-fluid">

                                                          <table id="subindustry" class="table table-striped table-bordered table-condensed">

                                                              <thead>

                                                                  <tr>
                                                                    <th>Sr no.</th>
                                                                    <th>Sub Indsutry</th>
                                                                    <th ><i class="fa fa-user"></i> Industries</th>
                                                                    <th>Edit/View</th>


                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                                <?php
                                                                $i=1;
                                                                $stmtfetch = $db->prepare('SELECT * FROM industrysublist');
                                                              $stmtfetch->execute();
                                                                  while($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
                                                                  {

                                                            ?>

                                                                  <tr>

                                                                      <td ><?php echo $i;?></td>
                                                                      <td><?php echo $row['subindustryName'];?></td>
                                                                      <?php
                                                                            $stmtfetch1 = $db->prepare('SELECT industryName FROM industrylist where industryID = (select industryID from industrysublist where IndustrySublistID = :IndustrySublistID )');
                                                                            $stmtfetch1->execute(array(':IndustrySublistID' => $row['IndustrySublistID']));
                                                                            $r1= $stmtfetch1->fetch(PDO::FETCH_ASSOC);
                                                                      ?>
                                                                       <td><?php echo $r1['industryName']?></td>




                                                                       <td class="text-center">
                                                                          <div class="">
                                                                              <button title="editsubindustry" class="btn btn-xs btn-primary viewsubind" id="<?php echo $row['IndustrySublistID'];?>" data-toggle="modal" data-target="#editsubindustry"><i class="fa fa-cog"></i></button>
                                                                          </div>
                                                                      </td>


                                                                  </tr>
                                                                  <?php ++$i; }?>
                                                              </tbody>
                                                          </table>
                                                      </div>
                                                  </div>
                                              </div>
                                              <!-- END Datatables Tile -->


                        </div>


                                        <!-- END Mods Tab -->

                                        <!-- New Users Tab -->

                                        <!-- END New Users Tab -->
                                    </div>
                                    <!-- END User tabs content -->
                                </div>
                            </div>
                        </div>
                        <!-- END Users Tile -->
                    </div>
<!-- Modal view sub industry -->
<div class="modal fade" id="viewsubindustry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sub Industries</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body viewsubindustry">



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>



<!-- Modal view sub industry -->
<div class="modal fade" id="vieweditindustry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Industry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body editindustryv">





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning editindustrya">Edit</button>
        <button type="button" class="btn btn-primary saveindustry" data-dismiss="modal" disabled>Save</button>

      </div>
      </div>
  </div>
</div>





      <!-- Modal view sub industry -->
<div class="modal fade" id="editsubindustry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Sub Industry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body viewsubin">





      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-warning editsub">Edit</button>
        <button type="button" class="btn btn-primary savesub" data-dismiss="modal">Save</button>

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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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




           <script>
            $(function () {
                // Initialize dash Datatables
                $('#industry').dataTable({
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
           <script>
            $(function () {
                // Initialize dash Datatables
                $('#subindustry').dataTable({
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
        <script>
        $(document).ready(function(){
          $('.viewsub').each(function(){
               $(this).on('click',function(){
                // console.log('here lead');
                  var id = $(this).attr('id');
                  console.log(id);
                  //console.log("asd");
                    $.ajax({
                                  type: "POST",
                                  url: "viewsubindustry.php",
                                  data: {
                                    'id': id
                                  }
                              })
                              .done(function(data){
                                //console.log(data);
                                $('.viewsubindustry').html(data);
                                //console.log(data);
                              });
               });
             });

             var id1;

             $('.editindustry').each(function(){
                  $(this).on('click',function(){
                    //console.log('here lead');
                       id1 = $(this).attr('id');
                       $.ajax({
                                     type: "POST",
                                     url: "editindustry.php",
                                     data: {
                                       'id': id1
                                     }
                                 })
                                 .done(function(data){
                                   //console.log(data);
                                   $('.editindustryv').html(data);
                                   //console.log(data);
                                 });
                  });
                });
                $(".editindustrya").click(function(){
                   $( "#industryName" ).prop( "disabled", false );
                   $(".saveindustry" ).prop( "disabled", false );
                  });

                  $('.saveindustry').each(function(){
                       $(this).on('click',function(){
                         $( "#industryName" ).prop( "disabled", true );
                         $(".saveindustry" ).prop( "disabled", true );

                         console.log('here lead');

                            //id = $(".editindustry").val();
                            $.ajax({
                                          type: "POST",
                                          url: "updateindustry.php",
                                          data: {
                                            'id': id1,
                                            name : $("#industryName").val()
                                          }
                                      })
                                      .done(function(data){
                                        //console.log(data);
                                        //console.log(data);
                                        alert('data save'+data);
                                      });

                       });
                     });
                     var id2;
                     $('.viewsubind').each(function(){
                          $(this).on('click',function(){
                            console.log('view Sub');
                               id2 = $(this).attr('id');
                               $.ajax({
                                             type: "POST",
                                             url: "viewsubind.php",
                                             data: {
                                               'id': id2
                                             }
                                         })
                                         .done(function(data){
                                           //console.log(data);
                                           $('.viewsubin').html(data);
                                           //console.log(data);
                                         });
                          });
                        });
                     $(".editsub").click(function(){
                        $( "#subname" ).prop( "disabled", false );
                        $(".savesub" ).prop( "disabled", false );
                       });

                       $('.savesub').each(function(){
                            $(this).on('click',function(){
                              $( "#subname" ).prop( "disabled", true );
                              $(".savesub" ).prop( "disabled", true );

                              console.log('here lead');

                                 //id = $(".viewsubind").attr('id');
                                 $.ajax({
                                               type: "POST",
                                               url: "updatesubindustry.php",
                                               data: {
                                                 'id': id2,
                                                 name : $("#subname").val()
                                               }
                                           })
                                           .done(function(data){
                                             //console.log(data);
                                             //console.log(data);
                                             alert('data save'+data);
                                           });
                            });
                          });



        });
        </script>
    </body>
</html>
