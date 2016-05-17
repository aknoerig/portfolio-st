<?php

    include("mysql.php"); 

$action 				= mysql_real_escape_string($_POST['action']);
$updateRecordsArray 	= $_POST['recordsArray'];

if ($action == "updateRecordsListingsCuts"){

	$listingCounter = 1;
	foreach ($updateRecordsArray as $recordIDValue) {

		$query = "UPDATE tears SET recordListingID = " . $listingCounter . " WHERE ID = " . $recordIDValue;
		mysql_query($query) or die('Error, insert query failed');
		$listingCounter = $listingCounter + 1;
	}

	echo '<pre>';
	print_r($updateRecordsArray);
	echo '</pre>';
	echo 'If you refresh the page, you will see that records will stay just as you modified.';
}

?>