<?php

	require_once 'includes/connection.php';

	$id = htmlspecialchars($_GET['id']);

	$query = 'select
		p.mlprID as ID,
		concat(l.librFName, " ", l.librLName) as Librarian,
		a.adptName as Department,
		r.rqstName as requester,
		p.mlprTitle as Title,
		p.mlprAuthor as Author,
		p.mlprISBN as isbn,
		p.mlprRush as rush,
		p.mlprNotes as notes,
		p.mlprDate as Date,
		p.mlprStatus as action,
		p.mlprReason as reason
		from purchase_request p, librarians l, academic_department a, requesters r
		where l.librID=p.mlprlibrID and a.adptID=p.mlpradptID and r.rqstID=p.mlprRequester and p.mlprArchived="n" and mlprID=?
		order by mlprID desc';

	$row = array();
	$stmt = mysqli_prepare($dbc, $query);
	mysqli_stmt_bind_param($stmt, 'i', $id);
	mysqli_stmt_execute($stmt) or die('Failed to get request record: ' . mysqli_error($dbc));
	mysqli_stmt_store_result($stmt);
	mysqli_stmt_bind_result($stmt, $row['id'], $row['librarian'], $row['dept'], $row['requester'], $row['title'],
		$row['author'], $row['isbn'], $row['rush'], $row['notes'], $row['date'], $row['action'], $row['reason']);
	mysqli_stmt_fetch($stmt);

	echo '<table>
		<tr><th>Requester</th><td>'.$row['requester'].'</td></tr>
		<tr><th>Librarian</th><td>'.$row['librarian'].'</td></tr>
		<tr><th>Department</th><td>
			<select class="depts" id="dept">';
				$query = 'select adptID as id, adptName as name from academic_department where adptActive="yes"';
				$result = mysqli_query($dbc, $query) or die('Failed to get librarians: ' . mysqli_error($dbc));
				while ($dept = mysqli_fetch_assoc($result)) {
					echo '<option id="adpt'.$dept['id'].'" value="'.$dept['id'].'"'.($row['dept']===$dept['name'] ? ' selected':'').'>'.$dept['name'].'</option>';
				}
				mysqli_free_result($result);
			echo '</select>
		</td></tr>
		<tr><th>Title</th><td>'.$row['title'].'</td></tr>
		<tr><th>Author</th><td>'.$row['author'].'</td></tr>
		<tr><th>ISBN</th><td>'.$row['isbn'].'</td></tr>
		<tr><th>Rush?</th><td>'.$row['rush'].'</td></tr>
		<tr><th>Notes</th><td>'.$row['notes'].'</td></tr>
		<tr><th>Date</th><td>'.$row['date'].'</td></tr>
		<tr><th>Action</th><td>
			<select class="actions" id="action">
				<option '.($row['action']==='' ? 'selected' : '').' value=""></option>
				<option '.($row['action']==='a' ? 'selected' : '').' value="a">Approved</option>
				<option '.($row['action']==='d' ? 'selected' : '').' value="d">Declined</option>
				<option '.($row['action']==='m' ? 'selected' : '').' value="m">Maybe</option>
			</select>
		</td></tr>
		<tr><th>Reason</th><td><input type="text" id="reason" maxlength="300" value="'.$row['reason'].'"></input>
		<tr><th></th><td><input type="hidden" id="rowid" value="'.$id.'"></input><input type="submit" id="submit" value="Save"></input>
		<tr><th></th><td id="result">&nbsp;</td>
	</table>';

	mysqli_stmt_free_result($stmt);

?>