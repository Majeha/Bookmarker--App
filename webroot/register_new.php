<?php 
//include all function for this app
	require_once('../require/global_init.php');
//variables
$email = $_POST['email'];
	$username = $_POST['username'];
	$passwd = $_POST['passwd'];
	$passwd2 = $_POST['passwd2'];

session_start();

try {
	if(!filled_out($_POST)) {
		throw new Exception('You have not filled the form correctly, please try again.');
		
	}
	//email not valid
	if (!valid_email($email)) {
		throw new Exception('That is not a valid email address, please try again');
	}
	// username is too long
		if (strlen($username) > 16 ) {
			throw new Exception('Your username must be up to 16 characters, please go back and try again.');
		}
	//passwd not the same
	if ($passwd != $passwd2) {
		throw new Exception('The passwds you entered do not match, please try again');	
	}
// check if passwd length is ok
	if ((strlen($passwd) < 6) || (strlen($passwd) >64 )) {
		throw new Exception('Your passwd must be between 6 and 64 characters, please try again');
	}
	//attempt to register
	register($username,  $email, $passwd);
	
	//register sesssion varible
$_SESSION['valid_user'] = $username;

//provide a link to login page
do_html_header("");
echo 'Your registeration was successful. Login to start using our baddass bookmarker!';
do_html_url('login.php', '<h2>Go to login page</h2>');

//end page
do_html_footer();
}
catch (Exception $e) {
	do_html_header('Problem:');
	echo $e->getMessage();
	do_html_footer();
	exit;

}








































 ?>