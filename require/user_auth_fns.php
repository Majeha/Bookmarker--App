<?php
	require_once('db_fns.php');
	function register($username, $email, $password) 
	{
		// register new user with db
		// return true or false
		//connect to db
		$conn = db_connect();
		
		//check if username exists
		$result = $conn->query("select username from tblUser where username ='".$username."'");
		if (!$result) {
			$error_message = 'Could not execute query to database';
			throw new Exception($error_message);
		}
		if ($result->num_rows > 0) {
			$error_message = 'Username exists, '
					. "go back and choose another one.";
			throw new Exception($error_message);
		}
		// insert data into db
		$result = $conn->query("insert into tblUser values ('".$username."', sha1('".$password."'), '".$email."')");
		if(!$result) {
			$error_message = 'Could not register you in database - Please '
					. 'try later again.';
		} else {
			return true;
		}
	}
	function login($username, $password) {
		// check username and passwd with db
		// if yes return true
		// else throw exception
		$conn = db_connect(); 
		$result = $conn->query("select * from tbluser where username='".$username."' and passwd = sha1('".$password."')");
		if (!$result) {
			throw new Exception('Could not log you in.');
		} 
		if ($result->num_rows>0) {
			return true;
		} else {
			throw new Exception('Could not log you in.');
		}
	}
	function check_valid_user() {
		// if somebody log in and exit if not
		if (isset($_SESSION['valid_user'])) {
			echo "Logged in as ".$_SESSION['valid_user'] .".<br>";
		} else {
			echo "You are not logged in.<br>";
			do_html_url('login.php', 'Login');
			do_html_footer();
			exit;
		}
	}
	function change_password($username, $old_passwd, $new_passwd)
	{
		// change passwd for username:old_passwd to new_passwd
		// return true if success
		// else throw an exception
		
		// login 
		login($username, $old_passwd);
		$conn = db_connect();
		$result = $conn->query("update tbluser set passwd = sha1 ('".$new_passwd."') where username = '".$username."'");
		if (!$result) {
			throw new Exception('Password could not be changed, Please try later.');
		} else {
			return true;
		}
	}
	function get_random_str($length = 10)
	{
		// get a random string to be send to user as passwd
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
			. '0123456789-_';
		$charsLength = strlen($chars);
		$str = '';
		for ($i=0; $i<$length; $i++) {
			$str .= $chars{rand(0, $charsLength - 1)};
		}
		return $str;
	}
	function reset_password($username)
	{
		// set username a new random passwd
		// return the passwd or false on failed
		// get a chars between 6 and 13
		$new_password = get_random_str(6,13);

		$conn = db_connect();
		$result = $conn->query("update tblUser set passwd=sha1('".$new_password."') where username='".$username."'");
		if (!$result) {
			throw new Exception('Could not reset password, please try later.');
		} else {
			return $new_password;
		}
	}
	
	function notify_password($username, $password)
	{
		// notify the user that their passwd has been changed
		$conn = db_connect();
		$result = $conn->query("select email from tblUser where username='".$username."'");
		if (!$result || $result->num_rows == 0) {
			throw new Exception('Could not find email.');
		} else {
		$row = $result->fetch_object();
		$email = $row->{'email'};
		$from = 'From: support@bookmarker.com \r\n';
		$msg = "Your Bookmarker password has been changed to ".$password."\r\n".
		"Please change it next time you log in.\r\n";
		$subject = 'Bookmarker account information';
		if (!mail($email, $subject, $msg, $from)) {
			return true;
		} else {
			throw new Exception('Could not send mail.');
		}
		}
	}
?>