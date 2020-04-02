<?php
require('includes/config.php');

$id = $_POST['id'];

$stmt = $db->prepare('SELECT message from businessenquriy WHERE businessEnquriyID = :businessEnquriyID');
$stmt->bindParam(':businessEnquriyID', $id, PDO::PARAM_INT);
$stmt->execute();
$r1 = $stmt->fetch(PDO::FETCH_ASSOC);

echo '<p style="font-size:135%;">'.$r1['message'].'</p>';
?>
