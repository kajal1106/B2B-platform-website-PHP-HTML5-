<?php
$query='SELECT DISTINCT business.businessID, businessprofile.companyName, industrylist.industryName, businessprofile.aboutCompany, country.countryName, country.countryFlag, businesslogo.busienssLogoPath, businessprofile.levelToExpand, businessprofile.status, businessprofile.isverified FROM business
  LEFT JOIN businesscontactinformation ON business.businessID = businesscontactinformation.businessID
  LEFT JOIN businessprofile ON business.businessID = businessprofile.businessID
  LEFT JOIN businesslogo ON business.businessID = businesslogo.businessID
  LEFT JOIN businesstype ON business.businessID = businesstype.businessID
  LEFT JOIN businessaddress ON business.businessID = businessaddress.businessID
  LEFT JOIN country ON country.countryID = (select countryID from businessaddress where businessaddress.businessID= business.businessID)
  LEFT JOIN businessindustry ON business.businessID = businessindustry.businessID
  LEFT JOIN industrylist ON industrylist.industryID = (select industryID from businessindustry where businessindustry.businessID = business.businessID)
  LEFT JOIN industrysubtype ON business.businessID = industrysubtype.businessID
  LEFT JOIN industrysublist ON industrysubtype.IndustrySublistID = (select IndustrySublistID from industrysubtype where industrysubtype.businessID = business.businessID)
   WHERE isActive = "Yes"';
            if(!empty($industry)){
						  $industrydata =implode("','",$industry);
						  $query  .= " and businessindustry.industryID in('$industrydata')";
					  }

					   if(!empty($country)){
						  $countrydata =implode("','",$country);
						  $query  .= " and businessaddress.countryID in('$countrydata')";
					  }

					  if(!empty($type)){
						  $typedata =implode("','",$type);
						  $query  .= " and businesstype.busienssTypeName in('$typedata')";
					  }
            if(!empty($subindustry)){
						  $subindustrydata =implode("','",$subindustry);
						  $query  .= " and industrysubtype.IndustrySublistID in('$subindustrydata')";
					  }

$stmtfetch = $db->prepare($query);
$a ='Yes';
$stmtfetch->execute();
while($row = $stmtfetch->fetch(PDO::FETCH_GROUP))
{
echo '<div class="entry-wrap shadow-1"><!-- blog entry -->

								<div class="entry-content row ">

								<div class="entry-figure col-md-2 col-lg-2 col-sm-2  col-xs-12">
									<a class="" href="business-single-listing.php?bid='.$row[0].'"><img class="business-logo thumbnail  img-responsive image-rounded padding-15" style="margin:0% auto;" src=" '.DIR.$row[6].' " alt="IMG NOT AVAILABLE" ></a>
								</div>
								<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" >

									<div class="entry-title">
										<a class="" href="business-single-listing.php?bid='.$row[0].'"><h6 class="business-title ">'.$row[1].'</h6></a>


									</div>

									<div class="entry-disc">
										<p class="col-black twolines" style="text-align:justify;">
										'.$row[3].'
										</p>
										<div class=" pull-right">
										<a class="white bgblue-1 " href="business-single-listing.php?bid='.$row[0].'">Read More</a>
									</div>
									</div>



								</div>


									<div class="entry-metas col-md-12 col-lg-12 col-sm-12 col-xs-12">
									<hr>
										<ul>

											<li class="capitalize  col-black strong"><img src="'.DIR.$row[5].'" style="display:inline;">&ensp;'.$row[4].'</li>


											<li class="capitalize inline col-black strong"><i class="fa fa-user green-1"></i>Expand Level: '.$row[7].'</li>
											<li class="capitalize inline col-black strong"><i class="fa fa-user green-1"></i>Industry: '.$row[2].'</li>';
											if($row[8]=="FEATURED")
											{

											echo '<li class="capitalize  inline col-black strong"><label class="label" style="background-color:orange;">FEATURED</label></li>';}
											if($row[9]=="Verify")
											{
											echo '<li class="capitalize  inline col-black strong"><label class="label" style="background-color:#0b3c5d;"><i class="fa fa-check" aria-hidden="true"></i>  VERIFIED</label></li>';}

										echo '</ul>



							</div>


						</div>


							</div><!-- blog entry end -->';
						}
							?>
