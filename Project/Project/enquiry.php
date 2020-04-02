<?php
include('includes/config.php');
include('includes/classes/phpmailer/');
define('Vamps','singh.kajal940@gmail.com');
$stmtfetch = $db->prepare('SELECT businessEmail FROM business WHERE businessID = :businessID');
$stmtfetch->execute(array(':businessID' => $_GET['bid']));
$row1 = $stmtfetch->fetch(PDO::FETCH_ASSOC);
$businessEmail = $row1['businessEmail'];


$stmtfetch = $db->prepare('SELECT businessName FROM businesscontactinformation WHERE businessID = :businessID');
$stmtfetch->execute(array(':businessID' => $_GET['bid']));
$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
$businessName = $row['businessName'];

											
			
if(isset($_POST['submit'])){
  try {
        $stmt = $db->prepare('INSERT INTO businessenquriy (businessID,name,email,mobile,message) VALUES (:businessID,:name,:email,:mobile,:message)');
        $stmt->execute(array(
          ':businessID' => $_POST['bid'],
          ':name' => $_POST['name'],
          ':email' =>  $_POST['eemail'],
          ':mobile' =>  $_POST['mobile'],
          ':message' =>  $_POST['message']
        ));

       // $to = $_POST['businessEmail'];
  			
        $subject = "company's Enquiry.";
  //			$body = '<p>'.$_POST['name'].' genrated enquiry.</p>
        $body = '<p>Dear Member,<br>

                    Greetings from xyz.com<br>

                    There is an inquiry for your product / service from '.$_POST['name'].', Kindly login to view the  inquiry and respond. 

                    Other Details

                    <p>Email:'.$_POST['eemail'] .'</p><br>
                    <p>mobile:'.$_POST['mobile'] .'</p><br>
                    <p>message:'.$_POST['message'] .'</p><br>   

                    Click to view Inquiry details :-  <a href="https://localhost/home">Login</a>
                    <br>
                    For any query, feedback or suggestion, kindly connect with us via email.

                    </p>

                    Kind Regards,<br>
                     Support';            		

  			$mail = new Mail();
  			$mail->setFrom(Vamps);
  			$mail->addAddress($businessEmail);
  			$mail->subject($subject);
  			$mail->body($body);
  			$mail->send();

			 $subject1 = "Response to your Inquiry posted on vamps.com ";
			  $body1 = '<p>Dear Member,<br>
					Greetings from thebizroot.com<br>
					This is to inform you that your Inquiry has been delivered successfully to '.$businessName.' <br>
					Further, for more traders and dealers click on links below<br>
					<a href="https://localhost/home">Vamps</a></br>
					
                    For any query, feedback or suggestion, kindly connect with us via email.
                    

                    </p>

                    Kind Regards,<br>
                    Support';   
  			$mail = new Mail();
  			$mail->setFrom(Vamps);
  			$mail->addAddress($_POST['eemail']);
  			$mail->subject($subject1);
  			$mail->body($body1);
  			$mail->send();

        $a = $_SERVER['HTTP_REFERER'];
        header('Location:'.$a);

    }
    catch(PDOException $e) {
        $error[] = $e->getMessage();
        echo $e->getMessage();
    }
}




?>
