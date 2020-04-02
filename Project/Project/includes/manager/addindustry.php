<?php
  include('includes/config.php');
  if(isset($_POST['Add'])){
    $stmt = $db->prepare('select industryName from industrylist where industryName = :industryName');
    $stmt->execute(array(':industryName' => $_POST['addindustry'] ));
    if(!$r1= $stmt->fetch(PDO::FETCH_ASSOC))
    {
    $stmt = $db->prepare('INSERT INTO industrylist (industryName) VALUES (:industryName)');
    $stmt->execute(array(':industryName' => $_POST['addindustry'] ));
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
