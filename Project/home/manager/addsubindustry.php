<?php
  include('includes/config.php');
  if(isset($_POST['Add'])){
  	$stmt = $db->prepare('select subindustryName from industrysublist where subindustryName= :subindustryName');
    $stmt->execute(array(':subindustryName' => $_POST['subindustry'] ));
    if(!$r1= $stmt->fetch(PDO::FETCH_ASSOC))
    {
    $stmt = $db->prepare('INSERT INTO industrysublist (industryID,subindustryName) VALUES (:industryID,:subindustryName)');
    $stmt->execute(array(':industryID' => $_POST['industryn'],':subindustryName' => $_POST['subindustry'] ));


    echo "<script type='text/javascript'>alert('industry added successfully..');</script>";

   header('Location: industries.php?action=success');
    }else
    {	
    
    header('Location: industries.php?action=error');
    }
    
    try {
    }catch(PDOException $e) {
        $error[] = $e->getMessage();
        echo $e->getMessage();
    }
  }
?>
