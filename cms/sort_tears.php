<?php

    include("mysql.php"); 

$action 				= mysqli_real_escape_string($_POST['action']);
$updateRecordsArray 	= $_POST['recordsArray'];

if ($action == "updateRecordsListingsCuts"){

	$listingCounter = 1;
	foreach ($updateRecordsArray as $recordIDValue) {

		$query = "UPDATE tears SET recordListingID = " . $listingCounter . " WHERE ID = " . $recordIDValue;
		mysqli_query($conn, $query) or die('Error, insert query failed');
		$listingCounter = $listingCounter + 1;
	}

	echo '<pre>';
	print_r($updateRecordsArray);
	echo '</pre>';
	echo 'If you refresh the page, you will see that records will stay just as you modified.';
}

?>