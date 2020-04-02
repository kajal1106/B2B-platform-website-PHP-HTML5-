<?php


 include('config.php');
         try{
                           $results = $db->prepare("SELECT businesscontactinformation.businessName, city.cityName, businessaddress.cityID, city.cityID
FROM  `businesscontactinformation` 
LEFT JOIN businessaddress ON businessaddress.businessID = businesscontactinformation.businessId
LEFT JOIN city ON city.cityID = businessaddress.cityID");
                           $results->execute();
                           }
                           catch (Exception $ex) {
                              //echo $ex;
                           //echo $ex;
                            // echo "failed";
                               
                           exit();
                           }
                         
                             $city= $results->fetchALL(PDO::FETCH_BOTH);
                             
      $ci =  json_encode($city);
echo $ci;




 ?>