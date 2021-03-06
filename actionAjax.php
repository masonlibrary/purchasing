<?php
//	require_once 'includes/header.php';
	require_once 'includes/connection.php';

	if ($_POST) {

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

		try {

			$stmt = mysqli_prepare($dbc, 'update purchase_request set mlprStatus=?, mlprReason=?, mlpradptID=? where mlprID=?');
			if (!$stmt) { throw new Exception(''); }
			if(!mysqli_stmt_bind_param($stmt, 'ssii', $action, $_POST['reason'], $_POST['dept'], $_POST['id'])) { throw new Exception(''); }
			if(!mysqli_stmt_execute($stmt)) { throw new Exception(''); }

			header('HTTP/1.0 200 OK');
			echo 'Set '.$_POST['id'].' to "'.$action.'", reason to "'.$_POST['reason'].'".';

		} catch (Exception $e) {

			header('HTTP/1.0 500 Internal Server Error');
			echo 'Failed to execute query: ' . mysqli_error($dbc);

		}
	}
?>
