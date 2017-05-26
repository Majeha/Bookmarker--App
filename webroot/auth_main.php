<?php 
require_once('../require/global_init.php');
session_start();
if (isset($_POST['username']) && isset($_POST['passwd'])) {
	$username = $_POST ['username'];
	$passwd = $_POST ['passwd'];
	try {
			login($username, $passwd);
			$_SESSION['valid_user'] = $username;
			do_html_url('member.php', 'Go to members area');
			} 
			catch (Exception $e){
			do_html_header('Problem:');
			echo 'You could not be logged in.<br> You must be logged in to view this page.';
			do_html_url('login.php', 'Login');
			do_html_footer();
			exit;
		}
	}
	?>