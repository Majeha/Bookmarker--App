
<?php
	function db_connect() 
	{
		$result = new mysqli("127.0.0.1:50645", "azure","6#vWHD_$" , "bookmarks");
		if (!$result) {
			$error_message = 'Could not connect to database server.';
			throw new Exception($error_message);
		} else {
			return $result;
		}
	}
?>