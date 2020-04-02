	<!--================================FEATURE LISTING SECTION==========================================-->
	<section class="feature-section ">
		<div class="container"><!-- section container -->
			<div class="section-title-wrap margin-bottom-10"><!-- section title -->
				<h6 class="index-section-title">Featured BUSINESSES</h6>



			</div><!-- section title end -->
		</div><!-- section container end -->
		<div class="container-fluid"><!-- section container -->
			<div class="feature-wrap">
				<ul class="feature-slider clearfix owl-carousel owl-theme owl-loaded owl-responsive-0">

					<?php
								$stmtfetch = $db->prepare('SELECT business.businessID, businessprofile.companyName, industrylist.industryName, businessprofile.status, country.countryName, country.countryFlag, businesslogo.busienssLogoPath, businessprofile.isverified FROM business
									LEFT JOIN businesscontactinformation ON business.businessID = businesscontactinformation.businessID
									LEFT JOIN businessprofile ON business.businessID = businessprofile.businessID
									LEFT JOIN businesslogo ON business.businessID = businesslogo.businessID
									LEFT JOIN businessaddress ON business.businessID = businessaddress.businessID
									LEFT JOIN country ON country.countryID = (select countryID from businessaddress where business.businessID = businessaddress.businessID)
									LEFT JOIN businessindustry ON business.businessID = businessindustry.businessID
									LEFT JOIN industrylist ON industrylist.industryID = (select industryID from businessindustry where business.businessID = businessindustry.businessID)
									 WHERE isActive = :isActive
									 and businessprofile.status =:status LIMIT 10');
								$a ='Yes';
								$b = 'FEATURED';
								$stmtfetch->execute(array(':isActive' => $a, ':status' => $b ));
								while($row = $stmtfetch->fetch(PDO::FETCH_GROUP))
								{
										echo '<li class="item "><!-- .ITEM -->
											<div class="feature-item ">
												<div class="figure thumbnail margin-bottom-0">
													<a  href="business-single-listing.php?bid='.$row[0].'"><img class="small-img-box" src="'.DIR.$row[6].'" alt="Image Not Available"/></a>

												</div>
												<div class="feature-content clearfix">

													<div class="feature-title single-line">
														<a  href="business-single-listing.php?bid='.$row[0].'">'.$row[1].'</a>
													</div>
													<div class="feature-title single-line" >
													<a class="col-orange">'.$row[2].'</a>
													</div>
													<div class="feature-location"><!-- location-->
													<img src="'.DIR.$row[5].'" style="display:inline;">&ensp;'.$row[4].'
													</div><!-- location end-->';
													if($row[7]=='Verify')
														{
															echo '<span class="label" style="background-color:#0b3c5d;"><i class="fa fa-check" aria-hidden="true"></i> VERIFIED</span>';

														}
														else
														{
															echo '<span class="label"> </span>';
														}

												echo '<span class="label" style="background-color:#0b3c5d;margin-left:1rem;"><i class="fa fa-check" aria-hidden="true"></i> FEATURED</span></div>
											</div>
											<div class="listing-border-bottom bgyallow-1"></div>

										</li><!-- /.ITEM -->';
									}
				?>
				</ul>
			</div>
		</div>
	</section>
