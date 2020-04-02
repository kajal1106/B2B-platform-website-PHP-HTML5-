<?php
  include('includes/config.php');
    $stmt = $db->prepare('UPDATE industrysublist SET subindustryName = :subindustryName where IndustrySublistID =:IndustrySublistID');
    $stmt->execute(array(':IndustrySublistID' => $_POST['id'],':subindustryName' => $_POST['name']));


    try {
    }catch(PDOException $e) {
        $error[] = $e->getMessage();
        echo $e->getMessage();
    }
?>
