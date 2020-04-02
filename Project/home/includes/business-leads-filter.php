

<div class="col-md-3 col-sm-4  hidden-xs"><!-- sidebar column -->
						<div class="sidebar sidebar-wrap ">
								<div class="sidebar-widget shadow-1">
									
								<div class="sidebar-widget-title">
									<ul>
									<li class="filter-tab "><a href="businesses.php" class="col-black">Businesses</a></li>
										<li class="filter-tab"><a href="products.php" class="col-black">Products</a></li>
										<li class="filter-tab act"><a href="business-leads.php" class="col-black">Leads</a></li>

									</ul>

									</div>

									<div class="sidebar-widget-title margin-top-10">
										<ul>
											<li class="filter-tab-1 act"><a href="business-leads.php" class="col-black">Business Leads</a></li>
											<li class="filter-tab-1"><a href="client-leads.php" class="col-black">Client Leads</a></li>

										</ul>

										</div>


							<div>
						<div class="sidebar-widget shadow-1">
								<div class="sidebar-widget-title">
									<h6 class="filter-head"><span class="bgpurpal-1"></span>Type	</h6>
								</div>
								<div class="sidebar-widget-content location-widget clearfix">
									<div class="sidebar-location-widget-wrap">
										<ul>
											<li><a class="nohover col-black" href="javascript:void(0);"><input type="checkbox" class="item_filter type" value="buy" <?php if(in_array('buy',$type)){ echo"checked"; } ?>> buy<span></span></a></li>
											<li><a class="nohover col-black" href="javascript:void(0);"><input type="checkbox" class="item_filter type" value="sell" <?php if(in_array('sell',$type)){ echo"checked"; } ?>> sell <span></span></a></li>
											<li><a class="nohover col-black" href="javascript:void(0);"><input type="checkbox" class="item_filter type" value="business" <?php if(in_array('business',$type)){ echo"checked"; } ?> > business<span></span></a></li>


										</ul>
								</div>
							</div>

								<div class="sidebar-widget-title center">
									<h6  class="filter-head"><span class="bgyallow-1"></span>Industry</h6>
									<input type="text" class="input-sm center"	 id="myInput2" onkeyup="myFunction2()" placeholder="Search for Industry" title="Type in a name">
								</div>
								<div class="sidebar-widget-content category-widget clearfix">
									<div class="sidebar-category-widget-wrap">
										
										<ul id="myUL2">
											<?php
 										 $query = "SELECT * FROM industrylist";
										 $stmt = $db->prepare($query);
						     			 $stmt->execute();
 						         		 while($row = $stmt->fetch(PDO::FETCH_ASSOC))
 						            	 {
 													?>
											<li class="ind single-line-filter" style="display:none" > <a class="nohover col-black"><input type="checkbox" class="item_filter industry" value="<?php echo $row['industryID'];?>"  <?php if(in_array($row['industryID'],$industry)){ echo"checked"; } ?>> <?php echo $row["industryName"];?></a></li>
											<?php
										 }
										 ?>
										</ul>
										<br>
										<button type="button" class="tog showall" >Show All</button>
									</div>
								</div>
							</div>
							<div class="sidebar-widget shadow-1">
								<div class="sidebar-widget-title center">
									<h6  class="filter-head"><span class="bgpurpal-1"></span>Country</h6>
										<input type="text" class="input-sm center" id="myInput1" onkeyup="myFunction1()" placeholder="Search for Country" title="Type in a name">
										
								</div>
								<div class="sidebar-widget-content location-widget clearfix">
									<div class="sidebar-location-widget-wrap">
									

										<ul id="myUL1">
											<?php
		 										 	$query = "SELECT * FROM country";
													$stmt = $db->prepare($query);
													$stmt->execute();
													while($row = $stmt->fetch(PDO::FETCH_ASSOC))
												{
 						             ?>
 											<li class='ind_b' style="display:none;"><a class="single-line-filter col-black"><input type="checkbox" class="item_filter country" value="<?php echo $row['countryID']; ?>" <?php if(in_array($row['countryID'],$country)){ echo"checked"; } ?> > <?php echo $row["countryName"] ?></a></li>

 						<?php }
 						 ?>
										</ul>

										<br>
										<button type="button" class="tog_b showall" >Show All</button>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<script>
function myFunction1() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput1");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL1");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}

function myFunction2() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput2");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL2");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}
</script>
			</div><!-- section container end -->