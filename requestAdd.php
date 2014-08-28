<?php

	require_once 'includes/session.php';
	require_once 'includes/connection.php';
        
        $todaysDate = date("Y/m/d");
        
       $query="insert into purchase_request ".
               "(mlprlibrID, mlprTitle, mlprAuthor, mlprISBN, mlpradptID, mlprRush, mlprNotes, mlprDate, mlprRequester) ".
               "VALUES (?,?,?,?,?,?,?,?,?)";
       
      
       $stmt = mysqli_prepare($dbc, $query);
       
  
       $stmt->bind_param("isssisssi",
				$_POST['librarian'],
				$_POST['itemTitle'],
				$_POST['authorEditor'],
				$_POST['isbnOrWeb'],
				$_POST['academicDept'],
				$_POST['rush'],
				$_POST['notes'],
				$todaysDate,
				$_POST['requester']);
 
       
       
       
       $stmt->execute() or die("Failed to insert session: " . mysqli_error($dbc));
       
       
        $_SESSION['dialogText']="Superduper!";
        $_SESSION['dialogTitle']="Session Result";
        
        header("Location: index.php");
        exit();
        
        
        
        
?>
