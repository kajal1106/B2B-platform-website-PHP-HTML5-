<?php
require('includes/config.php');

$id = $_POST['id'];

$stmt = $db->prepare('SELECT * from clientlead WHERE clientLeadId = :clientLeadId');
$stmt->bindParam(':clientLeadId', $id, PDO::PARAM_INT);
$stmt->execute();
$r1 = $stmt->fetch(PDO::FETCH_ASSOC);
echo '

<style>
.radio-inline{
  text-transform:capitalize;
}
</style>
<div class="row">


         <div class="col-md-12  col-xs-12 col-sm-12">
        <div class="form-horizontal">
        <fieldset>

            <div class="form-group padding-top-10 padding-bottom-15">
						  <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="name">Name:</label>

                 <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
                        <input type="text" class="form-control" id="name" value="'.$r1['clientName'].'" name="name" disabled/>
						      </div>
						</div>

						<div class="form-group padding-top-10 padding-bottom-15">
						  <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="email">Email:</label>
						  <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
              <input type="email" class="form-control" id="email" value="'.$r1['clientEmail'].'" name="email" disabled/>
						  </div>
						</div>

						<div class="form-group padding-top-10 padding-bottom-15">
						  <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="mobile">Mobile No:</label>
						  <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
              <input type="number" class="form-control" id="pwd" value="'.$r1['clientMobile'].'" name="pwd" disabled/>
						  </div>
						</div>
        <!-- Multiple Radios (inline) -->
<div class="form-group padding-top-10 padding-bottom-15">
  <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="radios">Offer Type</label>
  <div class="col-md-8 col-xs-4 col-sm-8 col-lg-8">';
  if($r1['offerType']=='buy')
  {
    echo'<label class="radio-inline" for="radios-0">
      <input type="radio" name="offerType" id="radios-0" value="buy" checked="checked" disabled>
      '.$r1['offerType'].'
    </label>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="offerType" id="radios-1" value="sell" disabled>
      Sell
    </label>
    <label class="radio-inline" for="radios-2">
      <input type="radio" name="offerType" id="radios-2" value="business" disabled>
      Business
    </label>';
  }else if($r1['offerType']=='sell'){
    echo'<label class="radio-inline" for="radios-0">
      <input type="radio" name="offerType" id="radios-0" value="sell" checked="checked" disabled>
      '.$r1['offerType'].'
    </label>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="offerType" id="radios-1" value="buy" disabled>
      Buy
    </label>
    <label class="radio-inline" for="radios-2">
      <input type="radio" name="offerType" id="radios-2" value="business"disabled>
      Business
    </label>';
  }else {
    echo'<label class="radio-inline" for="radios-0">
      <input type="radio" name="offerType" id="radios-0" value="business" checked="checked" disabled>
      '.$r1['offerType'].'
    </label>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="offerType" id="radios-1" value="buy" disabled>
      Buy
    </label>
    <label class="radio-inline" for="radios-2">
      <input type="radio" name="offerType" id="radios-2" value="sell" disabled>
      Sell
    </label>';
  }

  echo '</div>
</div>

 <div class="form-group padding-top-10 padding-bottom-10">
  <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4  control-label" for="radios">Lead Name</label>
  <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
        <input type="text" class="form-control" id="leadname"value="'.$r1['leadName'].'" placeholder="Lead Name" disabled><br>
</div>
</div>
<div class="form-group padding-top-10 padding-bottom-10">
  <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="radios">Lead Description</label>
  <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
        <textarea type="text" class="form-control" id="leadde" placeholder="Lead Description" rows="6" cols="15" disabled>'.$r1['leadDescription'].'</textarea>
        </div>
 </div>
 <hr>

  <div class="row ">
  <div class="col-md-12  col-sm-12  col-xs-12  col-lg-12">
        ';
  $stmt1 = $db->prepare('SELECT * from clientleadimage WHERE clientLeadId = :clientLeadId');
  $stmt1->bindParam(':clientLeadId', $id, PDO::PARAM_INT);
  $stmt1->execute();
  $i=1;
  while($r2 = $stmt1->fetch(PDO::FETCH_ASSOC))
  {
      echo '<img  class="inline img-box thumbnail margin-right-5 margin-left-5 col-xs-6" src="'.DIR.$r2['imagePath'].'" alt="Image Not Available" >';
  }
echo '

</div>
  </div>
  </fieldset>
  </div>
</div>

        </div>


        ';
?>
