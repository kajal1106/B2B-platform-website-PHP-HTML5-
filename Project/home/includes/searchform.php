<!--================================SEARCH FORM SECTION ==========================================-->
<?php

$output='
		
				
					<section id="search-form" class="padding-top-20">
				<div class="">
					<div class="search-form-wrap col-md-6 col-md-offset-2 col-sm-6 col-sm-offset-2 col-xs-8">
						<form class="clearfix" action="#">
							
							<div class=" pull-left">
								<select class="form-control" name="type" >
									<option class="options" value="business">Business</option>
									<option class="options" value="lead">Lead</option>
									<option class="options" value="product">Product</option>
									
								</select>
							</div>

							<div class="input-field-wrap pull-left" style="margin-left:3%;">
								<input class="form-control input-md" name="key-word" placeholder="enter keyword" type="text"/>
							</div>
					
							<div class="submit-field-wrap pull-left">
								<button class="btn btn-default form-control">Search</button>
							</div>
						</form>
					</div>
				</div>
			</section>
				
			
			
			';


		echo $output;
		?>

		