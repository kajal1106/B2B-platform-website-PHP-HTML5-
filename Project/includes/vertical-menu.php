<link href="css/vertical-menu.css" rel="stylesheet" type="text/css">
<style type="text/css">
@media only screen and (min-width: 1024px) and (min-height: 600px) {
   .menu-align{
   	padding-right: 7%!important;
   				}
   }

   @media only screen and (min-width: 1366px) and (min-height: 768px) {
   .menu-align{
   	padding-right: 5%!important;
   				}
   }


	@media only screen and (min-width: 1440px) and (min-height: 900px) {
   .menu-align{
   	padding-right: 3%!important;
   				}
   }

   @media only screen and (min-width: 1600px) and (min-height: 900px) {
   .menu-align{
   	padding-right: 0%!important;
   				}
   }


   @media only screen and (min-width: 1600px) and (min-height: 1050px) {
   .menu-align{
   margin-left: 1%!important;
   				}
   }

   @media only screen and (min-width: 1920px) and (min-height: 1080px) {
   .menu-align{
   margin-left: 6%!important;
   				}
   }

   @media (max-width:1200px)
   {
       #scrollmenu
       {
           height: 420px;
           overflow-y: auto;
       }
   }



</style>

      <div class="category">

        <ul class="list-unstyled" id="scrollmenu">
          <?php
          $stmtfetch = $db->prepare("SELECT * FROM menulist");
          $stmtfetch->execute();
          while($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
          {
                $a=$row['industryID'];
                $stmt = $db->prepare("select * from industrylist where industryID = :industryID");
                $stmt->execute(array(':industryID' => $a));
                $row1 = $stmt->fetch(PDO::FETCH_ASSOC);

          ?>
          <li>
            <div class="dropdown">



            <button class="btn btn-default dropdown-toggle" onclick="location.href='<?php echo $row['URL']?>';" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $row1['industryName']?>
            <span class="caret pull-right col-white"></span>

            </button>

              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <div class="col-md-12 col-sm-12 col-lg-12" style="padding-right: 0px!important;padding-left: 0px!important;">

                  <div class="sub-cat">
                    <ul class="list-unstyled" style="background-color:white;">
                    <?php
                    $a=$row['industryID'];
                    $stmt = $db->prepare("SELECT * from industrysublist where industryID = :industryID");
                    $stmt->execute(array(':industryID' => $a));
                    while($row1 = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                      echo '<li><a href="http://localhost/home/businesses.php?industry='.$row1['industryID'].'&country=&type=&subindustry='.$row1['IndustrySublistID'].'" title="">'.$row1['subindustryName'].'</a></li>';
                    }

                    ?>
                  </ul>
                </div>

              </div>

            </div>
          </div>
        </li>
<?php } ?>

          <li><a href="allcategories.php"> <span class="col-white"><i class="fa fa-bars"></i> Browse All Categories</a></span></li>

        </ul>


      </div>
