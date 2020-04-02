<?php
require_once('includes/config.php');
//echo "1";

if(isset($_POST['submit'])){
	if(isset($_POST['optradio']))
	{
		if($_POST['optradio']=="business")
		{
			if($_POST['search1']=="")
			{
				header('Location: businesses.php');
			}else{

			$stmtfetch = $db->prepare('SELECT * FROM businessprofile WHERE companyName = :companyName');
			$stmtfetch->execute(array(':companyName' => $_POST['search1']));
			if($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
			{
				header('Location: business-single-listing.php?bid='.$row['businessID']);
			}else {
				echo "<script type='text/javascript'>alert('not found..');</script>";
        $a = $_SERVER['HTTP_REFERER'];
        header('Location: index.php?action=notf');
        exit;
			}}

		}else if($_POST['optradio']=="product") {

			if($_POST['search1']=="")
			{
				header('Location: products.php');
			}else{
      $stmtfetch = $db->prepare('SELECT * FROM porductinformation WHERE productName = :productName');
			$stmtfetch->execute(array(':productName' => $_POST['search1']));
			if($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
			{
				header('Location: product-single-listing.php?pid='.$row['productID']);
			}else {
				echo "<script type='text/javascript'>alert('not found..');</script>";
        $a = $_SERVER['HTTP_REFERER'];
        header('Location: index.php?action=notf');
        exit;
			}}

		}else if($_POST['optradio']=="lead") {

			if($_POST['search1']=="")
			{
				header('Location: business-leads.php');
			}else{
      $stmtfetch = $db->prepare('SELECT * FROM businesslead WHERE leadName = :leadName');
      $stmtfetch->execute(array(':leadName' => $_POST['search1']));
      if($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
      {
            header('Location: lead-single-listing.php?lid='.$row['businessLeadId']);
      }else {
        $stmtfetch = $db->prepare('SELECT * FROM clientlead WHERE leadName = :leadName');
        $stmtfetch->execute(array(':leadName' => $_POST['search1']));
        if($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
        {
              header('Location: client-lead-listing.php?lid='.$row['clientLeadId']);
        }else {
        echo "<script type='text/javascript'>alert('not found..');</script>";
        $a = $_SERVER['HTTP_REFERER'];
        header('Location: index.php?action=notf');
        exit;
      }
      }}
		}

	}
}

 ?>
