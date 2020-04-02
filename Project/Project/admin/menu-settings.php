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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <!-- Related styles of various javascript plugins -->
        <link rel="stylesheet" href="css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="css/main.css">

        <!-- Load a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="css/themes.css">
        <!-- END Stylesheets -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
            .bs-example{
            	margin: 20px;
            }
        </style>
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

                        <li class="active"><a href="menu-settings.php">FrontPage Settings</a></li>
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
                          <h3 style="margin-top:-2%;text-align:center;height:10px;">IMAGE OR MAP</h3>
					</div>
					</div>

					<div class="row"><center><br>

            <!-- <input type="checkbox" data-toggle="toggle" class = "" data-on="Image" data-off="Map"> -->

            <?php
            $a=1;
            $stmtfetch = $db->prepare("SELECT ismap FROM admin WHERE adminID = :menuID");
            $stmtfetch->execute(array(':menuID' => $a));
            $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);

            ?>

            <input type="hidden" id="ismap" value="<?php echo $row['ismap']?>">
            <input type="checkbox" id="toggle-two" class="ismapimage" value="">
            <script>
              $(function() {
                var ismap = "<?php echo $row['ismap']?>";
                console.log(ismap);
                if(ismap !="map" )
                {
                  $('.ismapimage').bootstrapToggle({

                      on: 'Map',
                      off: 'Image'
                  });
              }else {
                $('.ismapimage').bootstrapToggle({
                  on: 'Image',
                  off: 'Map'
                });

              }
              })
            </script>
			</div>




					<hr>
<div class="row">

					<div class="col-sm-12">
                        <!-- Users Tile -->
                          <div class="dash-tile-header">
                              <center>  MENU </center>
                            </div>
							</div>
					</div>


<hr>


<div class="row">
<form class="updatemenu">
<div class="col-md-2">
<span class="badge"  style="width: 15%;">1</span>
</div>
<div class="col-md-4" >
  <?php
   $a=1;
      $stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM menulist WHERE menuID = :menuID)");
    $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $industryID = $row['industryID'];
      $industryName = $row['industryName'];

  ?>
			<div class="input-group" style="MARGIN-LEFT: -38%;  WIDTH: 107%;">
        <select class="form-control" id="industry" name ="industryID">
          <option value ="<?php echo $industryID ;?>" class="selected-item"><?php echo $industryName ;?></option>
          <?php
                                    $q = $db->prepare("SELECT * FROM industrylist");
                                    $q->execute();
                                    while($r = $q->fetch(PDO::FETCH_ASSOC))
                                    {?>
                                      <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                                <?php } ?>
        </select>
            </div>
        </div>
        <input type="hidden" name="menuid" value="1">
		<div class="col-md-4">
    <div class="input-group" style="margin-left: -28%";>
      <span class="input-group-addon" >
       URL
      </span>
      <?php
      $stmtfetch = $db->prepare("SELECT URL FROM menulist WHERE menuID = :menuID");
      $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      ?>
      <input type="text" name="url" value="<?php echo $row['URL'];?>" class="form-control" aria-label="Enter URL">
    </div>
  </div>
  <div class="col-md-2">
    <input type="submit" name ="update" class="btn btn-primary" value="Save">
  </div>
</form>
</div>


<div class="row">
  <form class="updatemenu">
<div class="col-md-2">
<span class="badge"  style="width: 15%;">2</span>
</div>
<div class="col-md-4">
  <?php
   $a=2;
      $stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM menulist WHERE menuID = :menuID)");
    $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $industryID = $row['industryID'];
      $industryName = $row['industryName'];

  ?>
  <div class="input-group" style="MARGIN-LEFT: -38%;  WIDTH: 107%;">
    <select class="form-control" id="industry" name ="industryID">
      <option value ="<?php echo $industryID ;?>" class="selected-item"><?php echo $industryName ;?></option>
      <?php
                                $q = $db->prepare("SELECT * FROM industrylist");
                                $q->execute();
                                while($r = $q->fetch(PDO::FETCH_ASSOC))
                                {?>
                                  <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                            <?php } ?>
    </select>
        </div>
        </div>

		<div class="col-md-4">
    <div class="input-group" style="margin-left: -28%";>
      <span class="input-group-addon" >
       URL
      </span>
      <input type="hidden" name="menuid" value="2">
      <?php
      $stmtfetch = $db->prepare("SELECT URL FROM menulist WHERE menuID = :menuID");
      $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      ?>
      <input type="text" name ="url" value="<?php echo $row['URL'];?>"class="form-control" aria-label="Enter URL">
    </div>
  </div>
  <div class="col-md-2">
    <input type="submit" name="update" class="btn btn-primary" value="Save">
  </div>
</form>
</div>





<div class="row">
  <form class="updatemenu">
<div class="col-md-2">
<span class="badge"  style="width: 15%;">3</span>
</div>
<div class="col-md-4">
  <?php
   $a=3;
      $stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM menulist WHERE menuID = :menuID)");
    $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $industryID = $row['industryID'];
      $industryName = $row['industryName'];

  ?>
  <div class="input-group" style="    MARGIN-LEFT: -38%;  WIDTH: 107%;">
    <select class="form-control" id="industry" name ="industryID" onChange="getSubIndustry(this.value);" >
      <option value ="<?php echo $industryID ;?>" class="selected-item"><?php echo $industryName ;?></option>
      <?php
                                $q = $db->prepare("SELECT * FROM industrylist");
                                $q->execute();
                                while($r = $q->fetch(PDO::FETCH_ASSOC))
                                {?>
                                  <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                            <?php } ?>
    </select>
        </div>
        </div>

		<div class="col-md-4">
    <div class="input-group" style="margin-left: -28%";>
      <span class="input-group-addon" >
       URL
      </span>
      <input type="hidden" name="menuid" value="3">
      <?php
      $stmtfetch = $db->prepare("SELECT URL FROM menulist WHERE menuID = :menuID");
      $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      ?>
      <input type="text" name ="url" value="<?php echo $row['URL'];?>"class="form-control" aria-label="Enter URL">
    </div>
  </div>
  <div class="col-md-2">
    <input type="submit" name="update" class="btn btn-primary" value="Save">
  </div>
</from>
</div>
</form>



<div class="row">
  <form class="updatemenu">
<div class="col-md-2">
<span class="badge"  style="width: 15%;">4</span>
</div>
<div class="col-md-4">
  <?php
   $a=4;
      $stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM menulist WHERE menuID = :menuID)");
    $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $industryID = $row['industryID'];
      $industryName = $row['industryName'];

  ?>
  <div class="input-group" style="MARGIN-LEFT: -38%;  WIDTH: 107%;">
    <select class="form-control" id="industry" name ="industryID">
      <option value ="<?php echo $industryID ;?>" class="selected-item"><?php echo $industryName ;?></option>
      <?php
                                $q = $db->prepare("SELECT * FROM industrylist");
                                $q->execute();
                                while($r = $q->fetch(PDO::FETCH_ASSOC))
                                {?>
                                  <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                            <?php } ?>
    </select>
        </div>
        </div>

		<div class="col-md-4">
    <div class="input-group" style="margin-left: -28%";>
      <span class="input-group-addon" >
       URL
      </span>
      <input type="hidden" name="menuid" value="4">
      <?php
      $stmtfetch = $db->prepare("SELECT URL FROM menulist WHERE menuID = :menuID");
      $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      ?>
      <input type="text" name ="url" value="<?php echo $row['URL'];?>"class="form-control" aria-label="Enter URL">
    </div>
  </div>
  <div class="col-md-2">
    <input type="submit" name="update" class="btn btn-primary" value="Save">
  </div>
</form>
</div>




<div class="row">
  <form class="updatemenu">
<div class="col-md-2">
<span class="badge"  style="width: 15%;">5</span>
</div>
<div class="col-md-4">
  <?php
   $a=5;
      $stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM menulist WHERE menuID = :menuID)");
    $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $industryID = $row['industryID'];
      $industryName = $row['industryName'];

  ?>
  <div class="input-group" style="    MARGIN-LEFT: -38%;  WIDTH: 107%;">
    <select class="form-control" id="industry" name ="industryID">
      <option value ="<?php echo $industryID ;?>" class="selected-item"><?php echo $industryName ;?></option>
      <?php
                                $q = $db->prepare("SELECT * FROM industrylist");
                                $q->execute();
                                while($r = $q->fetch(PDO::FETCH_ASSOC))
                                {?>
                                  <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                            <?php } ?>
    </select>
        </div>
        </div>

		<div class="col-md-4">
    <div class="input-group" style="margin-left: -28%";>
      <span class="input-group-addon" >
       URL
      </span>
      <input type="hidden" name="menuid" value="5">
      <?php
      $stmtfetch = $db->prepare("SELECT URL FROM menulist WHERE menuID = :menuID");
      $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      ?>
      <input type="text" name ="url" value="<?php echo $row['URL'];?>"class="form-control" aria-label="Enter URL">
    </div>
  </div>
  <div class="col-md-2">
    <input type="submit" name="update" class="btn btn-primary" value="Save">
  </div>
</form>
</div>



<div class="row">
  <form class="updatemenu">
<div class="col-md-2">
<span class="badge"  style="width: 15%;">6</span>
</div>
<div class="col-md-4">
  <?php
   $a=6;
      $stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM menulist WHERE menuID = :menuID)");
    $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $industryID = $row['industryID'];
      $industryName = $row['industryName'];

  ?>
  <div class="input-group" style="    MARGIN-LEFT: -38%;  WIDTH: 107%;">
    <select class="form-control" id="industry" name ="industryID" onChange="getSubIndustry(this.value);" >
      <option value ="<?php echo $industryID ;?>" class="selected-item"><?php echo $industryName ;?></option>
      <?php
                                $q = $db->prepare("SELECT * FROM industrylist");
                                $q->execute();
                                while($r = $q->fetch(PDO::FETCH_ASSOC))
                                {?>
                                  <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                            <?php } ?>
    </select>
        </div>
        </div>

		<div class="col-md-4">
    <div class="input-group" style="margin-left: -28%";>
      <span class="input-group-addon" >
       URL
      </span>
      <input type="hidden" name="menuid" value="6">
      <?php
      $stmtfetch = $db->prepare("SELECT URL FROM menulist WHERE menuID = :menuID");
      $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      ?>
      <input type="text" name ="url" value="<?php echo $row['URL'];?>" class="form-control" aria-label="Enter URL">
    </div>
  </div>
  <div class="col-md-2">
    <input type="submit" name="update"  class="btn btn-primary" value="Save">
  </div>
</form>
</div>




<div class="row">
  <form class="updatemenu">
<div class="col-md-2">
<span class="badge"  style="width: 15%;">7</span>
</div>
<div class="col-md-4">
  <?php
   $a=7;
      $stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM menulist WHERE menuID = :menuID)");
    $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $industryID = $row['industryID'];
      $industryName = $row['industryName'];

  ?>
  <div class="input-group" style="MARGIN-LEFT: -38%;  WIDTH: 107%;">
    <select class="form-control" id="industry" name ="industryID" onChange="getSubIndustry(this.value);" >
      <option value ="<?php echo $industryID ;?>" class="selected-item"><?php echo $industryName ;?></option>
      <?php
                                $q = $db->prepare("SELECT * FROM industrylist");
                                $q->execute();
                                while($r = $q->fetch(PDO::FETCH_ASSOC))
                                {?>
                                  <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                            <?php } ?>
    </select>
        </div>
        </div>

		<div class="col-md-4">
    <div class="input-group" style="margin-left: -28%";>
      <span class="input-group-addon" >
       URL
      </span>
      <input type="hidden" name="menuid" value="7">
      <?php
      $stmtfetch = $db->prepare("SELECT URL FROM menulist WHERE menuID = :menuID");
      $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      ?>
      <input type="text" name ="url" value="<?php echo $row['URL'];?>"class="form-control" aria-label="Enter URL">
    </div>
  </div>
  <div class="col-md-2">
    <input type="submit" name="update" class="btn btn-primary" value="Save">
  </div>
</form>
</div>





<div class="row">
  <form class="updatemenu">
<div class="col-md-2">
<span class="badge"  style="width: 15%;">8</span>
</div>
<div class="col-md-4">
  <?php
   $a=8;
      $stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM menulist WHERE menuID = :menuID)");
    $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $industryID = $row['industryID'];
      $industryName = $row['industryName'];

  ?>
  <div class="input-group" style="MARGIN-LEFT: -38%;  WIDTH: 107%;">
    <select class="form-control" id="industry" name ="industryID" onChange="getSubIndustry(this.value);" >
      <option value ="<?php echo $industryID ;?>" class="selected-item"><?php echo $industryName ;?></option>
      <?php
                                $q = $db->prepare("SELECT * FROM industrylist");
                                $q->execute();
                                while($r = $q->fetch(PDO::FETCH_ASSOC))
                                {?>
                                  <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                            <?php } ?>
    </select>
        </div>
        </div>

		<div class="col-md-4">
    <div class="input-group" style="margin-left: -28%";>
      <span class="input-group-addon" >
       URL
      </span>
      <input type="hidden" name="menuid" value="8">
      <?php
      $stmtfetch = $db->prepare("SELECT URL FROM menulist WHERE menuID = :menuID");
      $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      ?>
      <input type="text" name ="url" value="<?php echo $row['URL'];?>"class="form-control" aria-label="Enter URL">
    </div>
  </div>
  <div class="col-md-2">
    <input type="submit" name="update" class="btn btn-primary" value="Save">
  </div>
</form>
</div>


<div class="row">
  <form class="updatemenu">
<div class="col-md-2">
<span class="badge"  style="width: 15%;">9</span>
</div>
<div class="col-md-4">
  <?php
   $a=9;
      $stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM menulist WHERE menuID = :menuID)");
    $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $industryID = $row['industryID'];
      $industryName = $row['industryName'];

  ?>
  <div class="input-group" style="MARGIN-LEFT: -38%;  WIDTH: 107%;">
    <select class="form-control" id="industry" name ="industryID" onChange="getSubIndustry(this.value);" >
      <option value ="<?php echo $industryID ;?>" class="selected-item"><?php echo $industryName ;?></option>
      <?php
                                $q = $db->prepare("SELECT * FROM industrylist");
                                $q->execute();
                                while($r = $q->fetch(PDO::FETCH_ASSOC))
                                {?>
                                  <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                            <?php } ?>
    </select>
        </div>
        </div>

		<div class="col-md-4">
    <div class="input-group" style="margin-left: -28%";>
      <span class="input-group-addon" >
       URL
      </span>
      <input type="hidden" name="menuid" value="9">
      <?php
      $stmtfetch = $db->prepare("SELECT URL FROM menulist WHERE menuID = :menuID");
      $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      ?>
      <input type="text" name ="url" value="<?php echo $row['URL'];?>"class="form-control" aria-label="Enter URL">
    </div>
  </div>
  <div class="col-md-2">
    <input type="submit" name="update" class="btn btn-primary" value="Save">
  </div>
</form>
</div>



<div class="row">
  <form class="updatemenu">
<div class="col-md-2">
<span class="badge"  style="width: 15%;">10</span>
</div>
<div class="col-md-4">
  <?php
   $a=10;
      $stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM menulist WHERE menuID = :menuID)");
    $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $industryID = $row['industryID'];
      $industryName = $row['industryName'];

  ?>
  <div class="input-group" style="MARGIN-LEFT: -38%;  WIDTH: 107%;">
    <select class="form-control" id="industry" name ="industryID" onChange="getSubIndustry(this.value);" >
      <option value ="<?php echo $industryID ;?>" class="selected-item"><?php echo $industryName ;?></option>
      <?php
                                $q = $db->prepare("SELECT * FROM industrylist");
                                $q->execute();
                                while($r = $q->fetch(PDO::FETCH_ASSOC))
                                {?>
                                  <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                            <?php } ?>
    </select>
        </div>
        </div>

		<div class="col-md-4">
    <div class="input-group" style="margin-left: -28%";>
      <span class="input-group-addon" >
       URL
      </span>
      <input type="hidden" name="menuid" value="10">
      <?php
      $stmtfetch = $db->prepare("SELECT URL FROM menulist WHERE menuID = :menuID");
      $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      ?>
      <input type="text" name ="url" value="<?php echo $row['URL'];?>"class="form-control" aria-label="Enter URL">
    </div>
  </div>
  <div class="col-md-2">
    <input type="submit" name="update" class="btn btn-primary" value="Save">
  </div>
</form>
</div>



<div class="row">
  <form class="updatemenu">
<div class="col-md-2">
<span class="badge"  style="width: 15%;">11</span>
</div>
<div class="col-md-4">
  <?php
   $a=11;
      $stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM menulist WHERE menuID = :menuID)");
    $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $industryID = $row['industryID'];
      $industryName = $row['industryName'];

  ?>
  <div class="input-group" style="MARGIN-LEFT: -38%;  WIDTH: 107%;">
    <select class="form-control" id="industry" name ="industryID" onChange="getSubIndustry(this.value);" >
      <option value ="<?php echo $industryID ;?>" class="selected-item"><?php echo $industryName ;?></option>
      <?php
                                $q = $db->prepare("SELECT * FROM industrylist");
                                $q->execute();
                                while($r = $q->fetch(PDO::FETCH_ASSOC))
                                {?>
                                  <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                            <?php } ?>
    </select>
        </div>
        </div>

		<div class="col-md-4">
    <div class="input-group" style="margin-left: -28%";>
      <span class="input-group-addon" >
       URL
      </span>
      <input type="hidden" name="menuid" value="11">
      <?php
      $stmtfetch = $db->prepare("SELECT URL FROM menulist WHERE menuID = :menuID");
      $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      ?>
      <input type="text" name ="url" value="<?php echo $row['URL'];?>"class="form-control" aria-label="Enter URL">
    </div>
  </div>
  <div class="col-md-2">
    <input type="submit" name="update" class="btn btn-primary" value="Save">
  </div>
</form>
</div>


<div class="row">
  <form class="updatemenu">
<div class="col-md-2">
<span class="badge"  style="width: 15%;">12</span>
</div>
<div class="col-md-4">
  <?php
   $a=12;
      $stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM menulist WHERE menuID = :menuID)");
    $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $industryID = $row['industryID'];
      $industryName = $row['industryName'];

  ?>
  <div class="input-group" style="MARGIN-LEFT: -38%;  WIDTH: 107%;">
    <select class="form-control" id="industry" name ="industryID" onChange="getSubIndustry(this.value);" >
      <option value ="<?php echo $industryID ;?>" class="selected-item"><?php echo $industryName ;?></option>
      <?php
                                $q = $db->prepare("SELECT * FROM industrylist");
                                $q->execute();
                                while($r = $q->fetch(PDO::FETCH_ASSOC))
                                {?>
                                  <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                            <?php } ?>
    </select>
        </div>
        </div>

		<div class="col-md-4">
    <div class="input-group" style="margin-left: -28%";>
      <span class="input-group-addon" >
       URL
      </span>
      <input type="hidden" name="menuid" value="12">
      <?php
      $stmtfetch = $db->prepare("SELECT URL FROM menulist WHERE menuID = :menuID");
      $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      ?>
      <input type="text" name ="url" value="<?php echo $row['URL'];?>"class="form-control" aria-label="Enter URL">
    </div>
  </div>
  <div class="col-md-2">
    <input type="submit" name="update" class="btn btn-primary" value="Save">
  </div>
</form>
</div>



<div class="row">
  <form class="updatemenu">
<div class="col-md-2">
<span class="badge"  style="width: 15%;">13</span>
</div>
<div class="col-md-4">
  <?php
   $a=13;
      $stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM menulist WHERE menuID = :menuID)");
    $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $industryID = $row['industryID'];
      $industryName = $row['industryName'];

  ?>
  <div class="input-group" style="MARGIN-LEFT: -38%;  WIDTH: 107%;">
    <select class="form-control" id="industry" name ="industryID" onChange="getSubIndustry(this.value);" >
      <option value ="<?php echo $industryID ;?>" class="selected-item"><?php echo $industryName ;?></option>
      <?php
                                $q = $db->prepare("SELECT * FROM industrylist");
                                $q->execute();
                                while($r = $q->fetch(PDO::FETCH_ASSOC))
                                {?>
                                  <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                            <?php } ?>
    </select>
        </div>
        </div>

		<div class="col-md-4">
    <div class="input-group" style="margin-left: -28%";>
      <span class="input-group-addon" >
       URL
      </span>
      <input type="hidden" name="menuid" value="13">
      <?php
      $stmtfetch = $db->prepare("SELECT URL FROM menulist WHERE menuID = :menuID");
      $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      ?>
      <input type="text" name ="url" value="<?php echo $row['URL'];?>"class="form-control" aria-label="Enter URL">
    </div>
  </div>
  <div class="col-md-2">
    <input type="submit" name="update" class="btn btn-primary" value="Save">
  </div>
</form>
</div>


<div class="row">
  <form class="updatemenu">
<div class="col-md-2">
<span class="badge"  style="width: 15%;">14</span>
</div>
<div class="col-md-4">
  <?php
   $a=14;
      $stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM menulist WHERE menuID = :menuID)");
    $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $industryID = $row['industryID'];
      $industryName = $row['industryName'];

  ?>
  <div class="input-group" style="MARGIN-LEFT: -38%;  WIDTH: 107%;">
    <select class="form-control" id="industry" name ="industryID" onChange="getSubIndustry(this.value);" >
      <option value ="<?php echo $industryID ;?>" class="selected-item"><?php echo $industryName ;?></option>
      <?php
                                $q = $db->prepare("SELECT * FROM industrylist");
                                $q->execute();
                                while($r = $q->fetch(PDO::FETCH_ASSOC))
                                {?>
                                  <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                            <?php } ?>
    </select>
        </div>
        </div>

		<div class="col-md-4">
    <div class="input-group" style="margin-left: -28%";>
      <span class="input-group-addon" >
       URL
      </span>
      <input type="hidden" name="menuid" value="14">
      <?php
      $stmtfetch = $db->prepare("SELECT URL FROM menulist WHERE menuID = :menuID");
      $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      ?>
      <input type="text" name ="url" value="<?php echo $row['URL'];?>"class="form-control" aria-label="Enter URL">
    </div>
  </div>
  <div class="col-md-2">
    <input type="submit" name="update" class="btn btn-primary" value="Save">
  </div>
</form>
</div>



<div class="row">
  <form class="updatemenu">
<div class="col-md-2">
<span class="badge"  style="width: 15%;">15</span>
</div>
<div class="col-md-4">
  <?php
   $a=15;
      $stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM menulist WHERE menuID = :menuID)");
    $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $industryID = $row['industryID'];
      $industryName = $row['industryName'];

  ?>
  <div class="input-group" style="MARGIN-LEFT: -38%;  WIDTH: 107%;">
    <select class="form-control" id="industry" name ="industryID" onChange="getSubIndustry(this.value);" >
      <option value ="<?php echo $industryID ;?>" class="selected-item"><?php echo $industryName ;?></option>
      <?php
                                $q = $db->prepare("SELECT * FROM industrylist");
                                $q->execute();
                                while($r = $q->fetch(PDO::FETCH_ASSOC))
                                {?>
                                  <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                            <?php } ?>
    </select>
        </div>
        </div>

		<div class="col-md-4">
    <div class="input-group" style="margin-left: -28%";>
      <span class="input-group-addon" >
       URL
      </span>
      <input type="hidden" name="menuid" value="15">
      <?php
      $stmtfetch = $db->prepare("SELECT URL FROM menulist WHERE menuID = :menuID");
      $stmtfetch->execute(array(':menuID' => $a));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      ?>
      <input type="text" name ="url" value="<?php echo $row['URL'];?>"class="form-control" aria-label="Enter URL">
    </div>
  </div>
  <div class="col-md-2">
    <input type="submit" name="update" class="btn btn-primary" value="Save">
  </div>
</form>
</div>

<script src="js/menusetting.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
