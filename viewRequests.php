<?php

	require_once 'includes/session.php';
	require_once 'includes/connection.php';
        require_once 'includes/dateFunctions.php';


	$page_title = 'View Collection Purchase Requests';
	require_once 'includes/headerNoMenu.php';



	$query = 'select '.
                'p.mlprID as ID, '.
                'concat(l.librFName, " ", l.librLName) as Librarian, '.
                'a.adptName as Department, '.
								'r.rqstName as requester, '.
                'p.mlprTitle as Title, '.
                'p.mlprAuthor as Author, '.
                'p.mlprISBN as isbn, '.
                'p.mlprRush as rush, '.
                'p.mlprNotes as notes, '.
                'p.mlprDate as Date, '.
                'p.mlprStatus as action '.
                'from purchase_request p, librarians l, academic_department a, requesters r '.
								'where l.librID=p.mlprlibrID and a.adptID=p.mlpradptID and r.rqstID=p.mlprRequester';
        
        
	$result = mysqli_query($dbc, $query) or die('Error querying for users: ' . mysqli_error($dbc));

?>

<div id="dialog">Dialog.</div>

		<table id="purchaseRequestList">
			<thead>
				<tr>
					<th class="viewReq">Requester</th>
					<th class="viewReq">Librarian</th>
					<th class="viewReq">Department</th>
					<th class="viewReq">Title</th>
					<th class="viewReq">Author</th>
					<th class="viewReq">ISBN</th>
					<th class="viewReq">Rush</th>
					<th class="viewReq">Notes</th>
					<th class="viewReq">Date</th>
					<th class="viewReq">Action</th>
				</tr>
			</thead>
			<tbody>

<?php

	while ($row = mysqli_fetch_assoc($result)) {

		// parse_url() only sets scheme if it finds one,
		// so it should be a good indicator of URL-ness
		$parseurl = parse_url($row['isbn']);
		if (isset($parseurl['scheme'])) {
			$row['isbn'] = '<a href="'.$row['isbn'].'" target="_blank">Link</a>';
		}

		$action = '';
		switch ($row['action']) {
			case 'a':
				$action = 'Approved';
				break;
			case 'd':
				$action = 'Declined';
				break;
			case 'm':
				$action = 'Maybe';
				break;
			default:
				$action = '';
				break;
		}

		echo '<tr rowid="'.$row['ID'].'">
			<td class="viewReq">'.$row['requester'].'</td>
			<td class="viewReq">'.$row['Librarian'].'</td>
			<td class="viewReq">'.$row['Department'].'</td>
			<td class="viewReq">'.$row['Title'].'</td>
			<td class="viewReq">'.$row['Author'].'</td>
			<td class="viewReq">'.$row['isbn'].'</td>
			<td class="viewReq rush">'.$row['rush'].'</td>
			<td class="viewReq">'.$row['notes'].'</td>
			<td class="viewReq date">'.toUSDate($row['Date']).'</td>
			<td class="viewReq action">'.$action.'</td>
			</tr>';
	}
	echo '</tbody></table>';

	require_once 'includes/footer.php';

?>
