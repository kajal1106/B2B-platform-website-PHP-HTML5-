<option value="">Select City</option>
<?php
require('includes/config.php');
$q = $db->prepare("SELECT * FROM city where stateID =:stateID");
$q->execute(array(':stateID' => $_POST['stateID']));

while($r = $q->fetch(PDO::FETCH_ASSOC))
{?>
<option value="<?php echo $r['cityID'];?>"><?php echo $r['cityName'];?></option>
<?php }
?>
