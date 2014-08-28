<?php
	$page_title = 'Collection Purchase Request';
	require_once 'includes/headerNoMenu.php';
        require_once 'includes/connection.php';
?>

<form method="post" action="requestAdd.php">
	<table id="request">

		<tr class="input requester">
			<th class="request requester"><label for="requester">Requester</label></th>
			<td class="request requester">
				<select id="requester" name="requester">
					<option value="" selected="selected"></option>
					<?php
						$result = mysqli_query($dbc, 'select rqstID, rqstName from requesters') or die('Error retrieving requesters:' . mysqli_error($dbc));
						while ($row = mysqli_fetch_assoc($result)) {
							echo $row['rqstID'] . $row['rqstName'];
							echo '<option value='.$row['rqstID'].'>'.$row['rqstName'].'</option>';
						}
						mysqli_free_result($result);
					?>
				</select>
			</td>
			<td class="request requester instructions"><span class="requester instructions">Optional.</span></td>
		</tr>

		<tr class="input librarian">
			<th class="librarian request"><label for="librarian">Librarian Name</label></th>
                        <td class="librarian request"> 
                            <select id="librarian" name="librarian" class="mustHave">
                                <option class="librSelect" value="" selected="selected"></option>
                                <?php
                                $query = "select librID as ID, librFName as FName, librLName as LName " .
						"from librarians where librActive='yes' order by librLName";
					$result = mysqli_query($dbc, $query) or die('Error querying for librarians: ' . mysqli_error($dbc));

					while ($row = mysqli_fetch_assoc($result)) 
                                        {
                                            $id = $row['ID'];
                                            $librarianName = $row['FName'] . ' ' . $row['LName'];
                                            echo '<option id="libr' . $id . '" value="' . $id . '">' . $librarianName . '</option>';	
					}
					mysqli_free_result($result);                                        
                                ?>
                            </select>                        
                        </td>
                        <td  class="librarian instructions request"><span class="librarian instructions">Required. Select from drop-down. </span></td>
		</tr>
		<tr class="input itemTitle">
			<th class="itemTitle request"><label for="itemTitle">Item Title</label></th>
			<td class="itemTitle request"><input id="itemTitle" name="itemTitle" type="text" maxlength="300" class="mustHave"/></td>
                        <td  class="itemTitle instructions request"><span class="itemTitle instructions">Required.  </span></td>
		</tr>
		
		
		<tr  class="input authorEditor">
			<th class="authorEditor request"><label for="authorEditor">Author/Editor</label></th>
			<td class="authorEditor request"><input id="authorEditor" name="authorEditor" type="text" maxlength="300" class="mustHave"/></td>
                        <td class="authorEditor instructions request"><span class="authorEditor instructions">Required. </span></td>
		</tr>
		<tr class="input isbnOrWeb">
			<th class="isbnOrWeb request"><label for="isbnOrWeb">ISBN or Web link</label></th>
			<td class="isbnOrWeb request"><input id="isbnOrWeb" name="isbnOrWeb" type="text" maxlength="300" class="mustHave"/></td>
                        <td class="isbnOrWeb instructions request"><span class="isbnOrWeb instructions">Required.  </span></td>
		</tr>
                <tr class="input academicDept">
			<th class="academicDept request"><label for="academicDept">Academic Department</label></th>
                        <td class="academicDept request"> 
                            <select id="academicDept" name="academicDept" class="mustHave">
                                <option class="adptSelect" value="" selected="selected"></option>
                                <?php
                                $query = "select adptID as ID, adptName as Name " .
						"from academic_department where adptActive='yes'";
					$result = mysqli_query($dbc, $query) or die('Error querying for librarians: ' . mysqli_error($dbc));

					while ($row = mysqli_fetch_assoc($result)) 
                                        {
                                            $id = $row['ID'];
                                            $Name = $row['Name'];
                                            echo '<option id="adpt' . $id . '" value="' . $id . '">' . $Name . '</option>';	
					}
					mysqli_free_result($result);          
                                ?>
                            </select>                        
                        </td>
                        <td class="academicDept instructions request"><span class="academicDept instructions">Required. Select from drop-down. </span></td>
		</tr>
                <tr class="input rush">
                    <th class="rush request"><label for="rush">Rush</label></th>
                    <td class="rush request"><input  id="norush" name="rush" value="no" type="radio" checked>No &nbsp; <input  id="rush" name="rush" value="yes" type="radio">Yes</td>
                    <td class="rush instructions request"><span class="rush instructions">Optional. <br>If yes, please add explanation to note.<span></td>
                </tr>
                <tr class="input notes">
                <th class="notes request"><label for="notes">Additional notes <br><span id="noteReason">&nbsp;</span></label></th>
                <td class="notes request"> <textarea   id="notes"  cols="35" rows="8" name="notes" maxlength="3000"></textarea></td>
                <td class="notes instructions request"><span class="notes instructions">Optional.<br>Indicate special instructions, request a hold or notification, etc.<span></td>
                </tr>
                
                
                
                
		<tr>
			<th><input id="submit" name="submit" type="submit" disabled="disabled" value="Make Request"/></th>
			<td></td>
		</tr>
	</table>
</form>
<?php
	//$jsOutput .= '$("#class").spinner();';
	require_once 'includes/footer.php';
?>

