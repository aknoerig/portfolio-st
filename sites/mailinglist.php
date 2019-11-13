<?php 

include("../mysql.php"); 
include("../validate_mail.php"); 


$mail = $_POST['mail'];  


if(empty($mail)) {

	echo "<p class=\"reg_notes\">It seems like you did not typed in your email address.</p>";

	}	else	{
	
		if(!validmail($mail)) {
			
			echo "<p class=\"reg_notes\">Your email address seems not to be valid.</p>";
			
			} else {
			
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

			$sql_data = "INSERT INTO
			
							maillist							
					set	
					
							mail = '".mysqli_real_escape_string(trim($_POST['mail']))."'
							
					";		mysqli_query($conn, $sql_data) OR die("<pre>".$sql_data."</pre>".mysqli_error($conn));
					
					echo "<p class=\"reg_notes\">You successfully subscribed to the mailing list. You will receive news from Sabrina about 4 times a year. You can <span onMouseOver=\"window.location.href='#unsubscribe'; return true;\" onClick=\"window.location.reload()\">unsubscribe</span> at any time.</p>";
					
			}	else	{
			
					echo "<p class=\"reg_notes\">The email address you have typed in has already subscribed to the mailing list. Try another one or just stay curious till you receive Sabrina's next tidings.<br /><br />You want to <span onMouseOver=\"window.location.href='#unsubscribe'; return true;\" onClick=\"window.location.reload()\">unsubscribe</span> this email address?</p>";			
			
			}	
			
	  }	
	
}				             

?>