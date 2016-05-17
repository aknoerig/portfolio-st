<?php 

session_start();

include("../mysql.php"); 

$LTR_access = $_POST['access'];  


if(empty($LTR_access)) {

	echo "<p class=\"reg_notes\">It seems like you did not typed in a key.</p>";

	}	else	{
			
			$sql_check = "
			
					SELECT 
					
						code,
						timestamp
					
					FROM
						
						accesses
					
					WHERE 
					
						code = '".$LTR_access."' AND timestamp >= NOW() - INTERVAL 1 DAY
						
			";
			
    			$result_check = mysql_query($sql_check) OR die("<pre>".$sql_check."</pre>".mysql_error()); 
				$row_check = mysql_fetch_assoc($result_check);
						
					if( $row_check != "" ) {
	
						$_SESSION['GO_access'] = $LTR_access;
	
						echo "<p class=\"reg_notes\">Success. Your session will expire after 30 minutes of no activity.<br />Wait a few seconds. You will be forwarded.<br /><br /><img src=\"/img/loader.gif\" /></p>";
echo "<script type=\"text/javascript\">setTimeout(function(){window.location.href='http://www.sabrinatheissen.com/lightroom/';},5500);</script>";
					
					}	else	{
								
						echo "<p class=\"reg_notes\">It seems that your key is not registered or out of date. Keys are valid for 24 hours after registration.</p>";

					}
				
	
			}	             

?>