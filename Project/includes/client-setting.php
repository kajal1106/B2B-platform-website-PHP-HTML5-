
<form class="form-horizontal" action = "includes/clientchange.php" method="POST" >


<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="curpass">Current Password</label>
  <div class="col-md-4">
    <input id="curpass" name="curpass" type="password" placeholder="" class="form-control input-md" required="" / >

  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newpass">New-Password</label>
  <div class="col-md-4">
    <input id="newpass" name="newpass" type="password" placeholder="" class="form-control input-md" required="" />

  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="repass">Re-Enter Password</label>
  <div class="col-md-4">
    <input id="repass" name="repass" type="password" placeholder="" class="form-control input-md" />

  </div>
</div>

<!-- Button -->
<div class="form-group ">

  <div class="col-md-4 col-md-offset-4">
    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary" style="background-color: #0b3c5d;border-color: #0b3c5d;">Submit</button>
  </div>
</div>

</form>
