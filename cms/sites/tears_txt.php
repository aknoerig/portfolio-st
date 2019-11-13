<link rel="stylesheet" href="../gui/face.css" media="screen" type="text/css" />

<?php

		    include("../mysql.php"); 
		
			$sql_get_id = "SELECT ID, text FROM tears WHERE	ID = '".$_GET['id']."' ";
				
    		$result_get_id = mysqli_query($conn, $sql_get_id) OR die("<pre>".$sql_get_id."</pre>".mysqli_error($conn));
			$row_get_id = mysqli_fetch_assoc($result_get_id);
			
			echo "<span class=\"cut_txt\">".$row_get_id['text']."</span>\n";
?>