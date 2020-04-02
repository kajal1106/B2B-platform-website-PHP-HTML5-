<div class="row padding-top-70"><!-- row -->
					<div class="col-md-12 col-sm-12 col-xs-12 main-wrap"><!-- content area column -->
						<div class="blog-section padding-bottom-1">
							<div class="entry-wrap shadow-1"><!-- blog entry -->
								<?php
										$bid=$_GET['bid'];
										$stmtfetch = $db->prepare('SELECT * FROM businesslogo WHERE businessID = :businessID');
										$stmtfetch->execute(array(':businessID' => $bid ));
										$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
										$businessLogoPath = $row['busienssLogoPath'];
								?>
								<div class="entry-content row ">
								<div class="entry-figure col-md-2 col-sm-2  col-lg-2 col-xs-12   ">
									<img class="business-logo image-rounded img-responsive  thumbnail " style="margin:0% auto;" src="<?php echo DIR.$businessLogoPath;?>" alt="IMAGE NOT AVAILABLE">
									</div>
								<div class="col-md-10 col-sm-10 col-lg-10 col-xs-12">
									<div class="row ">

											<div class="col-md-12 pull-left col-xs-12">
											<?php
													$stmtfetch = $db->prepare('SELECT companyName FROM businessprofile WHERE businessID = :businessID');
												$stmtfetch->execute(array(':businessID' => $bid));
													$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
													$businessName = $row['companyName'];

											?>
										<h6 style="text-transform: uppercase;width:100%;" class="pull-left business-section-title"><?php echo $businessName;?></h6>

										</div>


									</div>

									<div class="row">
									<div class="col-md-5 col-sm-5 col-lg-5 col-xs-12">



										<?php
										$stmtfetch = $db->prepare('SELECT * FROM country WHERE countryID = (select countryID from businessaddress where businessID = :businessID)');
										$stmtfetch->execute(array(':businessID' => $bid));
										$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
										$countryName = $row['countryName'];
										?>
									<span class="label  capitalize" style="color:black;">Country : <b> <?php echo $countryName; ?></b></span><br>

									<?php
											$stmtfetch = $db->prepare('SELECT * FROM businessprofile WHERE businessID = :businessID');
										$stmtfetch->execute(array(':businessID' => $bid));
											$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
											$isSampleProvide = $row['isSampleProvide'];
											$levelToExpand = $row['levelToExpand'];
											$businessOffer = $row['businessOffer'];
											$status = $row['status'];
											$isverify = $row['isverified'];

									?>
									<span class="label  capitalize" style="color:black;">Expanding Level : <b><?php echo $levelToExpand;?></b></span><br>
									<span class="label  capitalize" style="color:black;">Company Type:
									<?php $stmtfetch = $db->prepare('SELECT * FROM businesstype WHERE businessID = :businessID');
									$stmtfetch->execute(array(':businessID' => $bid));

									while($row1 = $stmtfetch->fetch(PDO::FETCH_ASSOC))
									{?>
								 <b><?php echo $row1['busienssTypeName'];?></b>,
									<?php } ?>
									</span><br>
									<?php
										if($isverify == "Verify")
										{
											echo '<span class="label  capitalize" style="color:black;">Verified:<b>Yes</b>		</span>';
										}else {
												echo '<span class="label  capitalize" style="color:black;">Verified:<b>No</b>		</span>';
										}
									?>

									</div>
									<div class="col-md-5 col-sm-5 col-lg-5 col-xs-12 pull-left ">

									<span class="label  capitalize" style="color:black;">Provides Sample : <b><?php echo $isSampleProvide;?></b> </span><br>

										<span class="label  capitalize" style="color:black;">Firm Type:<b> <?php echo $row['firmTypeName']; ?></b>		</span><br>
										<span class="label  capitalize" style="color:black;">Establishment Year:<b> <?php echo $row['establishmentYear']; ?></b>		</span><br>
										<?php
											if($status == "FEATURED")
											{
												echo '<span class="label  capitalize" style="color:black;">Featured:<b> Yes</b>		</span>';
											}else {
												echo '<span class="label  capitalize" style="color:black;">Featured:<b> No</b>		</span>';
											}
										?>


									</div>


									<div class="col-md-2 col-sm-2 col-lg-2 col-xs-12 pull-left ">
										<label class="col-red pull-right" style="font-size:0.8rem;font-weight:bold;" data-toggle="modal" data-target="#error_modal">Report Error</label><br>
									<!--MODAL FOR REPORT ERROR-->
									<!-- Modal -->
<form class="form-horizontal" action="includes/error_reoprt.php" method="post">
<div class="modal fade" id="error_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<fieldset>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Problem Type</label>
  <div class="col-md-8">
    <select id="selectbasic" name="selectbasic" class="form-control">
     <option value="business_has_moved_location">Business has moved location</option>
      <option value="website/phone_is_not_working">Website/phone is not working</option>
      <option value="inaccurate_business_information">Inaccurate business information</option>
      <option value="business_no_longer_operates">Business no longer operates</option>
       <option value="report_abuse_about_this_company">Report abuse about this company</option>
      <option value="other">Other</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="message">Message</label>
  <div class="col-md-8">
    <textarea class="form-control" id="message" name="message"></textarea>
  </div>
</div>


<div class="form-group">
 <label class="col-md-4 control-label" for="message">Name</label>
  <div class="col-md-8 ">
  <input id="" name="name" type="text" placeholder="Name" class="form-control input-sm" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="message">Email</label>
  <div class="col-md-8">
  <input id="" name="email" type="email" placeholder="Email" class="form-control input-sm" required="">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="message">Mobile No</label>
<div class="col-md-8">
  <input id="" name="mobile" type="number" placeholder="Mobile No" class="form-control input-sm" required="">

  </div>
</div>


</fieldset>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" type="submit" class="btn btn-primary">Send</button>
      </div>

    </div>
  </div>
</div>
 </form>
<!--Report Error modal-->
									<h4><span class="label " style="color:black;">Offer</span></h4>
									<h4><span class="label capitalize " style="color:black;"><b><?php echo $businessOffer;?></b></span></h4>
									</div>
									</div>



									<div class="row">
										<div class="col-md-5 col-lg-5  col-sm-5 col-xs-12">


												<?php
														$stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM businessindustry WHERE businessID = :businessID)");
													$stmtfetch->execute(array(':businessID' => $bid));
														$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
														$industryName = $row['industryName'];

												?>



<span class="label capitalize" style="color:black;">Industry Type:<b> <?php echo $industryName;?></b>		</span><br>

							</div>
							<div class="col-md-5  col-lg-5 col-sm-5 col-xs-12">


												<?php
														$stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM businessindustry WHERE businessID = :businessID)");
													$stmtfetch->execute(array(':businessID' => $bid));
														$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
														$industryName = $row['industryName'];

												?>



<span class="label capitalize" style="color:black;">Sub Industry Type:<b> <?php echo $industryName;?></b>		</span><br>

							</div>


									</div>


								</div>



								</div>

							</div><!-- blog entry end -->

						</div>
					</div>
				</div>
