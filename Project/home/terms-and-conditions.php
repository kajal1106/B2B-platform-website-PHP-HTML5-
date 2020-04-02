


<?php

$pagetitle="Terms and Conditions";

include('includes/config.php');
include('includes/head.php');




?>
<body>

<style type="text/css">
.tc p{
	text-align: justify;
	color: black;
}

.strong{
	font-weight: bolder;

}

.company-name{
	
	font-weight:bolder;
	color: black;
}
</style>
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
				<div class="row bg-white" style="min-height:500px;"><!-- row -->
					<div class="col-md-12 col-sm-12 col-xs-12 main-wrap"><!-- content area column -->
						
					<h6 class="product-section-title col-black padding-top-10"> Terms & Conditions</h6>
							


							<div class="row">

								<div class="col-md-10 col-md-offset-1 tc">
									<h5 class="text-center strong col-black">TERMS OF SERVICE AGREEMENT</h5>
									<hr>
									<p class="strong">LAST REVISION: [01-01-2018]</p><br>
									<p>PLEASE READ THIS TERMS OF SERVICE AGREEMENT CAREFULLY. BY USING THIS WEBSITE OR ORDERING PRODUCTS / SERVICES FROM THIS WEBSITE YOU AGREE TO BE BOUND BY ALL OF THE TERMS AND CONDITIONS OF THIS AGREEMENT.</p><br>
									<p>This Terms of Service Agreement governs your use of this website, “https://www.thebizroot.com”, “<span class="company-name">THEBIZROOT MEGACORP LLP</span>”. offer of products, services and leads for post on this Website. This Agreement includes, and incorporates by this reference, the policies and guidelines referenced below. <span class="company-name">THEBIZROOT MEGACORP LLP</span>. reserves the right to change or revise the terms and conditions of this Agreement at any time by posting any changes or a revised Agreement on this Website. <span class="company-name">THEBIZROOT MEGACORP LLP</span>. will alert you that changes or revisions have been made by indicating on the top of this Agreement the date it was last revised. The changed or revised Agreement will be effective immediately after it is posted on this Website. Your use of the Website following the posting any such changes or of a revised Agreement will constitute your acceptance of any such changes or revisions. <span class="company-name">THEBIZROOT MEGACORP LLP</span>. encourages you to review this Agreement whenever you visit the Website to make sure that you understand the terms and conditions governing use of the Website. This Agreement does not alter in any way the terms or conditions of any other written agreement you may have with <span class="company-name">THEBIZROOT MEGACORP LLP</span>. for other products or services. If you do not agree to this Agreement (including any referenced policies or guidelines), please immediately terminate your use of the Website. If you would like to print this Agreement, please click the print button on your browser toolbar.</p>
									<br><p class="strong">I. PRODUCTS</p><br>
									<p>Terms of Offer. This Website offers for purchase and sale certain products, services. By placing an order for Products through this Website, you agree to the terms set forth in this Agreement. </p><br>
									<p><span  class="strong col-black">Customer Solicitation: </span>Unless you notify our third party call center reps or direct THEBIZROOT MEGACORP .LLP sales reps, while they are calling you, of your desire to opt out from further direct company communications and solicitations, you are agreeing to continue to receive further emails and call solicitations THEBIZROOT MEGACORP .LLP and its designated in house or third party call team(s).</p><br>
									<p><span  class="strong col-black">Opt Out Procedure: </span>We provide 2 easy ways to opt out of from future solicitations. </p>
									<p>1. You may use the opt out link found in any email solicitation that you may receive.</p>
									<p> 2. You may also choose to opt out, via sending your email address to: <span class="company-name"><span class="company-name">support@thebizroot.com</span></span></p><br>
									<p>Proprietary Rights. THEBIZROOT MEGACORP .LLP has proprietary rights and trade secrets in the Products. You may not copy, reproduce, resell or redistribute any Product manufactured and/or distributed by THEBIZROOT MEGACORP .LLP. THEBIZROOT MEGACORP .LLP also has rights to all trademarks and trade dress and specific layouts of this webpage, incluzding calls to action, text placement, images and other information.</p>
									<p>Sales Tax. If you purchase any Products, you will be responsible for paying any applicable sales tax.</p>
									<br><p class="strong">II. WEBSITE</p><br>
									<p>Content; Intellectual Property; Third Party Links. In addition to making Products available, this Website also offers information and marketing materials. This Website also offers information, both directly and through indirect links to third-party websites, about nutritional and dietary supplements. <span class="company-name">THEBIZROOT MEGACORP LLP</span>. does not always create the information offered on this Website; instead the information is often gathered from other sources. To the extent that <span class="company-name">THEBIZROOT MEGACORP LLP</span>. does create the content on this Website, such content is protected by intellectual property laws of the India, foreign nations, and international bodies. Unauthorized use of the material may violate copyright, trademark, and/or other laws. You acknowledge that your use of the content on this Website is for personal, noncommercial use. Any links to third-party websites are provided solely as a convenience to you. <span class="company-name">THEBIZROOT MEGACORP LLP</span>. does not endorse the contents on any such third-party websites. <span class="company-name">THEBIZROOT MEGACORP LLP</span>.  is not responsible for the content of or any damage that may result from your access to or reliance on these third-party websites. If you link to third-party websites, you do so at your own risk.</p><br>
									<p>Use of Website; <span class="company-name">THEBIZROOT MEGACORP LLP</span>. is not responsible for any damages resulting from use of this website by anyone. You will not use the Website for illegal purposes. You will </p><br>
									<p>(1)	Abide by all applicable local, state, national, and international laws and regulations in your use of the Website (including laws regarding intellectual property),</p>
									<p>(2)	Not interfere with or disrupt the use and enjoyment of the Website by other users, </p>
									<p>(3)	Not resell material on the Website, </p>
									<p>(4)	Not engage, directly or indirectly, in transmission of "spam", chain letters, junk mail or any other type of unsolicited communication, and </p>
									<p>(5)	Not defame, harass, abuse, or disrupt other users of the Website</p><br>
									<p>License. By using this Website, you are granted a limited, non-exclusive, non-transferable right to use the content and materials on the Website in connection with your normal, noncommercial, use of the Website. You may not copy, reproduce, transmit, distribute, or create derivative works of such content or information without express written authorization from <span class="company-name">THEBIZROOT MEGACORP LLP</span>. or the applicable third party (if third party content is at issue).</p><br>
									<p>Posting. By posting, storing, or transmitting any content on the Website, you hereby grant <span class="company-name">THEBIZROOT MEGACORP LLP</span>. a perpetual, worldwide, non-exclusive, royalty-free, assignable, right and license to use, copy, display, perform, create derivative works from, distribute, have distributed, transmit and assign such content in any form, in all media now known or hereinafter created, anywhere in the world. <span class="company-name">THEBIZROOT MEGACORP LLP</span>. does not have the ability to control the nature of the user-generated content offered through the Website. You are solely responsible for your interactions with other users of the Website and any content you post. <span class="company-name">THEBIZROOT MEGACORP LLP</span>. is not liable for any damage or harm resulting from any posts by or interactions between users. <span class="company-name">THEBIZROOT MEGACORP LLP</span>. reserves the right, but has no obligation, to monitor interactions between and among users of the Website and to remove any content <span class="company-name">THEBIZROOT MEGACORP LLP</span>.  deems objectionable, in MuscleUP Nutrition 's sole discretion.</p><br>
									<p class="strong">III. DISCLAIMER OF WARRANTIES</p><br>
									<p>YOUR USE OF THIS WEBSITE AND/OR PRODUCTS, PRODUCT PHOTOS, BUSINESS LOGO, BUSINESS NAME ARE AT YOUR SOLE RISK. THE WEBSITE AND PRODUCTS ARE OFFERED ON AN "AS IS" AND "AS AVAILABLE" BASIS. <span class="company-name">THEBIZROOT MEGACORP LLP</span>.  EXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT WITH RESPECT TO THE PRODUCTS OR WEBSITE CONTENT, OR ANY RELIANCE UPON OR USE OF THE WEBSITE CONTENT OR PRODUCTS. ("PRODUCTS" INCLUDE TRIAL PRODUCTS.)</p>
									<br><p>WITHOUT LIMITING THE GENERALITY OF THE FOREGOING, <span class="company-name">THEBIZROOT MEGACORP LLP</span>.  MAKES NO WARRANTY:</p><br>
									<p>THAT THE INFORMATION PROVIDED BY USERS OR BUSINESS MEMBERS ON THIS WEBSITE IS ACCURATE, RELIABLE, COMPLETE, OR TIMELY.</p><br>
									<p>THAT THE LINKS TO THIRD-PARTY WEBSITES PROVIDED BY USERS OR BUSINESS MEMBERS ARE TO INFORMATION THAT IS ACCURATE, RELIABLE, COMPLETE, OR TIMELY.</p><br>
									<p>NO ADVICE OR INFORMATION, WHETHER ORAL OR WRITTEN, OBTAINED BY YOU FROM THIS WEBSITE WILL CREATE ANY WARRANTY NOT EXPRESSLY STATED HEREIN. </p><br>
									<p>AS TO THE RESULTS THAT MAY BE OBTAINED FROM THE USE OF THE PRODUCTS OR THAT DEFECTS IN PRODUCTS WILL BE CORRECTED. </p><br>
									<p>REGARDING ANY PRODUCTS PURCHASED OR OBTAINED THROUGH THE WEBSITE.</p><br>
									<p>SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF CERTAIN WARRANTIES, SO SOME OF THE ABOVE EXCLUSIONS MAY NOT APPLY TO YOU.</p><br>
									<p class="strong">IV. LIMITATION OF LIABILITY</p><br>
									<p><span class="company-name">THEBIZROOT MEGACORP LLP</span>. ENTIRE LIABILITY, AND YOUR EXCLUSIVE REMEDY, IN LAW, IN EQUITY, OR OTHWERWISE, WITH RESPECT TO THE WEBSITE CONTENT AND PRODUCTS AND/OR FOR ANY BREACH OF THIS AGREEMENT IS SOLELY LIMITED TO THE AMOUNT YOU PAID, LESS SHIPPING AND HANDLING, FOR PRODUCTS PURCHASED VIA THE WEBSITE.</p><br>
									<p><span class="company-name">THEBIZROOT MEGACORP LLP</span>. WILL NOT BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL OR CONSEQUENTIAL DAMAGES IN CONNECTION WITH THIS AGREEMENT OR THE PRODUCTS IN ANY MANNER, INCLUDING LIABILITIES RESULTING FROM (1) THE USE OR THE INABILITY TO USE THE WEBSITE CONTENT OR PRODUCTS; (2) THE COST OF PROCURING SUBSTITUTE PRODUCTS OR CONTENT; (3) ANY PRODUCTS PURCHASED OR OBTAINED OR TRANSACTIONS ENTERED INTO THROUGH THE WEBSITE; OR (4) ANY LOST PROFITS YOU ALLEGE.</p><br>
									<p>SOME JURISDICTIONS DO NOT ALLOW THE LIMITATION OR EXCLUSION OF LIABILITY FOR INCIDENTAL OR CONSEQUENTIAL DAMAGES SO SOME OF THE ABOVE LIMITATIONS MAY NOT APPLY TO YOU.</p><br>
									<p class="strong">V. INDEMNIFICATION</p><br>
									<p>You will release, indemnify, defend and hold harmless <span class="company-name">THEBIZROOT MEGACORP LLP</span>., and any of its contractors, agents, employees, officers, directors, shareholders, affiliates and assigns from all liabilities, claims, damages, costs and expenses, including reasonable attorneys' fees and expenses, of third parties relating to or arising out of (1) this Agreement or the breach of your warranties, representations and obligations under this Agreement; (2) the Website content or your use of the Website content; (3) the Products, Services or your use of the Products or Services (including Trial Products or Services); (4) any intellectual property or other proprietary right of any person or entity; (5) your violation of any provision of this Agreement; or (6) any information or data you supplied to <span class="company-name">THEBIZROOT MEGACORP LLP</span>. When <span class="company-name">THEBIZROOT MEGACORP LLP</span>. is threatened with suit or sued by a third party, <span class="company-name">THEBIZROOT MEGACORP LLP</span>.] may seek written assurances from you concerning your promise to indemnify <span class="company-name">THEBIZROOT MEGACORP LLP</span>.; your failure to provide such assurances may be considered by <span class="company-name">THEBIZROOT MEGACORP LLP</span>. to be a material breach of this Agreement. <span class="company-name">THEBIZROOT MEGACORP LLP</span>. will have the right to participate in any defense by you of a third-party claim related to your use of any of the Website content or Products, Services, with counsel of <span class="company-name">THEBIZROOT MEGACORP LLP</span>. choice at its expense. <span class="company-name">THEBIZROOT MEGACORP LLP</span>. will reasonably cooperate in any defense by you of a third-party claim at your request and expense. You will have sole responsibility to defend <span class="company-name">THEBIZROOT MEGACORP LLP</span>. against any claim, but you must receive <span class="company-name">THEBIZROOT MEGACORP LLP</span>. prior written consent regarding any related settlement. The terms of this provision will survive any termination or cancellation of this Agreement or your use of the Website or Products.</p><br>
									<p class="strong">VI. PRIVACY</p><br>
									<p><span class="company-name">THEBIZROOT MEGACORP LLP</span>. believes strongly in protecting user and members privacy and providing you with notice of MuscleUP Nutrition 's use of data. Please refer to <span class="company-name">THEBIZROOT MEGACORP LLP</span>. privacy policy, incorporated by reference herein, that is posted on the Website.</p><br>
									<p class="strong">VI. AGREEMENT TO BE BOUND</p><br>
									<p>By using this Website or ordering Products, you acknowledge that you have read and agree to be bound by this Agreement and all terms and conditions on this Website. </p>
									<br><p class="strong">VIII. GENERAL</p><br>
									<p>Force Majeure. <span class="company-name">THEBIZROOT MEGACORP LLP</span>. will not be deemed in default hereunder or held responsible for any cessation, interruption or delay in the performance of its obligations hereunder due to earthquake, flood, fire, storm, natural disaster, act of God, war, terrorism, armed conflict, labor strike, lockout, or boycott.</p><br>
									<p>Cessation of Operation. <span class="company-name">THEBIZROOT MEGACORP LLP</span>. may at any time, in its sole discretion and without advance notice to you, cease operation of the Website and distribution of the Products.</p><br>
									<p>Entire Agreement. This Agreement comprises the entire agreement between you and <span class="company-name">THEBIZROOT MEGACORP LLP</span>. and supersedes any prior agreements pertaining to the subject matter contained herein.</p><br>
									<p>Effect of Waiver. The failure of <span class="company-name">THEBIZROOT MEGACORP LLP</span>. to exercise or enforce any right or provision of this Agreement will not constitute a waiver of such right or provision. If any provision of this Agreement is found by a court of competent jurisdiction to be invalid, the parties nevertheless agree that the court should endeavor to give effect to the parties' intentions as reflected in the provision, and the other provisions of this Agreement remain in full force and effect.</p><br>
									<p>Governing Law; <span class="company-name">Jurisdiction of India. </span>This Website originates from the <span class="company-name">Pune, <span class="company-name">Maharashtra. </span> </span> This Agreement will be governed by the laws of the State of Maharashtra without regard to its conflict of law principles to the contrary. Neither you nor <span class="company-name">THEBIZROOT MEGACORP LLP</span>. will commence or prosecute any suit, proceeding or claim to enforce the provisions of this Agreement, to recover damages for breach of or default of this Agreement, or otherwise arising under or by reason of this Agreement, other than in courts located in State of <span class="company-name">Maharashtra. </span> By using this Website or ordering Products, you consent to the jurisdiction and venue of such courts in connection with any action, suit, proceeding or claim arising under or by reason of this Agreement. You hereby waive any right to trial by jury arising out of this Agreement and any related documents.</p><br>
									<p>Statute of Limitation. You agree that regardless of any statute or law to the contrary, any claim or cause of action arising out of or related to use of the Website or Products or this Agreement must be filed within one (1) year after such claim or cause of action arose or be forever barred.</p><br>
									<p>Waiver of Class Action Rights. BY ENTERING INTO THIS AGREEMENT, YOU HEREBY IRREVOCABLY WAIVE ANY RIGHT YOU MAY HAVE TO JOIN CLAIMS WITH THOSE OF OTHER IN THE FORM OF A CLASS ACTION OR SIMILAR PROCEDURAL DEVICE. ANY CLAIMS ARISING OUT OF, RELATING TO, OR CONNECTION WITH THIS AGREEMENT MUST BE ASSERTED INDIVIDUALLY.</p><br>
									<p>Termination. <span class="company-name">THEBIZROOT MEGACORP LLP</span>. reserves the right to terminate your Membership access to the Website if it reasonably believes, in its sole discretion, that you have breached any of the terms and conditions of this Agreement. Following termination, you will not be permitted to use the Website and <span class="company-name">THEBIZROOT MEGACORP LLP</span>. may, in its sole discretion and without advance notice to you, cancel any outstanding orders for Products, Services. If your access to the Website is terminated, <span class="company-name">THEBIZROOT MEGACORP LLP</span>. reserves the right to exercise whatever means it deems necessary to prevent unauthorized access of the Website. This Agreement will survive indefinitely unless and until <span class="company-name">THEBIZROOT MEGACORP LLP</span>. chooses, in its sole discretion and without advance to you, to terminate it.</p><br>
									<p>Domestic Use. <span class="company-name">THEBIZROOT MEGACORP LLP</span>. makes no representation that the Website, Products, Services or Member are appropriate or available for use in locations outside India. Users who access the Website from outside India do so at their own risk and initiative and must bear all responsibility for compliance with any applicable local laws. Assignment. You may not assign your rights and obligations under this Agreement to anyone. <span class="company-name">THEBIZROOT MEGACORP LLP</span>. may assign its rights and obligations under this Agreement in its sole discretion and without advance notice to you.</p><br>
									<p>BY USING THIS WEBSITE, BUSINESS MEMBERSHIP OR ORDERING PRODUCTS, SERVICES FROM THIS WEBSITE YOU AGREE 
									TO BE BOUND BY ALL OF THE TERMS AND CONDITIONS OF THIS AGREEMENT.
									</p>
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
