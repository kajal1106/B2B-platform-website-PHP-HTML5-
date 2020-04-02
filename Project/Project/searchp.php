<?php
include('includes/config.php');
if(isset($_POST["query"]))
 {
      $output = '';
      $query = "SELECT * FROM porductinformation WHERE productName LIKE '%".$_POST["query"]."%'";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $output = '<ul class="list-unstyled">';

           while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {
                $output .= '<li>'.$row["productName"].'</li>';
           }
      $output .= '</ul>';
      echo $output;
 }
 ?>
