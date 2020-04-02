<style>


 
 
 .blc{
  display: table-cell;
    
    white-space: nowrap;
 }
 


@media only screen and (max-width: 2600px) and (min-width: 1024px) {
  .search-width{
    width: 400px!important;
     border: none!important;
    border-bottom: 1px solid black!important;
  }

  .search-form{

    margin:0% 2%!important;
    padding-top:1.5%;
  }
}


@media only screen and (max-width: 2600px) and (min-width: 1366px) {
  .search-width{
    width: 500px!important;
    border: none!important;
    border-bottom: 1px solid black!important;
  }

  .search-form{

    margin:0% 3%!important;
    padding-top:1.5%;
  }
}

@media only screen and (max-width: 2600px) and (min-width: 1366px) {
  .search-width{
    width: 500px!important;
     border: none!important;
    border-bottom: 1px solid black!important;
  }

  .search-form{

    margin:0% 3%!important;
    padding-top:1.5%;
  }
}

@media only screen and (max-width: 1600px) and (min-width: 1440px) {
  .search-width{
    width:500px!important;
     border: none!important;
    border-bottom: 1px solid black!important;
  }

  .search-form{

    margin:0% 3%!important;
    padding-top:1.5%;
  }
}




@media only screen and (max-width: 1900px) and (min-width: 1600px) {
  .search-width{
    width: 650px!important;
     border: none!important;
    border-bottom: 1px solid black!important;
  }

  .search-form{
    margin:0% 4%!important;
    margin-top: 1.5%;
  }
}

@media only screen and (max-width: 2600px) and (min-width:1900px) {
  .search-width{
    width:650px!important;
     border: none!important;
    border-bottom: 1px solid black!important;
  }

  .search-form{
    margin:0% 6%!important;
    margin-top: 1.5%;
  }
}



</style>


	<div class="header">

<!--==================================SPACE FOR HEADERTOOLBAR===============================-->


			<div class="navbar navbar-default navbar-fixed-top" style="background-color:white!important;">
   <div class="container-fluid" style="padding:0px 5px 15px!important;">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
			<a href="index.php" title="Responsive Slide Menus" style="margin-left:30px;margin-top:10px"><img src="images/logo.png" /></a>

        </div>
        <center>
            <div class="navbar-collapse collapse" id="navbar-main">
                <form action ="search.php" method="POST" class="navbar-form navbar-left blc hidden-xs search-form">




      <div class="blc">
              <select class="typelist" name ="optradio" class="" style="border:none;background-color:white;"><option value="business">Business</option><option value="lead">Lead</option><option value="product">Products</option></select>
      </div>

      <div class="blc">
              <input  class="search-width"  name="search1" id ="searchb"  aria-autocomplete="both"  autocomplete="off"  aria-haspopup="false" type="text" placeholder="search..." required>

              <div id="searchlist" class="search-width" style="color:black !important;background-color:white !important;position: absolute;"></div>
      </div>

      <div class="blc">
              <button  type = "submit" name = "submit" value="submit" class="" style="border:none;background-color:white;"><i class="fa fa-search" aria-hidden="true"></i></button>
      </div>
             
             </form>

                <div class="navbar-form navbar-right" style="padding:10px 5px 0px;margin-right:0px!important;" >

									<?php
									$stmt = $db->prepare('SELECT * FROM clientcontactinformation WHERE clientID =:clientID');
									$stmt->execute(array(':clientID' => $_SESSION["clientID"]));
									$row = $stmt->fetch(PDO::FETCH_ASSOC);
									$clientName = $row['clientName'];
									?>
                <label class="strong col-black"> Welcome <?php echo $clientName;?>  </label>
				 <?php
                    try{
                           $results = $db->prepare("select count(*) from prductwishlist where businessID =:bid ");
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







				 ?>
				
               <li class="inline">  <button  onclick="location.href='product-wishlist.php';" class="btn btn-default btn-sm" ><i class="fa fa-heart  cart"> <?php echo $wish[0][0] ?></i></button></li>
               <li class="inline">   <button class="btn btn-primary btn-sm" onclick="location.href='client-dashboard.php';" style="font-size:10px;color:white;background-color: #0b3c5d;">My Profile</button></li>


                <li class="inline">  <button class="btn btn-danger btn-sm" onclick="location.href='logout.php';" style="font-size:10px;color:white;background-color: orange;border-color: orange;">Logout</button></li>
					<br>

</div>



            </div>
        </center>
    </div>
</div>
