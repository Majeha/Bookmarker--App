<?php
require_once('../require/global_init.php');
session_start();
	do_html_header('Delete');
	check_valid_user();
	if ($url_array = get_user_urls($_SESSION['valid_user'])) {
		display_delete_urls($url_array);
	}
	display_user_menu();
	
	do_html_footer();
?>