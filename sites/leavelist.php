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
						
						mail = '".mysqli_real_escape_string(trim($_POST['mail']))."'
						
			";
			
    		$result_check = mysqli_query($conn, $sql_check) OR die("<pre>".$sql_check."</pre>".mysqli_error($conn)); 
			$row_check = mysqli_fetch_assoc($result_check);
			
			
			if( $row_check['mail'] == "" ) {

					echo "<p class=\"reg_notes\">It seems like there is no such email address on that mailing list.</p>";

					}	else	{

			$sql_data = "DELETE FROM
			
							maillist							
					WHERE	
					
							mail = '".$row_check['mail']."'
							
					";		mysqli_query($conn, $sql_data) OR die("<pre>".$sql_data."</pre>".mysqli_error($conn));
					
					echo "<p class=\"reg_notes\">You successfully unsubscribed from the mailing list. Hope you come back someday.</p>";
					
			}	
	}					             

?>