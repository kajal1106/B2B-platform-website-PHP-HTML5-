<?php

$link = mysqli_connect("localhost", "root", "", "thebizroot");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

 
 
 //work exp. start

$news = mysqli_real_escape_string($link, $_REQUEST['news']);


$sql="INSERT INTO newsletter(email) VALUES ('$news')";


if(mysqli_query($link, $sql)){
	//&& mysqli_query($link, $sql1) && mysqli_query($link, $sql2) && mysqli_query($link, $sql3) && mysqli_query($link, $sql4) && mysqli_query($link, $sql5) ){   
	echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	 
}
 
// close connection
mysqli_close($link);
?>