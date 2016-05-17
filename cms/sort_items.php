<?php

    include("mysql.php"); 


	$check_qty = "SELECT COUNT(ID) FROM project";
    
    $result_qty = mysql_query($check_qty) OR die("<pre>".$check_qty."</pre>".mysql_error()); 
	$row_qty = mysql_fetch_assoc($result_qty);	


$action 				= mysql_real_escape_string($_POST['action']);
$updateRecordsArray 	= $_POST['recordsArray'];

if ($action == "updateRecordsListings"){

	$listingCounter = $row_qty['COUNT(ID)'];
	foreach ($updateRecordsArray as $recordIDValue) {

		$query = "UPDATE project SET recordListingID = " . $listingCounter . " WHERE ID = " . $recordIDValue;
		mysql_query($query) or die('Error, insert query failed');
		$listingCounter = $listingCounter - 1;
	}

	echo '<pre>';
	print_r($updateRecordsArray);
	echo '</pre>';
	echo 'If you refresh the page, you will see that records will stay just as you modified.';
}

?>