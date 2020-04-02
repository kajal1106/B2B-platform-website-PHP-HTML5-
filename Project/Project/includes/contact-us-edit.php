<?php 


$output='<form class="form-horizontal padding-top-30 padding-bottom-30">
<fieldset>


<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="">Address</label>
  <div class="col-md-6">                     
    <textarea class="form-control input-sm" id="" name=""></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Mobile No</label>  
  <div class="col-md-6">
  <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-sm">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="">Email</label>  
  <div class="col-md-6">
  <input id="" name="" type="text" placeholder="" class="form-control input-sm">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="">Website</label>  
  <div class="col-md-6">
  <input id="" name="" type="text" placeholder="" class="form-control input-sm">
    
  </div>
</div>

</fieldset>
</form>
';


echo $output;
?>