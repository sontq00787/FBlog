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
		$this->conn = $db->connect();
	}
	/* ------------- `users` table method ------------------ */
	
	/**
	 * Creating new user
	 *
	 * @param String $name
	 *        	User name
	 * @param String $email
	 *        	User login email id
	 * @param String $password
	 *        	User login password
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
	
	public function createUserByAdmin($name, $email, $password,$status, $display_name, $user_group) {
		require_once 'PassHash.php';
		$response = array ();
	
		// First check if user already existed in db
		if (! $this->isUserExists ( $email )) {
			// Generating password hash
			$password_hash = PassHash::hash ( $password );
				
			// Generating API key
			$activation_key = $this->generateActivationKey ();
				
			// insert query
			$stmt = $this->conn->prepare ( "INSERT INTO users(user_name, user_email, user_pass, user_status, display_name, user_activation_key, user_group) values(?, ?, ?, ?, ?, ?, ?)" );
			$stmt->bind_param ( "sssissi", $name, $email, $password_hash, $status, $display_name, $activation_key, $user_group );
				
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
	 * Checking user login
	 *
	 * @param String $email
	 *        	User login email id
	 * @param String $password
	 *        	User login password
	 * @return boolean User login status success/fail
	 */
	public function checkLogin($email, $password) {
		require_once 'PassHash.php';
		// fetching user by user_name or email
		$stmt = $this->conn->prepare ( "SELECT user_pass FROM users WHERE user_name = ? OR user_email = ?" );
		$stmt->bind_param ( "ss", $email, $email );
		
		$stmt->execute ();
		
		$stmt->bind_result ( $password_hash );
		
		$stmt->store_result ();
		
		if ($stmt->num_rows > 0) {
			// Found user with the email
			// Now verify the password
			
			$stmt->fetch ();
			
			$stmt->close ();
			
			if (PassHash::check_password ( $password_hash, $password )) {
				// User password is correct
				return TRUE;
			} else {
				// user password is incorrect
				return FALSE;
			}
		} else {
			$stmt->close ();
			
			// user not existed with the email
			return FALSE;
		}
	}
	
	/**
	 * change password function
	 * 
	 * @param String $user        	
	 * @param String $old_pass        	
	 * @param String $new_pass        	
	 * @return boolean
	 */
	public function changePassword($user, $old_pass, $new_pass) {
		if ($this->checkLogin ( $user, $old_pass )) {
			// Generating password hash
			$password_hash = PassHash::hash ( $new_pass );
			
			$stmt = $this->conn->prepare ( "UPDATE users set user_pass = ? WHERE user_name = ?" );
			$stmt->bind_param ( "ss", $password_hash, $user );
			$stmt->execute ();
			$num_affected_rows = $stmt->affected_rows;
			$stmt->close ();
			if ($num_affected_rows > 0)
				return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * Fetching all users
	 */
	public function getAllUsers() {
		$stmt = $this->conn->prepare ( "SELECT id,user_name,user_email,user_registered,user_status,display_name,user_group FROM users" );
		$stmt->execute ();
		$users = $stmt->get_result ();
		$stmt->close ();
		return $users;
	}
	
	/**
	 * Fetching user by userid
	 *
	 * @param String $userid
	 *        	User id
	 */
	public function getUserById($userid) {
		$stmt = $this->conn->prepare ( "SELECT id,user_name,user_email,user_registered,user_status,display_name,user_group FROM users WHERE id = ?" );
		$stmt->bind_param ( "i", $userid );
		if ($stmt->execute ()) {
			// $user = $stmt->get_result()->fetch_assoc();
			$stmt->bind_result ( $id, $user_name, $user_email, $user_registered, $user_status, $display_name, $user_group );
			$stmt->fetch ();
			$user = array ();
			$user ["id"] = $id;
			$user ["user_name"] = $user_name;
			$user ["user_email"] = $user_email;
			$user ["user_registered"] = $user_registered;
			$user ["user_status"] = $user_status;
			$user ["display_name"] = $display_name;
			$user ["user_group"] = $user_group;
			$stmt->close ();
			return $user;
		} else {
			return NULL;
		}
	}
	
	/**
	 * function to delete an user
	 * @param int $userid id of user need delete from db
	 * @return boolean
	 */
	public function deleteAnUser($userid){
		$stmt = $this->conn->prepare ( "DELETE FROM users WHERE id = ?" );
		$stmt->bind_param ( "i", $userid );
		$stmt->execute ();
		$num_affected_rows = $stmt->affected_rows;
		$stmt->close ();
		return $num_affected_rows > 0;
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

	/**
	*
	*
	**/
	public function createCategory($name, $description, $parent_group){
		if ($this->isCategoryExists($name)) {
			# code...
			$stmt = $this->conn->prepare ("insert into categories(name, description, parent_group) values(?,?,?)");
			$stmt->bind_param("sss", $name, $description, $parent_group);
			$result = $stmt->execute();
			$stmt->close ();
			return $result;
		} else {
			echo "Category is existed";
		}
	}

	/**
	* Check existed category
	* @param $name
	* @return boolean
	**/
	public function isCategoryExists($name){
		$stmt = $this->conn->prepare ("select count(*) as count from categories where name = ?");
		$stmt->bind_param("s", $name);
		$stmt->execute();
		$stmt->store_result();
		$num_rows = $stmt->num_rows;
		$stmt->close ();
		return $num_rows > 0;
	}

	/**
	*
	*
	**/
	public function listCategories(){
		$stmt = $this->conn->query("select id, name from categories");
		$results = $stmt->fetch_all();
		$stmt->close ();
		return $results;
	}

	public function tableCategories(){
		$stmt = $this->conn->query("select * from categories");
		$results = $stmt->fetch_all();
		$stmt->close ();
		return $results;
	}

	public function deleteCategory($id){
		$stmt = $this->conn->prepare("delete from categories where id=?");
		$stmt->bind_param("s", $id);
		$results = $stmt->execute();
		$stmt->close ();
		return $results;
	}

	public function editCategory($id, $name, $description, $parent_group) {
		$stmt = $this->conn->prepare("update categories set name = ?, description = ?, parent_group = ? where id=?");
		$stmt->bind_param("ssss", $name, $description, $parent_group, $id);
		$result = $stmt->execute();
		$stmt->close ();
		return $result;
	}
	
	/* ------------- `groups` table method ------------------ */
	/**
	 * Fetching all groups
	 */
	public function getGroups() {
		$stmt = $this->conn->prepare ( "SELECT * FROM groups" );
		$stmt->execute ();
		$groups = $stmt->get_result ();
		$stmt->close ();
		return $groups;
	}
}
?>