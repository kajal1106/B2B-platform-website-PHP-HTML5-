<?php
  include('includes/config.php');

?>
<div class="row">
  <?php
  $stmtfetch = $db->prepare('SELECT * FROM industrysublist where IndustrySublistID =:IndustrySublistID');
  $stmtfetch->execute(array(':IndustrySublistID' => $_POST['id']));
  $row = $stmtfetch->fetch(PDO::FETCH_ASSOC)
  ?>
    <div class="col-md-10 col-md-offset-1">

         <div class="input-group">
                        <span class="input-group-addon">Sub Industry Name:</span>
                        <input type="text" id="subname" value="<?php echo $row['subindustryName'];?>" name="example-input-prepend2" class="form-control" placeholder="Enter Industry Name" disabled>
                    </div>


    </div>
</div>
