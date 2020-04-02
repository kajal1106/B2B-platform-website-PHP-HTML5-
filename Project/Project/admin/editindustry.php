<?php
  include('includes/config.php');

?>
<div class="row">

    <div class="col-md-10 col-md-offset-1">
      <?php
      $stmtfetch = $db->prepare('SELECT * FROM industrylist where industryID =:industryID');
      $stmtfetch->execute(array(':industryID' => $_POST['id']));
      $row = $stmtfetch->fetch(PDO::FETCH_ASSOC)
      ?>
         <div class="input-group">
                        <span class="input-group-addon">Industry Name:</span>
                        <input type="text" id="industryName" name="example-input-prepend2" value="<?php echo $row['industryName']?>" class="form-control" placeholder="Enter Industry Name" disabled>
                    </div>


    </div>
</div>
