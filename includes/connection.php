<?php

	if(!$dbc = mysqli_connect('purchasing.db.10301351.hostedresource.com', 'purchasing', 'Rrr0b0tz!!', 'purchasing')) {
		header('HTTP/1.0 500 Internal Server Error');
		die('Failed to connect to the database');
	}

?>
