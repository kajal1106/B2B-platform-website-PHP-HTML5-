
<?php
session_start();
include('config.php');
$pid =  $_SESSION['businessID'];


       
                          try{
                           $results = $db->prepare("select * from prductwishlist where productID = :id and businessID =:bid ");
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
                           //$sub= $results->fetchALL(PDO::FETCH_BOTH);
                             $wish= $results->fetchALL(PDO::FETCH_BOTH);
                            if(isset($wish[0][0]) && !empty($wish[0][0])) {
							echo 2;
							
							}


                        else {


                          try{
                           $results = $db->prepare("insert into prductwishlist values(NULL,:pid,:uid); ");
                           $results->bindParam(':pid',$_POST['pid'],PDO::PARAM_INT);
                            $results->bindParam(':uid',$_SESSION['businessID'],PDO::PARAM_STR);
                           $results->execute();
                           }
                           catch (Exception $ex) {
                              //echo $ex;
                           echo $ex;
                           //  echo "failed";
                               
                           exit();
                           }
                                  
 echo 'sucess';
 
						}
								  
?>
