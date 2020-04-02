<?php
  include('includes/config.php');

?>
<div class="row">

        <div class="col-md-12">


        <div class="form-horizontal">
          <fieldset>

        <div class="row">

        <!--=====================Login Information  End=====-->


<!-- Text input-->
<?php
$stmt = $db->prepare('SELECT * FROM clientcontactinformation WHERE clientID =:clientID');
$stmt->execute(array(':clientID' => $_POST['id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$clientName = $row['clientName'];
$clientWebsite = $row['clientWebsite'];
$clientMobileNo  = $row['clientMobileNo'];
$clientContact2 = $row['clientContact2'];
$clientLandline = $row['clientLandline'];
$clientFaxNo = $row['clientFaxNo'];

$stmt = $db->prepare('SELECT * FROM clientaddress WHERE clientID =:clientID');
$stmt->execute(array(':clientID' => $_POST['id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$clientStreetAddress = $row['clientStreetAddress'];
$countryID= $row['countryID'];
$stateID = $row['stateID'];
$zipCode = $row['zipCode'];
$cityID = $row['cityID'];

$stmt = $db->prepare('SELECT * FROM clientindustry WHERE clientID =:clientID');
$stmt->execute(array(':clientID' => $_POST['id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$industryID = $row['industryID'];
$IndustrySublistID = $row['IndustrySublistID'];

?>

<div class="form-group">
  <label class="col-md-3 col-lg-3  col-sm-3 col-xs-3  control-label lable" for=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Name<em class="em">*</em></label>
  <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
  <input id="clientName" name="clientName" type="text" value="<?php echo $clientName;?>" class="form-control input-sm" disabled>

  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-3 col-lg-3  col-sm-3 col-xs-3 control-label lable" for="">Country<em class="em">*</em></label>
  <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
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
  <label class="col-md-3 col-lg-3  col-sm-3 col-xs-3 control-label lable" for="">State<em class="em">*</em></label>
  <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
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

  <label class="col-md-3 col-lg-3  col-sm-3 col-xs-3 control-label lable" for="">City<em class="em">*</em></label>
  <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
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
  <label class="col-md-3 col-lg-3  col-sm-3 col-xs-3 control-label lable" for="">Zip Code</label>
  <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
   <input id="zipCode" name="zipCode" type="number" value="<?php echo $zipCode;?>"  class="form-control input-sm" disabled>

  </div>
</div>



<!------row details end-->


<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 col-lg-3  col-sm-3 col-xs-3 control-label lable" for="">Street Address</label>
  <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
  <textarea id="clientStreetAddress" name="clientStreetAddress" type="text"  class="form-control input-sm" disabled><?php echo $clientStreetAddress;?></textarea>

  </div>
</div>
<div class="form-group">
  <label class="col-md-3 col-lg-3  col-sm-3 col-xs-3 control-label lable" for="">Website</label>
  <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
  <input id="clientWebsite" name="clientWebsite" type="text" value="<?php echo $clientWebsite;?>" class="form-control input-sm" disabled>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 col-lg-3  col-sm-3 col-xs-3 control-label lable" for="">Mobile No<em class="em">*</em></label>
  <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
  <input id="clientMobileNo" name="clientMobileNo" type="number" value="<?php echo $clientMobileNo;?>" class="form-control input-sm" disabled>

  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 col-lg-3  col-sm-3 col-xs-3 control-label lable" for="">Landline No</label>
  <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
 <input id="clientLandline" name="clientLandline" type="number" value="<?php echo $clientLandline;?>" class="form-control input-sm" disabled>

  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 col-lg-3  col-sm-3 col-xs-3 control-label lable" for="">Contact 2</label>
  <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
  <input id="clientContact2" name="clientContact2" type="number" value="<?php echo $clientContact2;?>" class="form-control input-sm" disabled>

  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 col-lg-3  col-sm-3 col-xs-3 control-label lable" for="">Fax No</label>
  <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
 <input id="clientFaxNo" name="clientFaxNo" type="number" value="<?php echo $clientFaxNo;?>" class="form-control input-sm" disabled>

  </div>


  </div>



<hr ></hr>



<!--=====================client Profile  Start=====-->

<div class="form-group">
  <label class="col-md-3 col-lg-3  col-sm-3 col-xs-3 control-label lable" for="">Industry<em class="em">*</em></label>
  <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
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
  <label class="col-md-3 col-lg-3  col-sm-3 col-xs-3 control-label lable" for="">Sub Industry</label>
  <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
    <select id="subIndustry" name="IndustrySublistID" value="<?php echo $clientName;?>" class="form-control" disabled>
  		<?php $q = $db->prepare("SELECT * FROM industrysublist where IndustrySublistID = :IndustrySublistID");
  		$q->execute(array(':IndustrySublistID' => $IndustrySublistID));
  		$r = $q->fetch(PDO::FETCH_ASSOC)
  		?>
  		<option value="<?php echo $r['IndustrySublistID'];?>"><?php echo $r['subindustryName'];?></option>
    </select>
  </div>
</div>

<!-- Text input-->

<!-- Text input-->
</div>
<!-- Multiple Checkboxes (inline) -->

</div>
</div>


</fieldset>

</div>
