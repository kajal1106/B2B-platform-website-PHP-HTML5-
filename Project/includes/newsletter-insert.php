<?php

  require_once('config.php');

  $result = 0;
  
  $news  = trim($_POST["news"]);

 

//prepare sql and bind parameters
   
	
	try {
		$stmt = $db->prepare("INSERT INTO newsletter(newsemail) VALUES (:news)");
    
    $stmt->bindParam(':news', $news);
		$stmt->execute();
	}
	
	catch(exception $e) {
		echo $e;
		exit();
		
	}

   

    // insert a row
    /*if(){

      $result =1;

    }*/
         $result = 1;
    echo $result;

    $dbconn = null;
	?>