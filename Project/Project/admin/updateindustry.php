<?php
  include('includes/config.php');
    $stmt = $db->prepare('UPDATE industrylist SET industryName = :industryName where industryID =:industryID');
    $stmt->execute(array(':industryID' => $_POST['id'],':industryName' => $_POST['name']));


    try {
    }catch(PDOException $e) {
        $error[] = $e->getMessage();
        echo $e->getMessage();
    }
?>
