<form action="sendrefral.php" method="POST">
	   <div class="form-group padding-top-10 padding-bottom-15">
<input type="email" name="emailid" placeholder="Enter email id of referral" class="form-control">
</div>
<input type="hidden" name="ref" value="<?php echo $_POST['id']?>">
   <div class="form-group padding-top-10 padding-bottom-15">


<button type="submit" name ="submit" class="btn btn-primary" >Send</button>
</div>
</form>
