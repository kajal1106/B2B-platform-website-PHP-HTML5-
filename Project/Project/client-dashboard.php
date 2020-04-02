<?php

$pagetitle="client Dashboard";
include('includes/config.php');
if( !$user->is_client_logged_in()){ header('Location: index.php'); }
include('includes/head.php');?>


<body style="overflow:hidden;">


		<!--================================responsive log and menu==========================================-->

		<!--================================HEADER==========================================-->
	<?php include('includes/client_header.php');?>

		<!--================================ABOUT SECTION========================================== -->
		<div class="container">
			<?php
						if(isset($_GET['action']))
						{
							if($_GET['action']=='error')
							{
								echo "<script type='text/javascript'>alert('wrong username and password...');</script>";
							}
							if($_GET['action']=='not')
							{
								echo "<script type='text/javascript'>alert('User Not Selected');</script>";
							}
							if($_GET['action']=='joined')
							{
								echo "<script type='text/javascript'>alert('Activation successful..');</script>";
							}
							if($_GET['action']=='success')
							{
								echo "<script type='text/javascript'>alert('lead Added successfully..');</script>";
							}
						}

			?>

<div class="row padding-top-70 padding-bottom-100">
<div class="col-md-12  " style="background-color:white;margin-top:1%;">



<!--Style for nav menu items-->
<style>



.navheader{
  font-size:14px;
  font-weight: bold;
}


</style>
<!--Style for nav menu items-->
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
  <ul class="nav nav-pills nav-justified">
  	<!--li class="bg-info"><a href="#tab_dashboard" data-toggle="pill" class="navheader">Dashboard</a></li-->
    <li class="active bg-info"><a href="#tab_leads" data-toggle="pill" class="navheader">My Leads</a></li>

    <li class="bg-info"><a href="#tab_profile" data-toggle="pill" class="navheader">My Profile </a></li>

     <li class="bg-info"><a href="#tab_setting" data-toggle="pill" class="navheader"><i class="fa fa-cog" style="font-size:140%;" aria-hidden="true"></i></a></li>
  </ul>


  <div class="tab-content" style="min-height:400px;">



  

 <!--================================Dashboard Section End=====================================-->





  <!--================================My Profile Section Starts=====================================-->

  <div class="tab-pane" id="tab_profile" role="tabpanel">

    <section class="aside-layout-section padding-top-30 padding-bottom-70">
    <div class="container bg-white padding-top-10 padding-bottom-10">



      <div class="row">

        <div class="col-md-10 col-md-offset-1">


        <div class="form-horizontal">
          <fieldset>

        <div class="row">







        <!--=====================Login Information  End=====-->

        <div class="text-center padding-top-30 padding-bottom-30">
          <label  style="font-size:15px;font-weight:bold;">Personal Information</label>
</div>
<!-- Text input-->

<?php
$stmt = $db->prepare('SELECT * FROM clientcontactinformation WHERE clientID =:clientID');
$stmt->execute(array(':clientID' => $_SESSION["clientID"]));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$clientName = $row['clientName'];
$clientWebsite = $row['clientWebsite'];
$clientMobileNo  = $row['clientMobileNo'];
$clientContact2 = $row['clientContact2'];
$clientLandline = $row['clientLandline'];
$clientFaxNo = $row['clientFaxNo'];

$stmt = $db->prepare('SELECT * FROM clientaddress WHERE clientID =:clientID');
$stmt->execute(array(':clientID' => $_SESSION["clientID"]));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$clientStreetAddress = $row['clientStreetAddress'];
$countryID= $row['countryID'];
$stateID = $row['stateID'];
$zipCode = $row['zipCode'];
$cityID = $row['cityID'];

$stmt = $db->prepare('SELECT * FROM clientindustry WHERE clientID =:clientID');
$stmt->execute(array(':clientID' => $_SESSION["clientID"]));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$industryID = $row['industryID'];
$IndustrySublistID = $row['IndustrySublistID'];




?>
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Name<em class="em">*</em></label>
  <div class="col-md-4">
  <input id="clientName" name="clientName" type="text" value="<?php echo $clientName;?>" class="form-control input-sm" disabled>

  </div>
</div>

<!-- Text input-->




<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Country<em class="em">*</em></label>
  <div class="col-md-4">
  <select  name="countryID" id="countryID"  class="form-control"  onChange="getState(this.value);" disabled>
		<?php $q = $db->prepare("SELECT * FROM country where countryID = :countryID");
		$q->execute(array(':countryID' => $countryID));
		$r = $q->fetch(PDO::FETCH_ASSOC)
		?>
    <option value="<?php echo $r['countryID'];?>"><?php echo $r['countryName'];?></option>
    <?php
                              $q = $db->prepare("SELECT * FROM country");
                              $q->execute();
                              while($r = $q->fetch(PDO::FETCH_ASSOC))
                              {?>
                                <option value="<?php echo $r['countryID'];?>"><?php echo $r['countryName'];?></option>
                          <?php } ?>
  </select>

  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label lable" for="">State<em class="em">*</em></label>
  <div class="col-md-4">
  <select  class="form-control" id="state-list" name="stateID" onChange="getCity(this.value);" disabled >
		<?php $q = $db->prepare("SELECT * FROM state where stateID = :stateID");
		$q->execute(array(':stateID' => $stateID));
		$r = $q->fetch(PDO::FETCH_ASSOC)
		?>
    <option value="<?php echo $r['stateID'];?>"><?php echo $r['stateName'];?></option>
  </select>

  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label lable" for="">City<em class="em">*</em></label>
  <div class="col-md-4">
  <select  class="form-control" id="city-list"  disabled>
		<?php $q = $db->prepare("SELECT * FROM city where cityID = :cityID");
		$q->execute(array(':cityID' => $cityID));
		$r = $q->fetch(PDO::FETCH_ASSOC)
		?>
    <option value="<?php echo $r['cityID'];?>"><?php echo $r['cityName'];?></option>
  </select>

  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Zip Code</label>
  <div class="col-md-4">
   <input id="zipCode" name="zipCode" type="number" value="<?php echo $zipCode;?>"  class="form-control input-sm" disabled>

  </div>
</div>



<!------row details end-->


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Street Address</label>
  <div class="col-md-4">
  <textarea id="clientStreetAddress" name="clientStreetAddress" type="text"  class="form-control input-sm" disabled><?php echo $clientStreetAddress;?></textarea>

  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Website</label>
  <div class="col-md-4">
  <input id="clientWebsite" name="clientWebsite" type="text" value="<?php echo $clientWebsite;?>" class="form-control input-sm" disabled>

  </div>
</div>




<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Mobile No<em class="em">*</em></label>
  <div class="col-md-4">
  <input id="clientMobileNo" name="clientMobileNo" type="number" value="<?php echo $clientMobileNo;?>" class="form-control input-sm" disabled>

  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Landline No</label>
  <div class="col-md-4">
 <input id="clientLandline" name="clientLandline" type="number" value="<?php echo $clientLandline;?>" class="form-control input-sm" disabled>

  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Contact 2</label>
  <div class="col-md-4">
  <input id="clientContact2" name="clientContact2" type="number" value="<?php echo $clientContact2;?>" class="form-control input-sm" disabled>

  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Fax No</label>
  <div class="col-md-4">
 <input id="clientFaxNo" name="clientFaxNo" type="number" value="<?php echo $clientFaxNo;?>" class="form-control input-sm" disabled>

  </div>


  </div>



<hr ></hr>



<!--=====================client Profile  Start=====-->

<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Industry<em class="em">*</em></label>
  <div class="col-md-4">
  <select type="multiselect" class="form-control" id="industry" name ="industryID" onChange="getSubIndustry(this.value);" disabled>
		<?php $q = $db->prepare("SELECT * FROM industrylist where industryID = :industryID");
		$q->execute(array(':industryID' => $industryID));
		$r = $q->fetch(PDO::FETCH_ASSOC)
		?>
		<option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
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

<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Sub Industry</label>
  <div class="col-md-4">


  <select id="subIndustry" name="IndustrySublistID" value="<?php echo $clientName;?>" class="form-control" disabled>
		<?php $q = $db->prepare("SELECT * FROM industrysublist where IndustrySublistID = :IndustrySublistID");
		$q->execute(array(':IndustrySublistID' => $IndustrySublistID));
		$r = $q->fetch(PDO::FETCH_ASSOC)
		?>
		<option value="<?php echo $r['IndustrySublistID'];?>"><?php echo $r['subindustryName'];?></option>
  </select>
  </div>
</div>


<div class="text-center padding-top-10">

<button class="btn btn-warning btn-xs editclient">EDIT</button>
<button class="btn btn-success btn-xs saveclient" disabled>SAVE</button>


</div>





<!-- Text input-->

<!-- Text input-->



</div>
<!-- Multiple Checkboxes (inline) -->



</div>
</div>
        <div class="col-md-2">
        </div>

</fieldset>

</div>


    </div><!-- end of container -->

    </section>



    <!--================================client end==========================================-->




  </div>






<!--================================My Profile Section Ends=====================================-->




  <div class="tab-pane  active" id="tab_leads" role="tabpanel"><!--h6 class="text-center padding-top-30">Leads</h6-->

<div class="pull-right padding-top-10 padding-bottom-10">
<button class="btn-sm btn-primary pull-right" data-toggle="modal" data-target="#addlead" style="color:white;background-color: #0b3c5d;">POST LEAD</button>


<!-- Modal -->
<div class="modal fade" id="addlead" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Post Lead</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">

            <div class="row">


              <div class="col-md-12  col-xs-12 col-sm-12">

<form class="form-horizontal" action="addLeadclient.php" method="POST" enctype="multipart/form-data">
<fieldset>



<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label" for="radios">Select offer type</label>
  <div class="col-md-8 col-xs-8">
    <label class="radio-inline" for="radios-0">
      <input type="radio" name="offerType" id="radios-0" value="buy" checked="checked">
      Buy
    </label>

  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label" for="radios">Select</label>
  <div class="col-md-8 col-xs-8">
    <label class="radio-inline" for="radios-0">
      <input type="radio" name="selectType" id="radios-0" value="product" checked="checked">
      Product
    </label>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="selectType" id="radios-1" value="services">
      Services
    </label>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label" for="">Lead Name</label>
  <div class="col-md-6 col-xs-8">
  <input id="" name="leadName" type="text" placeholder="Lead Name" class="form-control input-md" required>

  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label" for="leaddescription">Lead Description</label>
  <div class="col-md-4 col-xs-8">
    <textarea class="form-control" id="leaddescription" cols="200"  name="leadDescription"></textarea>
  </div>
</div>
<hr>
<!-- File Button -->
<div class="row">

  <div class="col-md-3 col-sm-3 col-lg-3 col-xs-6 thumbnail" >
  <div class="figure">
                       <img  id="uploadPreviewc1" class="small-img-box" src="images\noimage.jpeg" alt="NO IMAGE" >
                         <label class="btn btn-xs btn-success leadslabel"><i class="fa fa-plus" aria-hidden="true"></i>ADD
                          <input type="file" id="fileName1" onchange="PreviewImagepl1();" name="fileName1"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" ></label>
                    </div>

  </div>


  <div class="col-md-3 col-sm-3 col-lg-3 col-xs-6 thumbnail" >
  <div class="figure">
                      <img  id="uploadPreviewc2" class="small-img-box" src="images/noimage.jpeg" alt="NO IMAGE" >

                             <label class="btn btn-xs btn-success leadslabel"><i class="fa fa-plus" aria-hidden="true"></i>ADD
                           <input type="file" id="fileName2" onchange="PreviewImagepl2();" name="fileName2"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" ></label>
                    </div>

  </div>
	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-6 thumbnail" >
  <div class="figure">
                       <img  id="uploadPreviewc3" class="small-img-box" src="images/noimage.jpeg" alt="NO IMAGE" >
                              <label class="btn btn-xs btn-success leadslabel"><i class="fa fa-plus" aria-hidden="true"></i>ADD
                          <input type="file" id="fileName3" onchange="PreviewImagepl3();" name="fileName3"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" ></label>
                    </div>

  </div>
	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-6 thumbnail" >
  <div class="figure">
                       <img  id="uploadPreviewc4" class="small-img-box" src="images/noimage.jpeg" alt="NO IMAGE" >
                         <label class="btn btn-xs btn-success leadslabel"><i class="fa fa-plus" aria-hidden="true"></i>ADD
                          <input type="file" id="fileName4" onchange="PreviewImagepl4();"  name="fileName4"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" ></label>
                    </div>

  </div>
  <label style="color:red;font-weight: bold;text-align: center;">*Image should be less than 2MB.</label>
  </div>
<hr>

<!-- Button -->
<div class="form-group">

  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 ">
    <center><button id="submit" name="submit" class="btn btn-success" style="color:white;background-color: #0b3c5d;">Submit</button></center>
  </div>
</div>

</fieldset>
</form>










              </div>



            </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
</div>







<div class="row padding-top-60">
  <div class="col-md-6  padding-top-10 ">
    <h6 style="text-align:center;" class=" bg-warning">Incoming Leads</h6>
    <ul class="nav nav-pills nav-justified">

    <li class="active bg-info"><a href="#tab_business_leads" data-toggle="pill" class="navheader">Business Leads</a></li>
    <li class="bg-info"><a href="#tab_client_leads" data-toggle="pill" class="navheader">Client Leads</a></li>
     </ul>


  <div class="tab-content" style="min-height:60%;">



   <!--================================Dashboard Section Start=====================================-->
  <div class="tab-pane active" id="tab_business_leads" role="tabpanel">

<?php include('includes/business-leads-client.php');?>



  </div>



  <div class="tab-pane " id="tab_client_leads" role="tabpanel">

<?php include('includes/client-leads-incoming-for-client.php');?>



  </div>
</div>






</div>
 <div class="col-md-6 padding-top-10  ">
  <h6 style="text-align:center;" class=" bg-warning">Outgoing Leads</h6>
  <?php include('includes/client-leads-outgoing.php');?>
</div>
</div>



  </div>





   <div class="tab-pane" id="tab_setting" role="tabpanel">

<div class="row padding-top-30">

<div class="col-md-8 col-md-offset-2 padding-top-30 padding-bottom-30 bg-white">
<h6 class="text-center padding-top-30 padding-bottom-30 strong col-black"> My Account Settings</h6>

<?php include('includes/client-setting.php');
		if(isset($_GET['action']))
		{
				$error = $_GET['action'];
				echo "<script type='text/javascript'>alert('$error');</script>";
		}
?>

</div>

</div>


   </div>




  </div>



</div>

</div>


		</div>

		<!--================================SOCIAL CAROUSEL SECTION==========================================-->


		<!--================================RATINGS===========================================-->



		<!--================================ FOOTER AREA ==========================================-->
		<?php include('includes/footer.php');?>


</body>
</html>
