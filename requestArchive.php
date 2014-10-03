<?php

	$page_title = 'Archive Requests';
	require_once 'includes/header.php';
	require_once 'includes/connection.php';

	if ($_POST) {
		$stmt = mysqli_prepare($dbc, 'update purchase_request set mlprArchived="y" where mlprDate <= str_to_date(?, "%m/%d/%Y")');
		mysqli_stmt_bind_param($stmt, 's', $_POST['date']);
		mysqli_stmt_execute($stmt) or die('Failed to execute query: ' . mysqli_error($dbc));
		$_SESSION['dialogText'] = 'Archived ' . mysqli_affected_rows($dbc) . ' records.';

		header('Location: viewRequests.php');
		exit;
	}

?>

<div class="container">
	<form method="post">
		<label>Archive all records through <input type="text" id="date" name="date"></input>, inclusive</label>
		<br/>
		<input type="submit" value="Submit">
	</form>
</div>

<?php
	$jsOutput .= '$("#date").datepicker();';
	require_once 'includes/footer.php';
?>
