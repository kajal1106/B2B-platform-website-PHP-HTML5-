<?php
require('includes/config.php');

$id = $_POST['id'];

$stmt = $db->prepare('SELECT * from clientlead WHERE clientLeadId = :clientLeadId');
$stmt->bindParam(':clientLeadId', $id, PDO::PARAM_INT);
$stmt->execute();
$r1 = $stmt->fetch(PDO::FETCH_ASSOC);
echo '<div class="row">

         <div class="col-md-12  col-xs-12 col-sm-12">
        <div class="form-horizontal">
        <fieldset>



      
<div class="form-group padding-top-1 padding-bottom-15">
						  <label class="col-md-3 col-xs-3 col-sm-3 col-lg-3 control-label" for="name">Name:</label>
						  <div class="col-md-9 col-xs-9 col-sm-9 col-lg-9">
              <input type="text" class="form-control" id="cname" value="'.$r1['clientName'].'" name="name" disabled/>
						  </div>
						</div>
						<div class="form-group padding-top-10 padding-bottom-15">
						  <label class="col-md-3 col-xs-3 col-sm-3 col-lg-3 control-label" for="email">Email:</label>
						  <div class="col-md-9 col-xs-9 col-sm-9 col-lg-9">
              <input type="email" class="form-control" id="cemail" value="'.$r1['clientEmail'].'" name="email" disabled/>
						  </div>
						</div>
						<div class="form-group padding-top-10 padding-bottom-15">
						  <label class="col-md-3 col-xs-3 col-sm-3 col-lg-3 control-label" for="mobile">Mobile No:</label>
						  <div class="col-md-9 col-xs-9 col-sm-9 col-lg-9">
              <input type="number" class="form-control" id="cmobile" value="'.$r1['clientMobile'].'" name="pwd" disabled/>
						  </div>
						</div>
        <!-- Multiple Radios (inline) -->
<div class="form-group padding-top-10 padding-bottom-10">
  <label class="col-md-3 col-xs-3 col-sm-3 col-lg-3 control-label" for="radios">offer type</label>
  <div class="col-md-9 col-xs-9 col-sm-9 col-lg-9">
  <label class="radio-inline" for="radios-0">
      <input type="radio" name="cofferType" id="cofferType" value="buy" checked="checked" disabled>
      '.$r1['offerType'].'
    </label>
    </div>
</div>

 <div class="form-group padding-top-10 padding-bottom-10">
  <label class="col-md-3 col-xs-3 col-sm-3 col-lg-3 control-label" for="radios">Lead Name</label>
  <div class="col-md-9 col-xs-9 col-sm-9 col-lg-9">
        <input type="text" class="form-control" id="cleadname" value="'.$r1['leadName'].'" placeholder="Lead Name" disabled><br>
</div>
</div>
<div class="form-group padding-top-10 padding-bottom-10">
  <label class="col-md-3 col-xs-3 col-sm-3 col-lg-3 control-label" for="radios">Lead Description</label>
  <div class="col-md-9 col-xs-9 col-sm-9 col-lg-9">
        <textarea type="text" class="form-control" id="cleadde" placeholder="Lead Description" rows="6" cols="15" disabled>'.$r1['leadDescription'].'</textarea>
        </div>
 </div>

</fieldset>

        <div class="row ">

  <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" >



  <div class="" >
  <div class="small-img-box "><br>';
  $stmt = $db->prepare('SELECT * from clientleadimage WHERE clientLeadId = :clientLeadId');
  $stmt->bindParam(':clientLeadId', $id, PDO::PARAM_INT);
  $stmt->execute();

  $i=0;
  while($r1 = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    $a[$i] = $r1['imagePath'];
    $b[$i] = $r1['clientLeadImage'];
    $i++;
  }
  echo '<div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 thumbnail" >
  <div class="figure ">
                  <form id="uploadForm1" >
                  <div id="targetLayer1">
                    <img  id="uploadPreviewc1" class="small-img-box" src="'.DIR.$a[0].'" border="1" alt="Image Not Available" >
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


  <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 thumbnail " >
  <div class="figure margin-right-5">
    <form id="uploadForm2" >
    <div id="targetLayer2">
      <img  id="uploadPreviewc1" class="small-img-box" src="'.DIR.$a[1].'" border="1" alt="Image Not Available" >
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
  <div class="figure margin-right-5">
    <form id="uploadForm3" >
    <div id="targetLayer3">
      <img  id="uploadPreviewc1" class="small-img-box" src="'.DIR.$a[2].'"  border="1" alt="Image Not Available" >
    </div>

     <label class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i>ADD
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
  <div class="figure margin-right-5">
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







  <label style="color:red;font-weight: bold;text-align: center;">*Image should be less than 2mb.</label>
  </div>

  <!--image add row-->
  <!--image add row-->
  <div class="">





  </div>';
echo '</div>

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
        	url: "uploadclientlead.php",
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
        	url: "uploadclientlead.php",
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
        	url: "uploadclientlead.php",
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
        	url: "uploadclientlead.php",
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
 url: "clientleadimgdel.php",
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
 url: "clientleadimgdel.php",
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
 url: "clientleadimgdel.php",
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
 url: "clientleadimgdel.php",
 data: {'id' : a},
 success: function(xml) {

     alert('lead image Deleted.');
     $("#targetLayer4").html(xml);
 }
     });
}
</script>
