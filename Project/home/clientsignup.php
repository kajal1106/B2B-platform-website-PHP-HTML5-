<!--================================client==========================================-->
		<section class="aside-layout-section padding-top-100 padding-bottom-70">
		<div class="container bg-white padding-top-10 padding-bottom-30">



			<div class="row">

				<div class="col-md-10">


				<form class="form-horizontal" action = "signupform.php" method="POST" enctype="multipart/form-data">
					<fieldset>

				<div class="row">
					<h6 class="text-center">Login Information</h6>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-envelope" aria-hidden="true"></i> Email<em class="em">*</em></label>
  <div class="col-md-4">
  <input id="businessEmail" name="businessEmail" type="email" placeholder="Email" class="form-control input-sm">

  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-key" aria-hidden="true"></i> Password<em class="em">*</em></label>
  <div class="col-md-4">
  <input id="password" name="password" type="Password" placeholder="Password" class="form-control  input-sm">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-key" aria-hidden="true"></i> Re-Enter Password<em class="em">*</em></label>
  <div class="col-md-4">
  <input id="passwordConfirm" name="passwordConfirm" type="Password" placeholder="Password" class="form-control input-sm">

  </div>
</div>
<hr ></hr>
				

				<!--=====================Login Information  End=====-->

				
					<h6 class="text-center">Contact Information</h6>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Name<em class="em">*</em></label>
  <div class="col-md-4">
  <input id="businessName" name="businessName" type="text" placeholder="Name" class="form-control input-sm">

  </div>
</div>

<!-- Text input-->




<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Country<em class="em">*</em></label>
  <div class="col-md-4">
  <select  name="countryID" id="countryID"  class="form-control"  onChange="getState(this.value);" >
		<option>Country</option>
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
  <select  class="form-control" id="state-list" name="stateID" onChange="getCity(this.value);" > <option>State</option>
  </select>

  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label lable" for="">City<em class="em">*</em></label>
  <div class="col-md-4">
  <select  class="form-control" id="city-list" name="cityID"> <option>City</option>
  </select>

  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Zip Code</label>
  <div class="col-md-4">
   <input id="zipCode" name="zipCode" type="number" placeholder="Zip Code" class="form-control input-sm">

  </div>
</div>



<!------row details end-->


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Street Address</label>
  <div class="col-md-4">
  <textarea id="businessStreetAddress" name="businessStreetAddress" type="text" placeholder="Enter your street address here" class="form-control input-sm"></textarea>

  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Website</label>
  <div class="col-md-4">
  <input id="businessWebsite" name="businessWebsite" type="text" placeholder="Website" class="form-control input-sm">

  </div>
</div>


	

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Mobile No<em class="em">*</em></label>
  <div class="col-md-4">
  <input id="businessMobileNo" name="businessMobileNo" type="number" placeholder="Mobile No" class="form-control input-sm">

  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Landline No</label>
  <div class="col-md-4">
 <input id="businessLandline" name="businessLandline" type="number" placeholder="Landline No" class="form-control input-sm">

  </div>
</div>

	
	
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Contact 2</label>
  <div class="col-md-4">
  <input id="businessContact2" name="businessContact2" type="number" placeholder="Mobile No" class="form-control input-sm">

  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Fax No</label>
  <div class="col-md-4">
 <input id="businessFaxNo" name="businessFaxNo" type="number" placeholder="Landline No" class="form-control input-sm">

  </div>


	</div>



<hr ></hr>



<!--=====================Business Profile  Start=====-->

				
					

	
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Industry<em class="em">*</em></label>
  <div class="col-md-4">
  <select type="multiselect" class="form-control" id="industry" name ="industryID" onChange="getSubIndustry(this.value);" >
		<option>Industry</option>
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


  <select id="subIndustry" name="IndustrySublistID" class="form-control" >
		<option>Sub Industry</option>

  </select>
  </div>
</div>
				


	

<!-- Text input-->

<!-- Text input-->



</div>
<!-- Multiple Checkboxes (inline) -->
<div class="form-group">


  <div class="col-md-4  col-md-offset-4">
    <label class="checkbox-inline" for="checkboxes-0">
      <input type="checkbox" name="checkboxes" id="checkboxes-0" value="yes">
   I agree Terms and Conditions <em class="em">*</em>
    </label>

  </div>
</div>

<!-- Button -->
<div class="form-group text-center">
  <label class="col-md-4 control-label lable" for="submit"></label>
  <div class="col-md-4">
    <button type="submit" id="submit" name="submit" class="btn btn-primary">Create Profile</button>
  </div>
</div>

</div>
				<div class="col-md-3">
				</div>

</fieldset>
</form>
</div>
</div>


		</div><!-- end of container -->

		</section>
		
		
		
		<!--================================client end==========================================-->