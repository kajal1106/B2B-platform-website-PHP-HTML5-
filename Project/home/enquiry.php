<?php
include('includes/config.php');
include('includes/classes/phpmailer/mailenquiry.php');
define('TheBizRoot','enquiry@thebizroot.com');
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
  			
        $subject = "The Bizroot Enquiry.";
  //			$body = '<p>'.$_POST['name'].' genrated enquiry.</p>
        $body = '<p>Dear Member,<br>

                    Greetings from thebizroot.com<br>

                    There is an inquiry for your product / service from '.$_POST['name'].', Kindly login to view the  inquiry and respond. 

                    Other Details

                    <p>Email:'.$_POST['eemail'] .'</p><br>
                    <p>mobile:'.$_POST['mobile'] .'</p><br>
                    <p>message:'.$_POST['message'] .'</p><br>   

                    Click to view Inquiry details :-  <a href="https://www.thebizroot.com/home">Login</a>
                    <br>
                    For any query, feedback or suggestion, kindly connect with us via email.

                    </p>

                    Kind Regards,<br>
                    TheBizRoot Support';            		

  			$mail = new Mail();
  			$mail->setFrom(TheBizRoot);
  			$mail->addAddress($businessEmail);
  			$mail->subject($subject);
  			$mail->body($body);
  			$mail->send();

			 $subject1 = "Response to your Inquiry posted on thebizroot.com ";
			  $body1 = '<p>Dear Member,<br>
					Greetings from thebizroot.com<br>
					This is to inform you that your Inquiry has been delivered successfully to '.$businessName.' <br>
					Further, for more traders and dealers click on links below<br>
					<a href="https://www.thebizroot.com/home">TheBizRoot</a></br>
					
                    For any query, feedback or suggestion, kindly connect with us via email.
                    

                    </p>

                    Kind Regards,<br>
                    TheBizRoot Support';   
  			$mail = new Mail();
  			$mail->setFrom(TheBizRoot);
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
