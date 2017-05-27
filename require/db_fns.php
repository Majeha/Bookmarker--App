
<?php
	function db_connect() 
	{
		$result = new mysqli("localhost", "root","" , "bookmarks");
		if (!$result) {
			$error_message = 'Could not connect to database server.';
			throw new Exception($error_message);
		} else {
			return $result;
		}
	}
?>