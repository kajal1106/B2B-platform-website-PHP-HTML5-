


<?php

$pagetitle="Wishlist";

include('includes/config.php');
include('includes/head.php');




?>
<body>


	<div class="theme-wrap clearfix">
		<!--================================responsive log and menu==========================================-->
		
		<!--================================HEADER==========================================-->
		<?php if( $user->is_logged_in() ){
			 include('includes/header-logout.php');

		}else if($user->is_client_logged_in()) {
			 include('includes/client_header.php');
		}else {
			include('includes/header.php');

		}
?>
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
			}

?>
		<!--================================PAGE TITLE==========================================-->
		<div class="page-title-wrap bgorange-1 padding-top-0 padding-bottom-0"><!-- section title -->
			<h4 class="white">  </h4>
		</div><!-- section title end -->

		<!--================================listing SECTION==========================================-->


	<section class="aside-layout-section padding-top-100 padding-bottom-40 ">
			<div class="container"><!-- section container -->
				<div class="row bg-white" style="height:500px;"><!-- row -->
					<div class="col-md-12 col-sm-12 col-xs-12 main-wrap"><!-- content area column -->
						
<h6 class="product-section-title col-black padding-top-10"> Your Wishlist</h6>
							<div class="row">
								
								
								<div class="col-md-12  col-lg-12 col-sm-12 col-xs-12"><!--Product Description-->
					<div class="block">
             
              <div class="block-content">

                  <div class="table-responsive">
                      <table class="table table-striped table-vcenter">
                          <thead>
                              <tr>
                                  <th class="text-center" style="width: 20%;">Name</th>
                                  <th class="text-center" style="width: 30%">Image</th>

                                  <th style="width: 30%;">Description</th>

                                  <th class="text-center" style="width: 20%;">Actions</th>
                              </tr>
                          </thead>
                          <tbody>
						   <?php
                             try{
                           $results = $db->prepare("SELECT prductwishlist.productID, porductinformation.productName, porductinformation.productDescription, productimage.imagepath
FROM prductwishlist
LEFT JOIN porductinformation ON prductwishlist.productID = porductinformation.productID
LEFT JOIN productimage ON prductwishlist.productID = productimage.productID
WHERE prductwishlist.businessID = :bid
GROUP BY productid");
                            $results->bindParam(':bid',$_SESSION['businessID'],PDO::PARAM_STR);
                           $results->execute();
                           }
                           catch (Exception $ex) {
                              //echo $ex;
                           echo $ex;
                           //  echo "failed";
                               
                           exit();
                           }
                           //$sub= $results->fetchALL(PDO::FETCH_BOTH);
                             $wish= $results->fetchALL(PDO::FETCH_BOTH);
							 $i=0;
                                while(isset($wish[$i][0]) && !empty($wish[$i][0])){
									echo '						 
                              <tr>
                                <th class="text-center" scope="row"><a href="#" style="color:#504e4e;">'.$wish[$i][1].'</a></th>
                                  <td class="text-center">
                                    <a href="#">
                                      <img class="small-img-box thumbnail " style ="margin:0% auto;width:60%;" src="'.$wish[$i][3].'" alt="">
                                    </a>
                                  </td>

                                  <td>'.$wish[$i][2].'</td>

                                  <td class="text-center">
                                      <div class="btn-group">
                                          <button type="button" class="btn btn-sm btn-secondary  js-tooltip-enabled" id="'.$wish[$i][0].'" data-toggle="tooltip" title="" data-original-title="Share">
                                              <i class="fa fa-times remov" id="'.$wish[$i][0].'" style="color:red;"></i>
                                          </button>

                                      </div>
                                  </td>
                              </tr>';
									
									$i++;
								}

						   ?>
						  
						 


                          </tbody>
                      </table>
                  </div>
              </div>
          </div>

								</div>


							</div>





				</div>









						</div>
					</div>

					


		</section>



		<!--================================SOCIAL CAROUSEL SECTION==========================================-->
		<!--================================SOCIAL CAROUSEL SECTION 2==========================================-->
		<?php include('includes/footer.php');?>
		<script type="text/javascript" src="js/removc.js"></script>

</body>
</html>
