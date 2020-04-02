<div class="row padding-top-10 padding-bottom-10">
<?php
require('includes/config.php');

$id = $_POST['id'];

$stmt = $db->prepare('SELECT * from porductinformation WHERE productID = :productID');
$stmt->bindParam(':productID', $id, PDO::PARAM_INT);
$stmt->execute();
$r1 = $stmt->fetch(PDO::FETCH_ASSOC);

// $stmt = $db->prepare('SELECT * from productimage WHERE productID = :productID');
// $stmt->bindParam(':productID', $id, PDO::PARAM_INT);
// $stmt->execute();
//
// while($r1 = $stmt->fetch(PDO::FETCH_ASSOC))
// {
//   $img[]=$r1['imagePath'];
// }

?>


<div class="col-md-12  col-sm-12 col-lg-12 col-xs-12 padding-70 ">

<div class="panel panel-default">
<div class="panel-heading">Information</div>
<div class="panel-body">

<div class="form-horizontal">
      <!-- Select Basic -->


      <!-- Multiple Radios (inline) -->
      <div class="form-group">
        <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4  control-label" for="radios">Select</label>
        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
          <?php
          if($r1['productType']=='product')
          {
          ?>
          <label class="radio-inline" for="radios-0">
            <input type="radio" name="productType" id="xproductType" value="product" checked="checked" disabled>
            Product
          </label>
          <label class="radio-inline" for="radios-1">
            <input type="radio" name="productType" id="xproductType" value="service" disabled >
            Service
          </label>
        <?php } else {
          ?>
          <label class="radio-inline" for="radios-0">
            <input type="radio" name="productType" id="xproductType" value="service" checked="checked" disabled>
            Service
          </label>
          <label class="radio-inline" for="radios-1">
            <input type="radio" name="productType" id="xproductType" value="product" disabled>
            Product
          </label>
        <?php } ?>
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="textinput">Product Name</label>
        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
        <input id="productname" name="productName" type="text" placeholder="" disabled value ="<?php echo $r1['productName'];?>" class="form-control input-md" required="">

        </div>
      </div>

       <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="textinput">Offer %</label>
        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
        <input id="poffer" name="offer" type="number"  size="3" placeholder=""  value ="<?php echo $r1['productOffer'];?>" class="form-control input-md" required="" disabled>

        </div>
      </div>

      <!-- Textarea -->
      <div class="form-group">
        <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="product_description">Product Description</label>
        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
          <textarea class="form-control" id="productdesc" name="productDescription"  rows="10" disabled><?php echo $r1['productDescription'];?></textarea>
        </div>
      </div>


</div>


</div>
</div>
</div>

<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-65 ">

<div class="panel panel-default">
<div class="panel-heading">Images</div>
<div class="panel-body">

<!--div id="wrapper">
<form action="includes/upload-file.php" method="post" enctype="multipart/form-data">
<input class="btn btn-success btn-sm" type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple/>
<input class="btn btn-success btn-sm" type="submit" name="submit_image" value="Upload Image"/>
</form>
<div id="image_preview" style="max-height:100px;max-width:100px;"></div>
</div-->


<!--image add row-->
<div class="row">
  <?php
	$stmt1 = $db->prepare('SELECT * FROM productimage where productID = :productID');
  $stmt1->bindParam(':productID', $id, PDO::PARAM_INT);
  $stmt1->execute();
	$i=0;
	while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
	{
		$a[$i] = $row['imagePath'];
		$b[$i] =$row['productImage'];
		$i++;
	}
		?>

  <style>
  hr.vertical
  {
     width: 0px;
     height: 100%; /* or height in PX */
  }
  </style>

<div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 thumbnail" >
<div class="figure">
                <form id="uploadForm1" >
                <div id="targetLayer1">
                  <img  id="uploadPreviewc1"  class="small-img-box" src="<?php echo DIR.$a[0]?>" style="width: 140px; height: 150px;" alt="Image Not Available" >
              	</div>

                 <label class="btn btn-xs btn-success leadslabel" ><i class="fa fa-pencil" aria-hidden="true"></i>ADD
                   <input type="file" id="fileName1"  name="userImage1"  accept="image/x-png,image/gif,image/jpeg" onchange="submitclick();" style ="display: none; ">
                 </label>

                 <input type="hidden" value="<?php echo $b[0];?>" name="abc1"/>
                 	<input type="submit" value="Submit" id="move1" style ="display: none; "/>
                  </form>
                  <button class="btn btn-xs btn-danger  leadslabel" id="<?php echo $b[0];?>" onclick="deletelogo1(this.id)" id=""><i class="fa fa-times" aria-hidden="true"></i>REMOVE
                  </button>
            </div>

</div>

<div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 thumbnail" >
<div class="figure">
  <form id="uploadForm2" >
  <div id="targetLayer2">
    <img  id="uploadPreviewc1"  class="small-img-box"  src="<?php echo DIR.$a[1]?>" style="width: 120px; height: 150px;" alt="Image Not Available" >
  </div>

   <label class="btn btn-xs btn-success leadslabel"  ><i class="fa fa-pencil" aria-hidden="true"></i>ADD
     <input type="file" id="fileName1"  name="userImage1" accept="image/x-png,image/gif,image/jpeg" onchange="submitclick1();" style ="display: none; ">
   </label>
   <input type="hidden" value="<?php echo $b[1];?>" name="abc1"/>
    <input type="submit" value="Submit" id="move2" style ="display: none; "/>
    </form>
    <button class="btn btn-xs btn-danger leadslabel" id="<?php echo $b[1];?>" onclick="deletelogo2(this.id)" id=""><i class="fa fa-times" aria-hidden="true"></i>REMOVE
     </button>
            </div>

</div>

<div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 thumbnail" >
<div class="figure">
  <form id="uploadForm3" >
  <div id="targetLayer3">
    <img  id="uploadPreviewc1"  class="small-img-box"  src="<?php echo DIR.$a[2]?>" style="width: 120px; height: 150px;" alt="Image Not Available" >
  </div>

   <label class="btn btn-xs btn-success leadslabel" ><i class="fa fa-pencil" aria-hidden="true"></i>ADD
     <input type="file" id="fileName1"  name="userImage1"  accept="image/x-png,image/gif,image/jpeg" onchange="submitclick2();" style ="display: none; ">
   </label>
   <input type="hidden" value="<?php echo $b[2];?>" name="abc1"/>
    <input type="submit" value="Submit" id="move3" style ="display: none; "/>
        </form>
        <button class="btn btn-xs btn-danger leadslabel" id="<?php echo $b[2];?>" onclick="deletelogo3(this.id)" id=""><i class="fa fa-times" aria-hidden="true"></i>REMOVE
          </button>

            </div>

</div>


<div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 thumbnail" >
<div class="figure">
  <form id="uploadForm4" >
  <div id="targetLayer4">
    <img  id="uploadPreviewc1"  class="small-img-box"  src="<?php echo DIR.$a[3]?>"  alt="Image Not Available" >
  </div>

   <label class="btn btn-xs btn-success leadslabel" ><i class="fa fa-pencil" aria-hidden="true"></i>ADD
     <input type="file" id="fileName1"  name="userImage1"  accept="image/x-png,image/gif,image/jpeg" onchange="submitclick3();" style ="display: none; ">
   </label>
   <input type="hidden" value="<?php echo $b[3];?>" name="abc1"/>
    <input type="submit" value="Submit" id="move4" style ="display: none; "/>
   </form>
   <button class="btn btn-xs btn-danger leadslabel" id="<?php echo $b[3];?>" onclick="deletelogo4(this.id)" id=""><i class="fa fa-times" aria-hidden="true"></i>REMOVE
    </button>
            </div>

</div>


</div>

<!--image add row-->
<!--image add row--><br>
<div class="row padding-bottom-45">

</div>
<label style="color:red;font-size:10px;font-weight:bold;text-align:center;">*Image should be less than 2MB.</label>
<!--image add row-->
</div>
</div>
</div>

<div class="form-group">

  <div class="col-md-2 col-md-offset-4 col-xs-2 col-xs-offset-2 col-sm-2 col-sm-offset-2">
    <button id="editproduct" name="" class="btn btn-info editproduct">EDIT</button>
  </div>
  <div class="col-md-2 col-md-offset- col-xs-2 col-xs-offset-1 col-sm-2 col-sm-offset-1">
    <button id="<?php echo $r1['productID'];?>" class="btn btn-success updateproduct1" disabled>UPDATE</button>
  </div>
</div>






</div>

<script>
function submitclick() {
  console.log("sad");
  document.getElementById('move1').click();
}
function submitclick1() {
  console.log("sad");
  document.getElementById('move2').click();
}
function submitclick2() {
  console.log("sad");
  document.getElementById('move3').click();
}
function submitclick3() {
  console.log("sad");
  document.getElementById('move4').click();
}
$(document).ready(function(){

  $("#uploadForm1").on('submit',(function(e) {
		console.log('asa');
		e.preventDefault();
		$.ajax({
        	url: "upload.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
			  {
					console.log(data);
			$("#targetLayer1").html(data);
		    },
		  	error: function()
	    	{
	    	}
	   });
	}));
  $("#uploadForm2").on('submit',(function(e) {
		console.log('asa');
		e.preventDefault();
		$.ajax({
        	url: "upload.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
			  {
					console.log(data);
			$("#targetLayer2").html(data);
		    },
		  	error: function()
	    	{
	    	}
	   });
	}));
  $("#uploadForm3").on('submit',(function(e) {
		console.log('asa');
		e.preventDefault();
		$.ajax({
        	url: "upload.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
			  {
					console.log(data);
			$("#targetLayer3").html(data);
		    },
		  	error: function()
	    	{
	    	}
	   });
	}));
  $("#uploadForm4").on('submit',(function(e) {
		console.log('asa');
		e.preventDefault();
		$.ajax({
        	url: "upload.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
			  {
					console.log(data);
			$("#targetLayer4").html(data);
		    },
		  	error: function()
	    	{
	    	}
	   });
	}));

  $("#xproductType").attr('disabled', true);
$(".editproduct").click(function(){
  console.log('213561');
$("#productdesc").prop("disabled", false );
$("#poffer").prop("disabled", false );
$(".updateproduct1").prop("disabled", false );
$("#productname").prop( "disabled", false );
$("#xproductType").prop( "disabled", false );
});

$(".updateproduct1").click(function(){
  console.log('213561');
$("#productdesc").prop("disabled", true );
$("#poffer").prop("disabled", true );
$(".updateproduct1").prop("disabled", true );
$("#productname").prop( "disabled", true );
$("#xproductType").attr('disabled', true);
id = $(this).attr('id');
$.ajax({
               type: "POST",
               url: "updateproduct.php",
               data: {
                     productdesc: $( "#productdesc" ).val(),
                     poffer: $("#poffer").val(),
                     productname: $( "#productname" ).val(),
                     xproductType: $( "#xproductType" ).val(),
                     'id': id
                    }
           })
           .done(function (msg) {
               alert("Data Saved: " +msg);
           });
});
});
function deletelogo1(a) {
 //console.log(a);
 if(confirm("Are you sure, want to delete?")){
   $.ajax({
    type: "POST",
    url: "productimgdel.php",
    data: {'id' : a},
    success: function(xml) {
        $("#targetLayer1").html(xml);
        alert('product image Deleted.');
    }
        });

				}
}
function deletelogo2(a) {
 //console.log(a
 if(confirm("Are you sure, want to delete?")){
$.ajax({
 type: "POST",
 url: "productimgdel.php",
 data: {'id' : a},
 success: function(xml) {
     $("#targetLayer2").html(xml);
     alert('product image Deleted.');
 }
     });
   }
}
function deletelogo3(a) {
//  console.log(a);\
if(confirm("Are you sure, want to delete?")){
$.ajax({
 type: "POST",
 url: "productimgdel.php",
 data: {'id' : a},
 success: function(xml) {

     alert('product image Deleted.');
     $("#targetLayer3").html(xml);
 }
     });
   }
}
function deletelogo4(a) {
//  console.log(a);
if(confirm("Are you sure, want to delete?")){
$.ajax({
 type: "POST",
 url: "productimgdel.php",
 data: {'id' : a},
 success: function(xml) {

     alert('product image Deleted.');
     $("#targetLayer4").html(xml);
 }
     });
   }
}
</script>
