<?php
include('includes/config.php');
if(isset($_POST["query"]))
 {
    if($_POST['typelist']=="business")
    {
      $output = '';
      $query = "SELECT * FROM businessprofile left JOIN business ON businessprofile.businessID = business.businessID WHERE business.isActive ='Yes' and businessprofile.companyName LIKE '%".$_POST["query"]."%' ";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $output = '<ul class="list-unstyled">';

           while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {
                $output .= '<li>'.$row["companyName"].'</li>';
           }
      $output .= '</ul>';
      echo $output;
    }
    else if($_POST['typelist']=="product")
    {
      $output = '';
      $query = "SELECT * FROM porductinformation WHERE productName LIKE '%".$_POST["query"]."%' ";
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
    else if($_POST['typelist']=="lead")
    {
      $output = '';
      $query = "SELECT * FROM businesslead WHERE leadName LIKE '%".$_POST["query"]."%' ";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $output = '<ul class="list-unstyled">';

           while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {
                $output .= '<li>'.$row["leadName"].'</li>';
           }
      $query = "SELECT * FROM clientlead WHERE leadName LIKE '%".$_POST["query"]."%' ";
      $stmt = $db->prepare($query);
      $stmt->execute();

           while($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {
                $output .= '<li>'.$row["leadName"].'</li>';
           }
      $output .= '</ul>';
      echo $output;
    }
      
 }
 ?>
