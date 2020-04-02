
  <option value="">Select State</option>
  <?php
  require('includes/config.php');
  $q = $db->prepare("SELECT * FROM state where countryID =:countryID");
  $q->execute(array(':countryID' => $_POST['countryID']));

  while($r = $q->fetch(PDO::FETCH_ASSOC))
  {?>
  <option value="<?php echo $r['stateID'];?>"><?php echo $r['stateName'];?></option>
 <?php }
 ?>
