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

<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12" >

<div class="panel panel-default">
<div class="panel-heading">Images</div>
<div class="panel-body">
  <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 " >

    <?php
        $stmt1 = $db->prepare('SELECT * from productimage WHERE productID = :productID');
        $stmt1->bindParam(':productID', $id, PDO::PARAM_INT);
        $stmt1->execute();
        $i=0;
        while($r = $stmt1->fetch(PDO::FETCH_ASSOC))
        {
          $a[$i] = $r['productImage'];
          $b[$i++] = $r['imagePath'];
     } ?>

              <div class="small-img-box">
                  <div class="preview1">
                      <img src="<?php echo DIR.$b[0]?>" style="width: 100px; height: 100px;" alt="Image Not Available" >
                  </div>
                 
                 <button type= "button" id="<?php echo $a[0] ?>" class="btn btn-xs btn-danger" onclick="deletelogo1(this.id)" ><i class="fa fa-times"></i></button>
              </div>
              <div class="small-img-box">
                  <div class="preview2">
                       <img src="<?php echo DIR.$b[1]?>" style="width: 100px; height: 100px;" alt="Image Not Available" >
                  </div>
                
                 <button type= "button" id="<?php echo $a[1]?>" class="btn btn-xs btn-danger" onclick="deletelogo2(this.id)" ><i class="fa fa-times"></i></button>
              </div>
              <div class="small-img-box">
                  <div class="preview3">
                                     <img src="<?php echo DIR.$b[2]?>" style="width: 100px; height: 100px;" alt="Image Not Available" >

                  </div>
                 <button type= "button" id="<?php echo $a[2]?>" class="btn btn-xs btn-danger" onclick="deletelogo3(this.id)" ><i class="fa fa-times"></i></button>
              </div>
              <div class="small-img-box">
                  <div class="preview4">
                                       <img src="<?php echo DIR.$b[3]?>" style="width: 100px; height: 100px;" alt="Image Not Available" >

                  </div>
                 <button type= "button" id="<?php echo $a[3]?>" class="btn btn-xs btn-danger" onclick="deletelogo4(this.id)" ><i class="fa fa-times"></i></button>
              </div>
              
  </div>

</div>
</div>
</div>

<div class="col-md-8  col-sm-8 col-lg-8 col-xs-12 padding-70 padding-bottom-30">

<div class="panel panel-default">
<div class="panel-heading">Information</div>
<div class="panel-body">

<div class="form-horizontal">
      <!-- Select Basic -->


      <!-- Multiple Radios (inline) -->
      <div class="form-group">
        <label class="col-md-4 col-xs-2 col-sm-4 col-lg-4  control-label" for="radios">Select </label>
        <div class="col-md-8 col-xs-10 col-sm-8 col-lg-8">
          <?php
          if($r1['productType']=='product')
          {
          ?>
          <label class="radio-inline" for="radios-0">
            <input type="radio" name="productType" id="xproductType" value="product" checked="checked" disabled>
            Product
          </label>
          <label class="radio-inline" for="radios-1">
            <input type="radio" name="productType" id="xproductType" value="service" >
            Service
          </label>
        <?php } else {
          ?>
          <label class="radio-inline" for="radios-0">
            <input type="radio" name="productType" id="xproductType" value="service" checked="checked" disabled>
            Service
          </label>
          <label class="radio-inline" for="radios-1">
            <input type="radio" name="productType" id="xproductType" value="product" >
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
<div class="form-group">

  <div class="col-md-2 col-md-offset-4 col-xs-2 col-xs-offset-2 col-sm-2 col-sm-offset-2">
    <button id="editproduct" name="" class="btn btn-info editproduct">EDIT</button>
  </div>
  <div class="col-md-2 col-md-offset- col-xs-2 col-xs-offset-1 col-sm-2 col-sm-offset-1">
    <button id="<?php echo $r1['productID'];?>" class="btn btn-success updateproduct1" disabled>UPDATE</button>
  </div>
</div>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
  $("#xproductType").attr('disabled', true);
$(".editproduct").click(function(){
  console.log('213561');
$("#productdesc").prop("disabled", false );
$("#poffer").prop("disabled", false );
$(".updateproduct1").prop("disabled", false );
$("#productname").prop( "disabled", false );
//$("#xproductType").prop( "disabled", false );
});

$(".updateproduct1").click(function(){
  //console.log('213561');
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
//  console.log(a);
$.ajax({
 type: "POST",
 url: "productimgdel.php",
 data: {'id' : a},
 success: function(xml) {
      $('.preview1').html(xml);
            //console.log('acs');

     alert('product image Deleted.');
 }
     });
}
function deletelogo2(a) {
//  console.log(a);
$.ajax({
 type: "POST",
 url: "productimgdel.php",
 data: {'id' : a},
 success: function(xml) {
      $('.preview2').html(xml);
           // console.log('acs');

     alert('product image Deleted.');
 }
     });
}
function deletelogo3(a) {
//  console.log(a);
$.ajax({
 type: "POST",
 url: "productimgdel.php",
 data: {'id' : a},
 success: function(xml) {
      $('.preview3').html(xml);
      //console.log('acs');
     alert('Product image Deleted.');
 }
     })

}
function deletelogo4(a) {
//  console.log(a);
$.ajax({
 type: "POST",
 url: "productimgdel.php",
 data: {'id' : a},
 success: function(xml) {
           // console.log('acs');

      $('.preview4').html(xml);
     alert('Product image Deleted.');
 }
     });
}
</script>
