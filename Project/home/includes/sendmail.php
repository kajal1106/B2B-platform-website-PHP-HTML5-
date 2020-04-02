<?php
$id =$_POST['id'];
?>
<form action="sendrefral.php" method="POST">
<input type="email" name="emailid" placeholder="Enter email id of referral" class="form-control">
<input type="hidden" name="ref" >
<button type="submit" name ="submit" class="btn btn-primary" >Send</button>

</form>
