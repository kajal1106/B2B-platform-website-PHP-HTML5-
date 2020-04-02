<?php
  include('includes/config.php');
  $id=$_POST['id'];
?>
<div class="row">
                <div class="col-md-12">

                <div class="form-horizontal"  enctype="multipart/form-data">
                    <fieldset>
                <div class="row">
                <!--=====================Login Information  End=====-->

<div class="col-md-10">

                    <h6 class="text-center smallheading padding-top-5 padding-bottom-5">Contact Information</h6>
</div>
<br>
<!-- Text input-->

<?php
    $stmtfetch = $db->prepare('select * from businesscontactinformation where businessID = :businessID');
  $stmtfetch->execute(array(':businessID' => $id));
    $row1 = $stmtfetch->fetch(PDO::FETCH_ASSOC);
?>
<div class="col-md-8">
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Name<!--em class="em">*</em--></label>
  <div class="col-md-8">
  <input id="businessName" name="businessName" type="text" value="<?php echo $row1['businessName']?>" placeholder="Name" class="form-control input-sm" disabled>

  </div>
</div>
</div>


<?php
			$stmtfetch = $db->prepare('SELECT * FROM businesssalesperson WHERE businessID = :businessID');
			$stmtfetch->execute(array(':businessID' => $id));
			$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
			$busienssPersonName = $row['busienssPersonName'];
			$busienssPersonEmail = $row['busienssPersonEmail'];
			$busienssPersonContact = $row['busienssPersonContact'];
?>


<!---left column-->
<div class="col-md-5">
        <h6 class="text-center small-label-size-form padding-top-5 padding-bottom-5"> Sales</h6>
        <br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Name<em class="em">*</em></label>
  <div class="col-md-8">
  <input id="busiensssalesPersonName" name="busienssSalesPersonName" value="<?php echo $busienssPersonName;?>" type="text" placeholder="Name" class="form-control input-sm" disabled>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-envelope" aria-hidden="true"></i> Email<em class="em">*</em></label>
  <div class="col-md-8">
  <input id="busiensssalesPersonEmail" name="busienssSalesPersonEmail" value="<?php echo $busienssPersonEmail;?>" type="email" placeholder="Email" class="form-control input-sm" disabled>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-mobile" aria-hidden="true"></i> Contact No<em class="em">*</em></label>
  <div class="col-md-8">
  <input id="busiensssalesPersonContact" name="busienssSalesPersonContact" value="<?php echo $busienssPersonContact;?>" type="text" placeholder="[Country Code] [Area Code] [Contact]" class="form-control input-sm" disabled>

  </div>
</div>
</div>

<?php
			$stmtfetch = $db->prepare('SELECT * FROM businesssupportperson WHERE businessID = :businessID');
			$stmtfetch->execute(array(':businessID' => $id));
			$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
			$busienssPersonName = $row['busienssPersonName'];
			$busienssPersonEmail = $row['busienssPersonEmail'];
			$busienssPersonContact = $row['busienssPersonContact'];
?>

<div class="col-md-5">
<!---Right column-->

    <h6 class="text-center small-label-size-form padding-top-5 padding-bottom-5"> Support</h6>
    <br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Name<em class="em">*</em></label>
  <div class="col-md-8">
  <input id="busienssSupportPersonName" name="busienssSupportPersonName" type="text" value="<?php echo $busienssPersonName;?>" placeholder="Name" class="form-control input-sm" disabled>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Email<em class="em">*</em></label>
  <div class="col-md-8">
  <input id="busienssSupportPersonEmail" name="busienssSupportPersonEmail" type="email" value="<?php echo $busienssPersonEmail;?>" placeholder="Email" class="form-control input-sm" disabled>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Contact No<em class="em">*</em></label>
  <div class="col-md-8">
  <input id="busienssSupportPersonContact" name="busienssSupportPersonContact" type="text" value="<?php echo $busienssPersonContact;?>" placeholder="[Country Code] [Area Code] [Contact]" class="form-control input-sm" disabled>

  </div>
</div>

</div>



<!-- Text input-->



<div class="col-md-5">
<div class="form-group">
  <?php
      $stmtfetch = $db->prepare('SELECT * FROM country WHERE countryID = (select countryID from businessaddress where businessID = :businessID)');
    $stmtfetch->execute(array(':businessID' => $id));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $countryName = $row['countryName'];
  ?>
  <label class="col-md-4 control-label lable" for="">Country<em class="em">*</em></label>
  <div class="col-md-8">
  <input type="text"  name="countryID" id="countryID" value ="<?php echo $countryName;?>" class="form-control"   disabled>

  </div>
</div>
</div>
<?php
    $stmtfetch = $db->prepare('SELECT * FROM state WHERE stateID = (select stateID from businessaddress where businessID = :businessID)');
  $stmtfetch->execute(array(':businessID' => $id));
    $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
    $stateName = $row['stateName'];
?>
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">State<em class="em">*</em></label>
  <div class="col-md-8">
  <input type="text"  class="form-control" id="state-list" value="<?php echo $stateName?>" name="stateID" disabled>


  </div>
</div>
</div>

<?php
    $stmtfetch = $db->prepare('SELECT * FROM city WHERE cityID = (select cityID from businessaddress where businessID = :businessID)');
  $stmtfetch->execute(array(':businessID' => $id));
    $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
    $cityName = $row['cityName'];
?>

<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">City<em class="em">*</em></label>
  <div class="col-md-8">
  <input  class="form-control" id="city-list" value="<?php echo $cityName?>" name="cityID" disabled>

  </div>
</div>
</div>
<?php
    $stmtfetch = $db->prepare('select * from businessaddress where businessID = :businessID');
  $stmtfetch->execute(array(':businessID' => $id));
    $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
?>
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Zip Code</label>
  <div class="col-md-8">
   <input id="zipCode" name="zipCode" value="<?php echo $row['zipCode'];?>" type="number" placeholder="Zip Code" class="form-control input-sm" disabled>

  </div>
</div>
</div>



<!------row details end-->


<!-- Text input-->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Street Address</label>
  <div class="col-md-8">
  <textarea id="businessStreetAddress" name="businessStreetAddress" type="text" placeholder="Enter your street address here" class="form-control input-sm" disabled><?php echo $row['businessStreetAddress'];?></textarea>

  </div>
</div>
</div>

<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Website</label>
  <div class="col-md-8">
  <input id="businessWebsite" name="businessWebsite" value="<?php echo $row1['businessWebsite'];?>" type="text" placeholder="Website" class="form-control input-sm" disabled>

  </div>
</div>
</div>




<!-- Text input-->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Mobile No<em class="em">*</em></label>
  <div class="col-md-8">
  <input id="businessMobileNo" name="businessMobileNo" value="<?php echo $row1['businessMobileNo'];?>" type="number" placeholder="[Country Code] [Area Code] [Contact]" class="form-control input-sm" disabled>

  </div>
  </div>
</div>
<!-- Text input-->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Landline No</label>
  <div class="col-md-8">
 <input id="businessLandline" name="businessLandline" type="number" value="<?php echo $row1['businessContact2'];?>" placeholder="[Country Code] [Area Code] [Contact]" class="form-control input-sm" disabled>

  </div>
  </div>
</div>



<!-- Text input-->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Contact 2</label>
  <div class="col-md-8">
  <input id="businessContact2" name="businessContact2" type="number" value="<?php echo $row1['businessLandline'];?>" placeholder="[Country Code] [Area Code] [Contact]" class="form-control input-sm" disabled>

  </div>
</div>
</div>
<!-- Text input-->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Fax No</label>
  <div class="col-md-8">
 <input id="businessFaxNo" name="businessFaxNo" type="number" value="<?php echo $row1['businessFaxNo'];?>" placeholder="[Country Code] [Area Code] [Contact]" class="form-control input-sm" disabled>

  </div>
  </div>


    </div>







<!--=====================Business Profile  Start=====-->

<div class="col-md-10">
  <?php
      $stmtfetch = $db->prepare('SELECT * FROM businesslogo WHERE businessID = :businessID');
      $stmtfetch->execute(array(':businessID' => $_POST['id']));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
      $businessLogoPath = $row['busienssLogoPath'];
  ?>
                    <h6 class="text-center smallheading padding-top-5 padding-bottom-5">Business Profile</h6>
                   <div class="text-center">
                   <div class="profilepic">
                     <img class="img-box profilepic img-thumbnail" style="margin-bottom:1%;" src="<?php echo DIR.$businessLogoPath;?>">
                   </div>

                           <button type= "button" id="<?php echo $_POST['id'];?>" class="btn btn-xs btn-danger" onclick="deletelogo(this.id)" ><i class="fa fa-times"></i></button>
                           <!-- <input type="button" value="delete" id="<?php?>" class="logo1" > -->
                    </div><br>


                    </div>
                    </br>
                    <?php
                        $stmtfetch = $db->prepare('select * from businessprofile where businessID = :businessID');
                      $stmtfetch->execute(array(':businessID' => $id));
                        $profile = $stmtfetch->fetch(PDO::FETCH_ASSOC);
                    ?>
<div class="col-md-5">
    <div class="form-group">
            <label class="col-md-4 control-label lable" for="">Company Name<em class="em">*</em></label>
                 <div class="col-md-8">
             <input id="companyName" name="companyName" type="text" value="<?php echo $profile['companyName'];?>" placeholder="Company Name" class="form-control input-sm" disabled>

                 </div>
    </div>
    </div>
<!--div class="col-md-5">
    <div class="form-group">
            <label class="col-md-4 control-label lable" for="">Company Logo</label>
                 <div class="col-md-8">
             <input id="busienssLogoPath" name="busienssLogoPath" type="file" accept="image/x-png,image/gif,image/jpeg" placeholder="Company Name" class="form-control input-sm" disabled>

                 </div>
    </div>
    </div-->

    <!-- Multiple Checkboxes -->
    <div class="col-md-5">
<div class="form-inline">
  <label class="col-md-4 control-label lable" for="">Company Type<em class="em">*</em></label>
  <div class="col-md-8">
    <?php
        $stmtfetch = $db->prepare('select * from businesstype where businessID = :businessID');
      $stmtfetch->execute(array(':businessID' => $id));
        while($type = $stmtfetch->fetch(PDO::FETCH_ASSOC))
        {
              ?>
  <div class="checkbox">
    <label for="-0">
      <input type="checkbox" name="busienssTypeName[]" id="-0" value="Manufacturer" checked disabled>
      <?php echo $type['busienssTypeName'];?>
    </label>
    </div>
    <?php } ?>

  </div>
</div>
</div>

<?php
    $stmtfetch = $db->prepare('SELECT * FROM industrylist WHERE industryID = (select industryID from industrysubtype where businessID = :businessID)');
  $stmtfetch->execute(array(':businessID' => $id));
    $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
    $name = $row['industryName'];
?>
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Industry<em class="em">*</em></label>
  <div class="col-md-8">
  <input type="text" class="form-control" id="industry" value="<?php echo $name;?>" name ="industryID"  disabled>

  </div>
</div>
</div>
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Sub Industry</label>
  <div class="col-md-8">
    <?php
        $stmtfetch = $db->prepare('SELECT * FROM industrysublist WHERE IndustrySublistID = (select IndustrySublistID from industrysubtype where businessID = :businessID)');
      $stmtfetch->execute(array(':businessID' => $id));
        $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
        $name = $row['subindustryName'];
    ?>

  <input type="text" id="subIndustry" name="IndustrySublistID" value ="<?php echo $name;?>" class="form-control" disabled>

  </div>
</div>
</div>





<!-- Text input-->

<!-- Text input-->
<!-- Select Basic -->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Firm Type<em class="em">*</em></label>
  <div class="col-md-8">
    <input id="" name="firmTypeName" class="form-control" value="<?php echo $profile['firmTypeName'];?>" disabled>

  </div>
</div>
</div>




<!-- Text input-->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Establishment Year</label>
  <div class="col-md-8">
  <input id="establishmentYear" name="establishmentYear" type="text" placeholder="Establishment Year" value="<?php echo $profile['establishmentYear'];?>" class="form-control input-sm" disabled>

  </div>
</div>
</div>
<!-- Select Basic -->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Level to Expand</label>
  <div class="col-md-8">
    <input  type="text" id="" name="levelToExpand" value="<?php echo $profile['levelToExpand'];?>" class="form-control" disabled>

  </div>
</div>
</div>





<!-- Textarea -->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Product / Service</label>
  <div class="col-md-8">
    <textarea class="form-control" id="ProductAndServices" value="<?php echo $profile['ProductAndServices'];?>" name="ProductAndServices" disabled>Product/Service</textarea>
  </div>
</div>
</div>

<!-- Multiple Radios (inline) -->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="sample">Sample Provide</label>
  <div class="col-md-8">
    <label class="radio-inline" for="sample-0"><?php echo $profile['isSampleProvide'];?></lable>
  </div>
</div>
</div>




<!-- Textarea -->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">About Company</label>
  <div class="col-md-8">
    <textarea class="form-control" id="about" value="<?php echo $profile['aboutCompany'];?>" name="aboutCompany" disabled>About Your Company</textarea>
  </div>
</div>

</div>
<!-- Multiple Checkboxes (inline) -->



</div>

</fieldset>
</form>
</div>
</div>


        <!-- end of container -->
