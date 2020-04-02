<?php

  require_once('config.php');

  $result = 0;
  
  $news  = trim($_POST["news"]);

 

//prepare sql and bind parameters
   $stmt = $dbconn->prepare("INSERT INTO newsletter(newsemail) VALUES (:news)");
    
    $stmt->bindParam(':news', $news);

   

    // insert a row
    if($stmt->execute()){

      $result =1;

    }

    echo $result;

    $dbconn = null;