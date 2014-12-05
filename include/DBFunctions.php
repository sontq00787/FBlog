<?php
/**
 * Class to handle all db operations
 * This class will have CRUD methods for database tables
 * 
 * @author SonTQ
 *
 */
class DBFunctions {
	private $conn;
	function __construct() {
		require_once dirname ( __FILE__ ) . '/DbConnect.php';
		// opening db connection
		$db = new DbConnect ();
		$this->conn = $db->connect ();
	}
	/* ------------- `users` table method ------------------ */
	
	/**
	 * Creating new user
	 *
	 * @param String $name User name
	 * @param String $email User login email id
	 * @param String $password User login password
	 */
	public function createUser($name, $email, $password) {
		require_once 'PassHash.php';
		$response = array ();
	
		// First check if user already existed in db
		if (! $this->isUserExists ( $email )) {
			// Generating password hash
			$password_hash = PassHash::hash ( $password );
				
			// Generating API key
			$activation_key = $this->generateActivationKey ();
				
			// insert query
			$stmt = $this->conn->prepare ( "INSERT INTO users(user_name, user_email, user_pass, user_status, display_name, user_activation_key, user_group) values(?, ?, ?, 1, ?, ?, 1)" );
			$stmt->bind_param ( "sssss", $name, $email, $password_hash, $name, $activation_key );
				
			$result = $stmt->execute ();
				
			$stmt->close ();
				
			// Check for successful insertion
			if ($result) {
				// User successfully inserted
				return USER_CREATED_SUCCESSFULLY;
			} else {
				// Failed to create user
				return USER_CREATE_FAILED;
			}
		} else {
			// User with same email already existed in the db
			return EMAIL_ALREADY_EXISTED;
		}
	
		return $response;
	}
	
	/**
	 * Checking for duplicate user by email address
	 *
	 * @param String $email
	 *        	email to check in db
	 * @return boolean
	 */
	private function isUserExists($email) {
		$stmt = $this->conn->prepare ( "SELECT id from users WHERE user_email = ?" );
		$stmt->bind_param ( "s", $email );
		$stmt->execute ();
		$stmt->store_result ();
		$num_rows = $stmt->num_rows;
		$stmt->close ();
		return $num_rows > 0;
	}
	
	/**
	 * Validating user api key
	 * If the api key is there in db, it is a valid key
	 *
	 * @param String $api_key
	 *        	user api key
	 * @return boolean
	 */
	public function isValidActivationKey($api_key) {
		$stmt = $this->conn->prepare ( "SELECT id from users WHERE api_key = ?" );
		$stmt->bind_param ( "s", $api_key );
		$stmt->execute ();
		$stmt->store_result ();
		$num_rows = $stmt->num_rows;
		$stmt->close ();
		return $num_rows > 0;
	}
	
	/**
	 * Generating random Unique MD5 String for user Api key
	 */
	private function generateActivationKey() {
		return md5 ( uniqid ( rand (), true ) );
	}
}
?>