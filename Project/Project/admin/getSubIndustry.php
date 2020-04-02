<option value="">Select sub Industry</option>
<?php
require('includes/config.php');

$q = $db->prepare("SELECT * FROM industrysublist where industryID =:industryID");
$q->execute(array(':industryID' => $_POST['industryID']));

while($r = $q->fetch(PDO::FETCH_ASSOC))
{?>
<option value="<?php echo $r['IndustrySublistID'];?>"><?php echo $r['subindustryName'];?></option>
<?php }
?>
