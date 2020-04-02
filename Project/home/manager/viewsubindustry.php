<?php
  include('includes/config.php');
  $id=$_POST['id'];
?>

<ol>
  <?php
  $stmtfetch = $db->prepare('SELECT * FROM industrysublist WHERE industryID = :industryID');
  $stmtfetch->execute(array(':industryID' => $id));
  while($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
  {
echo '<li>'.$row['subindustryName'].'</li>';
}
?>
</ol>
