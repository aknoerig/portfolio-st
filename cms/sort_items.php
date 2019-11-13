<?php

    include("mysql.php"); 


	$check_qty = "SELECT COUNT(ID) FROM project";
    
    $result_qty = mysqli_query($conn, $check_qty) OR die("<pre>".$check_qty."</pre>".mysqli_error($conn)); 
	$row_qty = mysqli_fetch_assoc($result_qty);	


$action 				= mysqli_real_escape_string($_POST['action']);
$updateRecordsArray 	= $_POST['recordsArray'];

if ($action == "updateRecordsListings"){

	$listingCounter = $row_qty['COUNT(ID)'];
	foreach ($updateRecordsArray as $recordIDValue) {

		$query = "UPDATE project SET recordListingID = " . $listingCounter . " WHERE ID = " . $recordIDValue;
		mysqli_query($conn, $query) or die('Error, insert query failed');
		$listingCounter = $listingCounter - 1;
	}

	echo '<pre>';
	print_r($updateRecordsArray);
	echo '</pre>';
	echo 'If you refresh the page, you will see that records will stay just as you modified.';
}

?>