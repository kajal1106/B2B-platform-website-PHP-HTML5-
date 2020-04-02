<?php
include('includes/config.php');
if(isset($_POST["query"]))
 {
      $output = '';
      $query = "SELECT * FROM businesslead WHERE leadName LIKE '%".$_POST["query"]."%'";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $output = '<ul class="list-unstyled">';

           while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {
                $output .= '<li>'.$row["leadName"].'</li>';
           }
      $output .= '</ul>';
      echo $output;
 }
 ?>
