<?php
//	require_once 'includes/header.php';
	require_once 'includes/connection.php';

	if ($_POST) {
//var_dump($_POST);
		$action = '';

		switch ($_POST['action']) {
			case 'a':
				$action = 'a';
				break;
			case 'd':
				$action = 'd';
				break;
			case 'm':
				$action = 'm';
				break;
			default:
				$action = '';
				break;
		}

		// @TODO: Throw exception
		$stmt = mysqli_prepare($dbc, 'update purchase_request set mlprStatus=? where mlprID=?');
		mysqli_stmt_bind_param($stmt, 'si', $action, $_POST['id']);
		if(!mysqli_stmt_execute($stmt)) {
			header('HTTP/1.0 500 Internal Server Error');
			echo 'Failed to execute query: ' . mysqli_error($dbc);
		} else {
			header('HTTP/1.0 200 OK');
			echo 'Set '.$_POST['id'].' to "'.$action.'".';
		}
	}
?>