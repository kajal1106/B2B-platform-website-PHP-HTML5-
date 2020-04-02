<?php
include('includes/config.php');
include('includes/classes/phpmailer/mailenquiry.php');
define('Blender','Singh.kajal940@gmail.com');
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

        $to = $_POST['eemail'];
  			$subject = "Blender Enquiry.";
  //			$body = '<p>'.$_POST['name'].' genrated enquiry.</p>
        $body = '<p>Dear Member,<br>

                    Greetings from Vamps<br>

                    There is an inquiry for your product / service from '.$_POST['name'].', Kindly login to view the  inquiry and respond. 

                    Other Details

                    <p>Email:'.$_POST['eemail'] .'</p><br>
                    <p>mobile:'.$_POST['mobile'] .'</p><br>
                    <p>message:'.$_POST['message'] .'</p><br>   

                    Click to view Inquiry details :-  <a href="https://localhost/home">Login</a>

                    For any query, feedback or suggestion, kindly connect with us via email.

                    </p>

                    Kind Regards,<br>
                    Support';            		

  			$mail = new Mail();
  			$mail->setFrom(localhost);
  			$mail->addAddress($to);
  			$mail->subject($subject);
  			$mail->body($body);
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
