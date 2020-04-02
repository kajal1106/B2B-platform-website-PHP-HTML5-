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
    width: 300px!important;
    border: none!important;
    border-bottom: 1px solid black!important;
  }

  .search-form{

    margin:0% 5%!important;
    padding-top:1.5%;
  }
}

@media only screen and (max-width: 2600px) and (min-width: 1366px) {
  .search-width{
    width: 300px!important;
     border: none!important;
    border-bottom: 1px solid black!important;
  }

  .search-form{

    margin:0% 5%!important;
    padding-top:1.5%;
  }
}

@media only screen and (max-width: 1600px) and (min-width: 1440px) {
  .search-width{
    width: 350px!important;
     border: none!important;
    border-bottom: 1px solid black!important;
  }

  .search-form{

    margin:0% 5%!important;
    padding-top:1.5%;
  }
}




@media only screen and (max-width: 1900px) and (min-width: 1600px) {
  .search-width{
    width: 450px!important;
     border: none!important;
    border-bottom: 1px solid black!important;
  }

  .search-form{
    margin:0% 7%!important;
    margin-top: 1.5%;
  }
}

@media only screen and (max-width: 2600px) and (min-width:1900px) {
  .search-width{
    width: 600px!important;
     border: none!important;
    border-bottom: 1px solid black!important;
  }

  .search-form{
    margin:0% 10%!important;
    margin-top: 1.5%;
  }
}

@media only screen and (max-width: 1360px) and (min-width: 1200px) {
  .des{
      display: block !important;
  }
}



</style>

  <div class="header" style="width:100%!important;">

<!--==================================SPACE FOR HEADERTOOLBAR===============================-->


  <div class="navbar navbar-default navbar-fixed-top" style="background-color:white!important;">

    <div class="container-fluid" style="padding:0px 5px 5px!important;">
        <div class="navbar-header ">

            <!--button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar-main"  aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button-->

                  <button class="visible-xs navbar-toggle" style="border:none;" data-toggle="modal" data-target="#navsmall" aria-expanded="false">
                     <i class="fa fa-user"></i>

          </button>
      <a href="index.php" class="navbar-brand hidden-xs" style="margin-left:2%;" ><img src="images/logo.png" /></a>
      <a href="index.php" class="navbar-brand visible-xs" style="margin-left:2%;"><img src="images/logo-mobile.png" /></a>



        </div>

            <div class="navbar-collapse collapse " id="navbar-main">





             <form action ="search.php" method="POST" class="navbar-form navbar-left blc hidden-xs search-form">




      <div class="blc">
              <select class="typelist" name ="optradio" class="" style="border:none;background-color:white;">
			  <option value="business" >Business</option>
			  <option value="lead">Lead</option>
			  <option value="product">Products</option>
			  </select>
      </div>

      <div class="blc">
              <input  class="search-width"  name="search1" id ="searchb"  aria-autocomplete="both"  autocomplete="off"  aria-haspopup="false" type="text" placeholder="search..." >

              <div id="searchlist" class="search-width" style="color:black !important;background-color:white !important;position: absolute;"></div>
      </div>

      <div class="blc">
              <button  type = "submit" name = "submit" value="submit" onclick="optradio" class="" style="border:none;background-color:white;"><i class="fa fa-search" aria-hidden="true"></i></button>
      </div>
             <!--CSS FOR THIS CONTANER-->

               <!--CSS FOR THIS CONTANER-->


             </form>


             <div class="navbar-right hidden-xs hidden-sm desk-vis" style="padding:10px 5px 0px;margin-right:0px!important;">
              <ul>
                <li class="inline">

                <form class="navbar-form  blc inline " role="" action ="includes/login.php" style="padding-right:2px!important;" method ="POST">

                    <div class="form-group ">
                        <input type="text" class="form-control input-sm" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control head-btn input-sm" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                    <button type="submit" name="submit" class="btn head-btn btn-sm" style="font-size:10px;background-color:orange;color:white;">Sign In</button>
                    </div>

                <br>
                    <div class="inline" >
                <label class="radio-inline col-black"><input type="radio" name="optradio" value="business">Business Owner</label>
                    <label class="radio-inline col-black"><input type="radio" value="client" name="optradio">Client</label>&ensp;&ensp;
                  </div>
                  <div class="inline">
          <span><a href="#" style="display:inline!important;color:black;text-decoration:underline!important;font-family:'Montserrat';" data-toggle="modal" data-target="#forgot_password">Forget Password</a></span>&ensp;&ensp;&ensp;&ensp;

                  </div>
               </form>
             </li>
             <li class="inline">

                <button class="btn  btn-sm blc inline pull-right" onclick="location.href='signupform.php';" style="font-size:10px;color:white;margin-top:1px;background-color:#0b3c5d;">Register now</button>
            </li>
          </ul>

</div>



                <!--div class="visible-xs">
                <?php //include('includes/vertical-menu.php');?>
              </div-->


                  <span class="visible-sm visible-md pull-right des" style="margin-right:5%;margin-top:1%;">
                    <label href="#" style="display:inline!important;color:black;text-decoration:underline!important;" data-toggle="modal" data-target="#navsmall"><i class="fa fa-user fa-3x"></i>
                    </label>
                  </span>


            </div>



    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="forgot_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form class ="forgetpass" method="POST" action="reset.php">
        <select name="opt" class="form-control"><option>Are you ?</option><option value="business">Business Owner</option><option value="client">Client</option></select><br>
      <input type="email" name="vemail" class="form-control" placeholder="Recovery Mail">
      </div>
      <div class = "errormsg">

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary bg-steelblue" style="color: white;border-color: #0b3c5d;" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary bg-orange" style="border-color: orange;" name="submit">Send</button>
    </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="navsmall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="">
                  <form class=" " role="" action ="includes/login.php" method ="POST" >
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-sm" name="password" placeholder="Password">
                    </div>
                   <button type="submit" name="submit" class="btn btn-success btn-sm" style="font-size:10px;background-color: orange;border-color: orange;">Sign In</button>
      <br>

                     <span><label class="radio-inline col-black"><input type="radio" name="optradio" value="business">Business owner</label></span>
                     <span><label class="radio-inline col-black"><input type="radio" value="client" name="optradio">Client</label></span>

          <span><a href="#" style="display:inline!important;color:black;text-decoration:underline!important;" data-toggle="modal" data-target="#forgot_password" data-dismiss="modal">Forget Password</a></span>&ensp;&ensp;&ensp;


                </form>
<br>
                  <button class="btn btn-primary btn-sm" style="background-color: #0b3c5d;border-color: #0b3c5d;font-size:10px;color:white;" onclick="location.href='signupform.php';">Not a member ?Register now</button>
      </div>
    </div>
  </div>
</div>

