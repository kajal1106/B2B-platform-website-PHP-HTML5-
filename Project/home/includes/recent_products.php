<section class="feature-section margin-top-30 margin-bottom-30">
			<div class="container"><!-- section container -->
				<div class="section-title-wrap margin-bottom-10"><!-- section title -->
					<h5 class="index-section-title">RECENT PRODUCTS</h5>

				</div><!-- section title end -->
			</div><!-- section container end -->
			<div class="container-fluid"><!-- section container -->
				<div class="feature-wrap">
					<ul class="feature-slider clearfix">

<?php

$stmtfetch = $db->prepare('SELECT porductinformation.productID, porductinformation.productName, productimage.imagePath, industrylist.industryName,porductinformation.businessID, businesscontactinformation.businessName,porductinformation.productOffer FROM porductinformation
	LEFT JOIN productimage ON porductinformation.productID = productimage.productID
	LEFT JOIN businessindustry ON porductinformation.businessID = businessindustry.businessID
	LEFT JOIN industrylist ON industrylist.industryID = (select industryID from businessindustry where porductinformation.businessID = businessindustry.businessID)
	LEFT JOIN businesscontactinformation ON porductinformation.businessID = businesscontactinformation.businessID
	group by productID DESC limit 10;');
$stmtfetch->execute();
while($row = $stmtfetch->fetch(PDO::FETCH_GROUP))
			{
				
				
													 try{
                           $results = $db->prepare("select * from prductwishlist where productID = :id and businessID =:bid ");
                           $results->bindParam(':id',$row[0],PDO::PARAM_INT);
                          $results->bindParam(':bid',$_SESSION['businessID'],PDO::PARAM_INT);
                           $results->execute();
                           }
                           catch (Exception $ex) {
                              //echo $ex;
                           echo $ex;
                           //  echo "failed";
                               
                           exit();
                           }
                        
                             $wish= $results->fetchALL(PDO::FETCH_BOTH);
									
									 if(isset($wish[0][0]) && !empty($wish[0][0])){
										 $ac = "activex";
										 
									 }
									 else {
										 $ac="";
										 
									 }
									
				

echo '
						<li class="item"><!-- .ITEM -->

							<div class="feature-item">
								<div class="figure thumbnail margin-bottom-0">
								';
								if($row[6]!="")
								{
										echo '<div class="ribbon"><span>'.$row[6].'%</span></div>';
								}

							echo '<a href="product-single-listing.php?pid='.$row[0].'"><img class="small-img-box" src="'.DIR.$row[2].'" alt="feature item"/></a>
											<div style=" position: absolute;top: 8px;left: 16px;">
														<i class="fa fa-heart push '.$ac.' fa-2x" id="'.$row[0].'" ></i>
													</div>
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
										<a href="product-single-listing.php?pid='.$row[0].'">'.$row[1].'</a>
									</div>
									<div class="feature-title single-line">
										<a class="col-orange">'.$row[3].'</a>
									</div>
									<div class="feature-title single-line">
										<a>'.$row[5].'</a>
									</div>


								</div>
							<div class="listing-border-bottom bgyallow-1"></div>
						</li><!-- /.ITEM -->';
}
		?>
	</ul>
	</div>
	</div>

	</section>
