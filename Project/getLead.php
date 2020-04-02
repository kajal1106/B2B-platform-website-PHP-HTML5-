<?php
require('includes/config.php');

$id = $_POST['id'];

$stmt = $db->prepare('SELECT * from businesslead WHERE businessLeadId = :businessLeadId');
$stmt->bindParam(':businessLeadId', $id, PDO::PARAM_INT);
$stmt->execute();
$r1 = $stmt->fetch(PDO::FETCH_ASSOC);
echo '<div class="row">


        <div class="col-md-10 col-md-offset-1">
        <div class="form-horizontal">
        <fieldset>


        <div class="form-group padding-top-10 padding-bottom-10">
					<label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="name">Name:</label>
						<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
            <input type="text" class="form-control" id="name" value="'.$r1['businessName'].'" name="name" disabled/>
						</div>
				</div>

						<div class="form-group padding-top-10 padding-bottom-10">
						  <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="email">Email:</label>
						  <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
              <input type="email" class="form-control" id="eemail" value="'.$r1['businessEmail'].'" name="email" disabled/>
						  </div>
						</div>

						<div class="form-group padding-top-10 padding-bottom-10">
						  <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="mobile">Mobile No:</label>
						  <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
              <input type="number" class="form-control" id="mobileno" value="'.$r1['businessMobile'].'" name="mobile" disabled/>
						  </div>
						</div>

        <!-- Multiple Radios (inline) -->
      <div class="form-group padding-top-10 padding-bottom-10">
           <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="radios">offer type</label>
              <div class="col-md-8 col-xs-4 col-sm-8 col-lg-8">';

  if($r1['offerType']=='buy')
  {
    echo '<label class="radio-inline" for="radios-0">
      <input type="radio" name="offerType" id="offerType1" value="buy" checked="checked" disabled>
      '.$r1['offerType'].'
          </label>
      <label class="radio-inline" for="radios-1">
      <input type="radio" name="offerType" id="offerType1" value="sell" disabled>
      Sell
    </label>
    <label class="radio-inline" for="radios-2">
      <input type="radio" name="offerType" id="offerType1" value="business" disabled>
      Business
    </label>';
  }else if($r1['offerType']=='sell'){
    echo '<label class="radio-inline" for="radios-0">
      <input type="radio" name="offerType" id="offerType1" value="sell" checked="checked" disabled>
      '.$r1['offerType'].'
    </label>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="offerType" id="offerType1" value="buy" disabled>
      Buy
    </label>
    <label class="radio-inline" for="radios-2">
      <input type="radio" name="offerType" id="offerType1" value="business"disabled>
      Business
    </label>';
  }else {
    echo '<label class="radio-inline" for="radios-0">
      <input type="radio" name="offerType" id="offerType1" value="business" checked="checked" disabled>
      '.$r1['offerType'].'
    </label>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="offerType" id="offerType1" value="buy" disabled>
      Buy
    </label>
    <label class="radio-inline" for="radios-2">
      <input type="radio" name="offerType" id="offerType1" value="sell" disabled>
      Sell
    </label>';
  }

  echo '</div>
  </div>


          <div class="form-group padding-top-10 padding-bottom-10">
              <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="radios">Lead Name</label>
              <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
              <input type="text" class="form-control" id="leadname" value="'.$r1['leadName'].'" placeholder="Lead Name" disabled><br>
              </div>
          </div>

          <div class="form-group padding-top-10 padding-bottom-10">
              <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="radios">Lead Description</label>
              <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
               <textarea type="text" class="form-control" id="leadde" placeholder="Lead Description" rows="6" cols="15" disabled>'.$r1['leadDescription'].'</textarea>
             </div>
          </div>

<hr>

        <div class="row" >





  <div class="col-md-12  col-sm-12  col-xs-12  col-lg-12 " >
  <div class="small-img-box ">';
  $stmt = $db->prepare('SELECT * from businessleadimage WHERE businessLeadId = :businessLeadId');
  $stmt->bindParam(':businessLeadId', $id, PDO::PARAM_INT);
  $stmt->execute();
  $i=0;
  while($r1 = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    $a[$i] = $r1['imagePath'];
    $b[$i] = $r1['businessLeadImageID'];
    $i++;
  }
  echo '<div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 thumbnail " >
  <div class="figure">
                  <form id="uploadForm1" >
                  <div id="targetLayer1">
                    <img  id="uploadPreviewc1" class="small-img-box" src="'.DIR.$a[0].'"  border="1" alt="Image Not Available" >
                	</div>

                   <label class="btn btn-xs btn-success leadslabel"><i class="fa fa-pencil" aria-hidden="true"></i>ADD
                     <input type="file"   name="userImage1"  accept="image/x-png,image/gif,image/jpeg" onchange="submitclick();" style ="display: none; ">
                   </label>

                   <input type="hidden" value="'.$b[0].'" name="abc1"/>
                   	<input type="submit" value="Submit" id="move1" style ="display: none; "/>
                    </form>
                    <button class="btn btn-xs btn-danger leadslabel" id="'.$b[0].'" onclick="deletelogo1(this.id)" ><i class="fa fa-times" aria-hidden="true"></i>REMOVE
                    </button>

              </div>

  </div>


  <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 thumbnail" >
  <div class="figure">
    <form id="uploadForm2" >
    <div id="targetLayer2">
      <img  id="uploadPreviewc1" class="small-img-box" src="'.DIR.$a[1].'"  border="1" alt="Image Not Available" >
    </div>

     <label class="btn btn-xs btn-success leadslabel"><i class="fa fa-pencil" aria-hidden="true"></i>ADD
       <input type="file"   name="userImage1" accept="image/x-png,image/gif,image/jpeg" onchange="submitclick1();" style ="display: none; ">
     </label>

     <input type="hidden" value="'.$b[1].'" name="abc1"/>
      <input type="submit" value="Submit" id="move2" style ="display: none; "/>
      </form>
      <button class="btn btn-xs btn-danger leadslabel" id="'.$b[1].'" onclick="deletelogo2(this.id)" id=""><i class="fa fa-times" aria-hidden="true"></i>REMOVE
      </button>
              </div>

  </div>

  <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 thumbnail" >
  <div class="figure">
    <form id="uploadForm3" >
    <div id="targetLayer3">
      <img  id="uploadPreviewc1" src="'.DIR.$a[2].'" class="small-img-box"  border="1" alt="Image Not Available" >
    </div>

     <label class="btn btn-xs btn-success leadslabel"><i class="fa fa-pencil" aria-hidden="true"></i>ADD
       <input type="file"   name="userImage1"  accept="image/x-png,image/gif,image/jpeg" onchange="submitclick2();" style ="display: none; ">
     </label>

     <input type="hidden" value="'.$b[2].'" name="abc1"/>
      <input type="submit" value="Submit" id="move3" style ="display: none; "/>
          </form>
          <button class="btn btn-xs btn-danger leadslabel" id="'.$b[2].'" onclick="deletelogo3(this.id)" id=""><i class="fa fa-times" aria-hidden="true"></i>REMOVE
          </button>

              </div>

  </div>

  <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 thumbnail" >
  <div class="figure">
    <form id="uploadForm4" >
    <div id="targetLayer4">
      <img  id="uploadPreviewc1" class="small-img-box" src="'.DIR.$a[3].'"  border="1" alt="Image Not Available" >
    </div>

     <label class="btn btn-xs btn-success leadslabel"><i class="fa fa-pencil" aria-hidden="true"></i>ADD
       <input type="file"   name="userImage1"  accept="image/x-png,image/gif,image/jpeg" onchange="submitclick3();" style ="display: none; ">
     </label>

     <input type="hidden" value="'.$b[3].'" name="abc1"/>
      <input type="submit" value="Submit" id="move4" style ="display: none; "/>
     </form>
     <button class="btn btn-xs btn-danger leadslabel" id="'.$b[3].'" onclick="deletelogo4(this.id)" id=""><i class="fa fa-times" aria-hidden="true"></i>REMOVE
     </button>

              </div>

  </div>








  </div>

  ';
echo '

</fieldset>
<label style="color:red;font-size:10px;font-weight:bold;text-align:center;">*Image should be less than 2MB.</label>

</div>

  </div>



  </div>
  </div>


        </div>


        ';
?>

<script>
function submitclick() {
  //console.log("sad");
  document.getElementById('move1').click();
}
function submitclick1() {
//console.log("sad");
  document.getElementById('move2').click();
}
function submitclick2() {
//console.log("sad");
  document.getElementById('move3').click();
}
function submitclick3() {
//  console.log("sad");
  document.getElementById('move4').click();
}
$(document).ready(function(){

  $("#uploadForm1").on('submit',(function(e) {
		console.log('asa');
		e.preventDefault();
		$.ajax({
        	url: "uploadclient.php",
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
        	url: "uploadclient.php",
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
        	url: "uploadclient.php",
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
        	url: "uploadclient.php",
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

	   });
	}));
});
function deletelogo1(a) {
 //console.log(a);
$.ajax({
 type: "POST",
 url: "leadimgdel.php",
 data: {'id' : a},
 success: function(data) {

     alert('lead image Deleted.');
     $("#targetLayer1").html(data);
 }
     });
}
function deletelogo2(a) {
 //console.log(a);
$.ajax({
 type: "POST",
 url: "leadimgdel.php",
 data: {'id' : a},
 success: function(xml) {

     alert('lead image Deleted.');
     $("#targetLayer2").html(xml);
 }
     });
}
function deletelogo3(a) {
//  console.log(a);
$.ajax({
 type: "POST",
 url: "leadimgdel.php",
 data: {'id' : a},
 success: function(xml) {

     alert('lead image Deleted.');
     $("#targetLayer3").html(xml);
 }
     });
}
function deletelogo4(a) {
//  console.log(a);
$.ajax({
 type: "POST",
 url: "leadimgdel.php",
 data: {'id' : a},
 success: function(xml) {

     alert('lead image Deleted.');
     $("#targetLayer4").html(xml);
 }
     });
}
</script>
