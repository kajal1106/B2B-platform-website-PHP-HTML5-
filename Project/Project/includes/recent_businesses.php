<section class="feature-section margin-top-10">
			<div class="container"><!-- section container -->
				<div class="section-title-wrap "><!-- section title -->
					<h5 class="index-section-title">RECENT BUSINESSES</h5>

				</div><!-- section title end -->
			</div><!-- section container end -->

			<div class="container-fluid"><!-- section container -->
				<div class="feature-wrap">
					<ul class="feature-slider clearfix">
						<?php
						$stmtfetch = $db->prepare('SELECT business.businessID, businessprofile.companyName, industrylist.industryName, country.countryName,country.countryFlag, businesslogo.busienssLogoPath, businessprofile.isverified FROM business
							LEFT JOIN businesscontactinformation ON business.businessID = businesscontactinformation.businessID
							LEFT JOIN businesslogo ON business.businessID = businesslogo.businessID
							LEFT JOIN businessprofile ON business.businessID = businessprofile.businessID
							LEFT JOIN businessaddress ON business.businessID = businessaddress.businessID
							LEFT JOIN country ON country.countryID = (select countryID from businessaddress where business.businessID = businessaddress.businessID)
							LEFT JOIN businessindustry ON business.businessID = businessindustry.businessID
							LEFT JOIN industrylist ON industrylist.industryID = (select industryID from businessindustry where business.businessID = businessindustry.businessID)
							 WHERE isActive = :isActive ORDER BY business.businessID DESC limit 10;');
						$a ='Yes';
						$stmtfetch->execute(array(':isActive' => $a));
						while($row = $stmtfetch->fetch(PDO::FETCH_GROUP))
									{

					echo '<li class="item border"><!-- .ITEM -->
							<div class="feature-item ">
								<div class="figure thumbnail margin-bottom-0">
								<a href="business-single-listing.php?bid='.$row[0].'"><img class="small-img-box " src="'.DIR.$row[5].'" alt="feature item"/></a>
									<!--div class="feature-overlay">
										<div class="feature-overlay-inner rgba-bgyallow-1">
											<div class="overlay-content">
												<ul class="feature-links">
													<li><a class="bgwhite nohover" href="#"><i class="fa fa-heart green-1"></i></a></li>
													<li><a class="bgwhite nohover" href="single-listing.html"><i class="fa fa-shopping-cart blue-1"></i></a></li>
													<li><a class="bgwhite nohover" href="#"><i class="fa fa-share yallow-1"></i></a></li>
												</ul>
											</div>
										</div>
									</div-->
								</div>
								<div class="feature-content clearfix">
									<!--div class="feature-meta-cat">
										<a class="bgyallow-1" href="#"><i class="fa fa-suitcase white"></i></a>
									</div-->

									<div class="feature-title single-line ">
										<a href="business-single-listing.php?bid='.$row[0].'">'.$row[1].'</a>
									</div>

									<div class="feature-title single-line">
									<a class="col-orange">'.$row[2].'</a>
									</div>

									<div class="feature-location"><!-- location-->
									<img src="'.DIR.$row[4].'" style="display:inline;">&ensp;'.$row[3].'
									</div><!-- location end-->';
									if($row[6]=='Verify')
									{
										echo '<span class="label" style="background-color:#0b3c5d;"><i class="fa fa-check" aria-hidden="true"></i> VERIFIED</span>';
									}
									else
									{
										echo '<span class="label"> </span>';
									}

							echo	'</div>
							</div>

						</li><!-- /.ITEM -->';

							}
						?>
					</ul>

				</div>
			</div>

		</section>
