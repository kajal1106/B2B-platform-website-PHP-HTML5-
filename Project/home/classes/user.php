<?php
include('password.php');
class User extends Password{

    private $_db;

    function __construct($db){
    	parent::__construct();

    	$this->_db = $db;
    }

	private function get_user_hash($username){

		try {
			$stmt = $this->_db->prepare('SELECT businessPassword, businessEmail, businessID FROM business WHERE businessEmail = :businessEmail AND isActive="Yes" ');
			$stmt->execute(array('businessEmail' => $username));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
  private function get_client_hash($username){

		try {
			$stmt = $this->_db->prepare('SELECT clientPassword, clientEmail, clientID FROM client WHERE clientEmail = :clientEmail AND isActive="Yes" ');
			$stmt->execute(array('clientEmail' => $username));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function login($username,$password){

		$row = $this->get_user_hash($username);

		if($this->password_verify($password,$row['businessPassword']) == 1){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['businessEmail'] = $row['businessEmail'];
		    $_SESSION['businessID'] = $row['businessID'];
		    return true;
		}
	}


  public function clientlogin($username,$password){

		$row = $this->get_client_hash($username);

		if($this->password_verify($password,$row['clientPassword']) == 1){

		    $_SESSION['clientloggedin'] = true;
		    $_SESSION['clientEmail'] = $row['businessEmail'];
		    $_SESSION['clientID'] = $row['businessID'];
		    return true;
		}
	}
	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}
  public function is_client_logged_in(){
		if(isset($_SESSION['clientloggedin']) && $_SESSION['clientloggedin'] == true){
			return true;
		}
	}

}


?>
