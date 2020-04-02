<?php
require('includes/config.php');

$id = $_POST['id'];

$stmt = $db->prepare('SELECT * from manager WHERE managerID = :productID');
$stmt->bindParam(':productID', $id, PDO::PARAM_INT);
$stmt->execute();
$r1 = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <input type="text" placeholder="Enter user name" id="username" value ="<?php echo $r1['username']?>" class="form-control input-sm" required disabled><br>
        <input type="email" placeholder="Enter password" id="emailid" value ="<?php echo $r1['email']?>" class="form-control input-sm" required disabled>
        </div>
</div>
