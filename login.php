<?php

	$page_title = 'Log in';
	include('includes/header.php');
	include('includes/connection.php');
	include('includes/password.php');

	if (!$site_uses_auth) {
		header('Location: ' . $site_base_url);
	}

	if ($_POST) {

		$row = array();
		$stmt = mysqli_prepare($dbc, 'select userID, userName, userPass, userEmail from users where userName=?');
		mysqli_bind_param($stmt, 's', $_POST['username']);
		mysqli_stmt_execute($stmt) or die('Failed to look up user: ' . mysqli_error($dbc));
		mysqli_stmt_store_result($stmt);
		mysqli_stmt_bind_result($stmt, $row['userID'], $row['userName'], $row['userPass'], $row['userEmail']);
		mysqli_stmt_fetch($stmt);

		if (mysqli_stmt_num_rows($stmt) == 1 && password_verify($_POST['password'], $row['userPass'])) {

			// The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
			$_SESSION['userID'] = $row['userID'];
			$_SESSION['userName'] = $row['userName'];
			$_SESSION['userEmail'] = $row['userEmail'];

			header('Location: ' . $site_base_url);

		} else {

			$_SESSION['dialogText'] = 'Invalid user name or password.';
			header('Location: ' . $site_base_url . 'login.php');

		}
	}

?>

<form method="post">
	<table>
		<tr>
			<th><label for="username">Username</label></th>
			<td><input type="text" name="username" id="username" autofocus value="<?php if (isset($_POST['username'])) { echo $_POST['username']; } ?>" /></td>
		</tr>
		<tr>
			<th><label for="password">Password</label></th>
			<td><input type="password" name="password" id="password" /></td>
		</tr>
	</table>
	<input class="submit" type="submit" name="submit" value="Log in" />
</form>

<?php
	include('includes/footer.php');
?>
