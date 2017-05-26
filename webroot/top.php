<?php
	require_once('../require/global_init.php');
	session_start();
	do_html_header('Top urls!');
try {
		check_valid_user();
		$urls = top_urls($_SESSION['valid_user']);
		display_recommended_urls($urls);
	} catch (Exception $e) {
		echo $e->getMessage();
	}	display_user_menu();
	do_html_footer();
?>