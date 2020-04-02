<?php
$connect = mysqli_connect("localhost", "root", "", "project");
$query = "SELECT * FROM industrylist ";
$result = mysqli_query($connect, $query);
?>


<div id="main" style="height:610px;width:100%;margin:0;>
 <ul class="list-group">
  <?php
						 while($row = mysqli_fetch_array($result))
						 {
						  echo '
						 
						  <li class="list-group-item">'.$row["industryName"].'</li>
						  
						  ';
						 }
						 ?>
    <!--li class="list-group-item">First item</li>
    <li class="list-group-item">Second item</li>
    <li class="list-group-item">Third item</li>
    <li class="list-group-item">Third item</li>
    <li class="list-group-item">Third item</li>
    <li class="list-group-item">Third item</li>
    <li class="list-group-item">Third item</li>
    <li class="list-group-item">Third item</li>
    <li class="list-group-item">Third item</li>
    <li class="list-group-item">Third item</li>
    <li class="list-group-item">Third item</li>
    <li class="list-group-item">Third item</li>
    <li class="list-group-item">Third item</li>
    <li class="list-group-item">Third item</li-->
 </ul> 
</div>


       

				



