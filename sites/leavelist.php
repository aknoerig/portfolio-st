<?php 

include("../mysql.php"); 


$mail = $_POST['mail'];  


if(empty($mail)) {

	echo "<p class=\"reg_notes\">It seems like you did not typed in your email address.</p>";

	}	else	{


			$sql_check = "
			
					SELECT 
					
						mail
					
					FROM
						
						maillist
						
					WHERE 
						
						mail = '".mysql_real_escape_string(trim($_POST['mail']))."'
						
			";
			
    		$result_check = mysql_query($sql_check) OR die("<pre>".$sql_check."</pre>".mysql_error()); 
			$row_check = mysql_fetch_assoc($result_check);
			
			
			if( $row_check['mail'] == "" ) {

					echo "<p class=\"reg_notes\">It seems like there is no such email address on that mailing list.</p>";

					}	else	{

			$sql_data = "DELETE FROM
			
							maillist							
					WHERE	
					
							mail = '".$row_check['mail']."'
							
					";		mysql_query($sql_data) OR die("<pre>".$sql_data."</pre>".mysql_error());
					
					echo "<p class=\"reg_notes\">You successfully unsubscribed from the mailing list. Hope you come back someday.</p>";
					
			}	
	}					             

?>