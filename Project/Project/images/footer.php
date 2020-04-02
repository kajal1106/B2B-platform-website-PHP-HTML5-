<style>
.body{
overflow:hidden;
}

h4{
	color:white;
  font-weight: bold!important;
}
.footer-bs {
   background-color: #0B3C5D;
	padding: 30px 40px;
	color: rgba(255,255,255,1.00);


	border-top-left-radius: 0px;

}
.footer-bs .footer-brand, .footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { padding:10px 25px; }
.footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { border-color: transparent; }
.footer-bs .footer-brand h2 { margin:0px 0px 10px; }
.footer-bs .footer-brand p { font-size:12px; color:rgba(255,255,255,0.70); }

.footer-bs .footer-nav ul.pages { list-style:none; padding:0px; }
.footer-bs .footer-nav ul.pages li { padding:5px 0px;}
.footer-bs .footer-nav ul.pages a { color:rgba(255,255,255,1.00); font-weight:bold; text-transform:uppercase; }
.footer-bs .footer-nav ul.pages a:hover { color:rgba(255,255,255,0.80); text-decoration:none; }
.footer-bs .footer-nav h4 {
	font-size: 11px;
	text-transform: uppercase;
	letter-spacing: 3px;
	margin-bottom:10px;
  text-align: left!important;
}

.footer-bs .footer-nav ul.list { list-style:none; padding:0px; }
.footer-bs .footer-nav ul.list li { padding:5px 0px; }
.footer-bs .footer-nav ul.list a { color:rgba(255,255,255,0.80); }
.footer-bs .footer-nav ul.list a:hover { color:rgba(255,255,255,0.60); text-decoration:none; }

.footer-bs .footer-social ul { list-style:none;  padding-left: 0pt; }
.footer-bs .footer-social h4 {
	font-size: 11px;
	text-transform: uppercase;
	letter-spacing: 3px;
  text-align: left!important;
}
.footer-bs .footer-social li { padding:5px 4px;}
.footer-bs .footer-social a { color:rgba(255,255,255,1.00);}
.footer-bs .footer-social a:hover { color:rgba(255,255,255,0.80); text-decoration:none; }

.footer-bs .footer-ns h4 {
	font-size: 11px;
	text-transform: uppercase;
	letter-spacing: 3px;
	margin-bottom:10px;

}
.footer-bs .footer-ns p { font-size:12px; color:rgba(255,255,255,0.70); }

@media (min-width: 768px) {
	.footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { border-left:solid 1px rgba(255,255,255,0.10); }
}

.list{
  text-align: left;

}
.footer-nav a, spanli {

    text-align: left;
  }

  .footer-social a, span,li {

    text-align: left;
  }
</style>


<!--================================ FOOTER AREA ==========================================-->



    <!----------- Footer ------------>
    <footer class="footer-bs hidden-xs" style="background-color: #0b3c5d;">
        <div class="row">
        
        	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 footer-nav animated fadeInUp">


            	<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 ">
            			<h4>Company</h4>
                    <ul class="list" style="text-align:left!important;">
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="member-benefits.php">Member Benefits</a></li>
                         <li><a href="feedback.php">Feedback</a></li>
                      

                    </ul>
              </div>
              <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 ">
                    		<h4>Help</h4>
                    <ul class="list">
                    	<li><a href="faq.php">Faq </a></li>
                    	<li><a href="terms-and-services.php">Terms and Conditions</a></li>
                    	<li><a href="privacy-policy.php">Privacy Policy </a></li>
                      <li><a href="disclaimer.php">Disclaimer</a></li>


                    </ul>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 ">
                        <h4>Explore</h4>
                    <ul class="list">
                      <li><a href="http://thebizroot.com/explore/careers/">Careers </a></li>
                         <li><a href="http://thebizroot.com/explore/">Blog </a></li>
                        <li><a href="http://thebizroot.com/explore/ournews/">News </a></li>

                    </ul>
                </div>

            </div>
        	<div class="col-md-3  col-sm-3 col-lg-3 col-xs-2 footer-social animated fadeInDown">
            	<h4>Follow Us</h4>
               <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6 ">
            	<ul class="list">
                	<li><a href="#"><i class="fa fa-facebook-square " style="color:#4267b2; font-size:15px"></i>&ensp;&ensp;Facebook</a></li>
                	<li><a href="#"><i class="fa fa-twitter-square " style="color:#1da1f2; font-size:15px"></i>&ensp;&ensp;   Twitter</a></li>
                	<li><a href="#"><i class="fa fa-instagram " style="color:#e1515a; font-size:15px"></i>&ensp;&ensp;Instagram</a></li>
              </ul>
            </div>
             <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6 ">
              <ul class="list">
                  <li><a href="#"><i class="fa fa-google-plus " style="color:#e1515a; font-size:15px"></i>&ensp;&ensp;Google Plus</a></li>
                  <li><a href="#"><i class="fa fa-linkedin " style="color:#4267b2;  font-size:15px"></i>&ensp;&ensp;Linkedin</a></li>
                  <li><a href="#"><i class="fa fa-youtube " style="color:#e1515a; font-size:15px"></i>&ensp;&ensp;Youtube</a></li>

                </ul>
              </div>
            </div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script>

 $(function(){
     
       /* Edit button ajax call */
       $('#newslatter').on( 'click', function(){
           
           var news  = $('#news').val();

          
           
            if(!news){
             
                $('.error').show(3000).html("Enter Email Id.").delay(3200).fadeOut(3000);

           }else{

             if(news){

                    var url = 'includes/newsletter-insert.php';

              }

                $.post( url, {news:news})
               .done(function( data ) {

                 if(data > 0){

                   $('.success').show(3000).html("You have successfully subscribe.").delay(2000).fadeOut(1000);

                 }else{

                   $('.error').show(3000).html("You have already subscribe:").delay(2000).fadeOut(1000);
                 }

                 $("#saverecords").val('Add newslatter');

                 setTimeout(function(){
                     window.location.reload(1);

                 }, 15000);

             });
          }

       });

  });

  </script>
        	<div class="col-md-3 footer-ns animated fadeInRight">
              <!--a href="index.php"  style="margin-left:30px;"><img src="images/footer-logo.png" /></a><br-->
                <p style="color:white">"We are leading B2B and B2C Platform"</p>

            	<h4>Newsletter</h4>
                <p>Subscribe to Us and get latest updates</p><br>
				<div class ="error" id="error">
				</div>
				<div class ="success" id="success">
				</div>
                <p>
				<form>
                    <div class="input-group">
                      <input type="text" class="form-control" id="news" name="news" placeholder="Enter email id...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" id='newslatter' value ='Add newslatter' type="button"><span class="glyphicon glyphicon-envelope"></span></button>
                      </span>
                    </div><!-- /input-group -->
					</form>
                 </p>
            </div>
        </div>
        <div class="row">


        </div>


    </footer>
    <style type="text/css">
#lower-footer
{
          min-height: 20px;
          background-color: black;
}
.left-text
{
          color:white;
}
.menu
{
          padding: 5px 0 5px 0;
}
.menu li
{
          display:inline-block;
          padding:0 15px 0 15px;
          border-left:solid 1px #fff;
}
.menu li a
{
          display:inline-block;
          padding:0 15px 0 15px;
}
.menu li:first-child
{
          border-left:none;
}
.menu li a
{
          color:white;
}
.menu li a:hover
{
          color:red;
}
.pad
{
          padding-top: 12px;
}

    </style>
    <section id="lower-footer" class="hidden-xs" style="background-color:#0B3C5D;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <!--left text-->
        <div class="col-md-4">
          <div class="left-text pad"> &copy; 2017 TheBizroot. </div>
        </div>
         <div class="col-md-8 offset-md-8" style="text-align:right;">
          <div class="left-text pad" > Developed By <a class="inline-hyperlink" href="http://www.steinnlabs.com"> Steinn Labs</a> </div>
        </div>
        <!--Right menu-->
        <div class="col-md-4">
          <div class="pull-right pad">

          </div>
        </div>
        </div>
      </div>
    </div>
  </section>

		<script>
		$(function(){
			$('.item_filter').click(function(){
				var colour = multiple_values('colour');
				var brand  = multiple_values('brand');
				var size   = multiple_values('size');

				var url ="businesses.php?colour="+colour+"&brand="+brand+"&size="+size;
				window.location=url;
			});

		});


		function multiple_values(inputclass){
			var val = new Array();
			$("."+inputclass+":checked").each(function() {
			    val.push($(this).val());
			});
		return val.join('-');
	}

		</script>
<script>

$("#newsinsert").on("click", function(){
	$.ajax({
  url: "newsinsert.php",
  data:{'news':$('#news').val(),},
  success:function(data) {
  console.log(data);
}
	});
  	});
    </script>


<script>
function myFunction(x) {
    x.classList.toggle("fa-heart col-red");
}
</script>
	<!--================================MODAL WINDOWS FOR REGISTER AND LOGIN FORMS ===========================================-->
	<!-- Modal login form -->

	<!--================================JQuery===========================================-->

	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script src="js/jquery.js"></script><!-- jquery 1.11.2 -->
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/modernizr.custom.js"></script>

	<!--================================BOOTSTRAP===========================================-->

	<script src="bootstrap/js/bootstrap.min.js"></script>

	<!--================================NAVIGATION===========================================-->

	<script type="text/javascript" src="js/menu.js"></script>

	<!--================================SLIDER REVOLUTION===========================================-->

	<script type="text/javascript" src="assets/revolution_slider/js/revolution-slider-tool.js"></script>
	<script type="text/javascript" src="assets/revolution_slider/js/revolution-slider.js"></script>

	<!--================================MAP===========================================-->

	<script type="text/javascript" src="js/jquery.mapit.js"></script>
	<script src="js/initializers.js"></script>

	<!--================================OWL CARESOUL=============================================-->

	<script src="js/owl.carousel.js"></script>
    <script src="js/triger.js" type="text/javascript"></script>

	<!--================================FunFacts Counter===========================================-->

	<script src="js/jquery.countTo.js"></script>

	<!--================================jquery cycle2=============================================-->

	<script src="js/jquery.cycle2.min.js" type="text/javascript"></script>

	<!--================================waypoint===========================================-->

	<script type="text/javascript" src="js/jquery.waypoints.min.js"></script><!-- Countdown JS FILE -->

	<!--================================RATINGS===========================================-->

	<script src="js/jquery.raty-fa.js"></script>
	<script src="js/rate.js"></script>
	<script type="text/javascript" src="js/addList.js"></script>
  <script type="text/javascript" src="js/getdata.js"></script>
	<!--================================ testimonial ===========================================-->
	<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">

			<div class="rg-image-wrapper">
				<div class="rg-image"></div>
				<div class="rg-caption-wrapper">
					<div class="rg-caption" style="display:none;">
						<p></p>
						<h5></h5>
						<div class="caption-metas">
							<p class="position"></p>
							<p class="orgnization"></p>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</script>
	<script type="text/javascript" src="assets/testimonial/js/jquery.tmpl.min.js"></script>
	<script type="text/javascript" src="assets/testimonial/js/jquery.elastislide.js"></script>
	<script type="text/javascript" src="assets/testimonial/js/gallery.js"></script>

	<!--================================custom script===========================================-->

	<script type="text/javascript" src="js/custom.js"></script>
