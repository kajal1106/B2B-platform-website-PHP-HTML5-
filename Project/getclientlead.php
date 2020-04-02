<?php
require('includes/config.php');

$id = $_POST['id'];

$stmt = $db->prepare('SELECT * from clientlead WHERE clientLeadId = :clientLeadId');
$stmt->bindParam(':clientLeadId', $id, PDO::PARAM_INT);
$stmt->execute();
$r1 = $stmt->fetch(PDO::FETCH_ASSOC);
echo '<div class="row">


        <div class="col-md-10 col-md-offset-1">
<div class="form-group padding-top-10 padding-bottom-10">
						  <label class="col-md-3 col-xs-3 col-sm-3 col-lg-3 control-label" for="name">Name:</label>
						  <div class="col-md-9 col-xs-9 col-sm-9 col-lg-9">
              <input type="text" class="form-control" id="name" value="'.$r1['clientName'].'" name="name" disabled/>
						  </div>
						</div>
						<div class="form-group padding-top-10 padding-bottom-10">
						  <label class="col-md-3 col-xs-3 col-sm-3 col-lg-3 control-label" for="email">Email:</label>
						  <div class="col-md-9 col-xs-9 col-sm-9 col-lg-9">
              <input type="email" class="form-control" id="eemail" value="'.$r1['businessEmail'].'" name="email" disabled/>
						  </div>
						</div>
						<div class="form-group padding-top-10 padding-bottom-10">
						  <label class="col-md-3 col-xs-3 col-sm-3 col-lg-3 control-label" for="mobile">Mobile No:</label>
						  <div class="ol-md-9 col-xs-9 col-sm-9 col-lg-9">
              <input type="number" class="form-control" id="mobileno" value="'.$r1['businessMobile'].'" name="mobile" disabled/>
						  </div>
						</div>
        <!-- Multiple Radios (inline) -->
<div class="form-group padding-top-10 padding-bottom-10">
  <label class="col-md-4 col-xs-4 control-label" for="radios">offer type</label>
  <div class="col-md-8 col-xs-8">';
  if($r1['offerType']=='buy')
  {
    echo'<label class="radio-inline" for="radios-0">
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
    echo'<label class="radio-inline" for="radios-0">
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
    echo'<label class="radio-inline" for="radios-0">
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
  <label class="col-md-4 col-xs-4 control-label" for="radios">Lead Name</label>
  <div class="col-md-8 col-xs-8">
        <input type="text" class="form-control" id="leadname" value="'.$r1['leadName'].'" placeholder="Lead Name" disabled><br>
</div>
</div>
<div class="form-group padding-top-10 padding-bottom-10">
  <label class="col-md-4 col-xs-4 control-label" for="radios">Lead Description</label>
  <div class="col-md-8 col-xs-8">
        <textarea type="text" class="form-control" id="leadde" placeholder="Lead Description" rows="6" cols="15" disabled>'.$r1['leadDescription'].'</textarea>
        </div>
 </div>



        <div class="row ">

  <div class="col-md-4 col-md-offset-3 col-sm-4 col-sm-offset-3 col-xs-6 col-lg-offset-3 col-lg-4" >



  <div class="col-md-4  col-sm-4  col-xs-6  col-lg-4 " >
  <div class="small-img-box ">';
  $stmt = $db->prepare('SELECT * from businessleadimage WHERE businessLeadId = :businessLeadId');
  $stmt->bindParam(':businessLeadId', $id, PDO::PARAM_INT);
  $stmt->execute();
  $i=1;
  while($r1 = $stmt->fetch(PDO::FETCH_ASSOC))
  {
                  echo '<img  class="img-box" src="'.DIR.$r1['imagePath'].'" alt="blog entry" >
					                 <div class="row text-center" >
                           <button id="moveFile'.$i.'" name="moveFile'.$i.'" class="btn btn-xs btn-success col-md-6  col-sm-6  col-xs-6 col-lg-6  "><span><i class="fa fa-pencil" style="color:white;" aria-hidden="true"></i></span>
                          <input type="file" id="fileName'.$i.'"  name="fileName'.$i.'"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" ></button>
                          <input type="submit" id="move'.$i.'" name="move'.$i.'" style ="display: none;">
                         <button class="btn btn-xs btn-danger col-md-6  col-sm-6  col-xs-6  col-lg-6 " > <span><i class="fa fa-times" style="color:white;" aria-hidden="true"></i></span></button>
                         </div>';
                         $i=$i+1;
  }
echo '</div>

  </div>



  </div>
  </div>


        </div>


        ';
?>
