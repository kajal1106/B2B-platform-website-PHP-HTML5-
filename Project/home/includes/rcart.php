<?php
session_start();
include('config.php');
$pid =  $_SESSION['businessID'];


                          try{
                           $results = $db->prepare("DELETE FROM prductwishlist where productID = :id and businessID =:bid ");
                           $results->bindParam(':id',$_POST['pid'],PDO::PARAM_INT);
                            $results->bindParam(':bid',$_SESSION['businessID'],PDO::PARAM_STR);
                           $results->execute();
                           }
                           catch (Exception $ex) {
                              //echo $ex;
                           echo $ex;
                           //  echo "failed";
                               
                           exit();
						   }
						   echo 'success'; 
                           ?>
