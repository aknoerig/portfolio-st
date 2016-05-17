
<?php 

include("../mysql.php"); 
include("../validate_mail.php"); 

function utf8_urldecode($str) {
    $str = preg_replace("/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/","\\\\;",urldecode($str));
    return html_entity_decode($str,null,'UTF-8');
 	} 
  
	$newcode = "";
	$length=5;
	$string="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789#!";

	mt_srand((double)microtime()*1000000);

	for ($i=1; $i <= $length; $i++) {
		$newcode .= substr($string, mt_rand(0,strlen($string)-1), 1);
	}


$mail = $_POST['mail'];  
$name = utf8_urldecode($_POST['name']);  
$agency = utf8_urldecode($_POST['agency']);  

if(empty($mail) || empty($name) || empty($agency)) {

	echo "<p class=\"reg_notes\">It seems you have missed at least one required field.</p>";

	}	else	{
	
		if(!validmail($mail)) {
			
			echo "<p class=\"reg_notes\">Your email address seems not to be valid.</p>";
			
			} else {
			
			$sql_check = "
			
					SELECT 
					
						mail
					
					FROM
						
						accesses
						
					WHERE 
						
						mail = '".mysql_real_escape_string(trim($_POST['mail']))."'
						
			";
			
    		$result_check = mysql_query($sql_check) OR die("<pre>".$sql_check."</pre>".mysql_error()); 
			$row_check = mysql_fetch_assoc($result_check);
			
			
			if( $row_check['mail'] == "" ) {

			$sql_data = "INSERT INTO
			
							accesses							
					set	
					
							mail = '".mysql_real_escape_string(trim($_POST['mail']))."',
							contact = '".mysql_real_escape_string(trim($_POST['name']))."',
							agency = '".mysql_real_escape_string(trim($_POST['agency']))."',
							code = '".$newcode."',
							timestamp = NOW()	
						
					";		mysql_query($sql_data) OR die("<pre>".$sql_data."</pre>".mysql_error());
					
					echo "<script>\n";
					echo "$(\".second\").animate({'opacity' : '0'},0).hide();\n";
					echo "$(\".first\").show().animate({'opacity' : '1'},300);\n";			
					echo "</script>\n";
					
					echo "<p class=\"reg_notes\"><br />Your personal key: <span class=\"showKey\">".$newcode."</span><br /><br />is now valid for 24 hours.<br /><br />You can generate a new one at any time by<br />using the same email address as just now.</p>";

/*
					$msg = '<html><head><title>Sabrina Theissen. Lightroom Key</title></head><body style="text-align: center;"><h1 style="font-family: Arial; font-size: 19px; line-height: 1.1em; letter-spacing: 3px; color: #000; margin: 25px auto 10px; padding: 0 0 8px 0; border-bottom: 3px solid #000; display: inline-block;">Sabrina Theissen. Your Lightroom Key.</h1><p style="font-family: Times; font-size: 15px; line-height: 1.3em; letter-spacing: 2px;">Hello and thank you for stopping by. Here is your personal key to access the whole archive and create your personal selection:</p><h1 style="font-family: Times; font-size: 29px; line-height: 1.1em; letter-spacing: 2px; color: #000; margin: 25px auto 10px; padding: 0 0 8px 0; display: inline-block;">'.$newcode.'</h1><p style="font-family: Arial; font-size: 12px;letter-spacing: 1px; line-height: 1.4em; color: #000; margin-bottom: 45px;">Go on an log in <a href="http://www.sabrinatheissen.com/login" style="color: #000; text-decoration: none; border-bottom: 1px solid #999;">here</a></p>';
 
 		$from   = "mail@sabrinatheissen.com";
		$subject    = "Your Lightroom Key"; 
		$header = "From: $from\r\n";

		$header  .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html; charset=iso-8859-1\r\n";
 
		$header .= "X-Mailer: PHP ". phpversion();
 
		$sql_mail = "".mysql_real_escape_string(trim($_POST['mail']))."";
		 
		mail ( 
				$sql_mail,
      			$subject,
      			$msg,
      			$header
      			); */
										
			}	else	{
			
			$sql_data = "UPDATE
				
							accesses							
					set	
					
							contact = '".mysql_real_escape_string(trim($_POST['name']))."',
							agency = '".mysql_real_escape_string(trim($_POST['agency']))."',
							code = '".$newcode."',
							timestamp = NOW()
							
					WHERE 
					
							mail = '".mysql_real_escape_string(trim($_POST['mail']))."'
						
					";		mysql_query($sql_data) OR die("<pre>".$sql_data."</pre>".mysql_error());
					
					echo "<script>\n";
					echo "$(\".second\").animate({'opacity' : '0'},0).hide();\n";
					echo "$(\".first\").show().animate({'opacity' : '1'},300);\n";			
					echo "</script>\n";
					
					echo "<p class=\"reg_notes\"><br />The email address you have entered already exists.<br />We have updated the key for this account.<br /><br />Your new key: <span class=\"showKey\">".$newcode."</span><br /><br />is now valid for 24 hours.<br /><br />You can generate a new one at any time by<br />using the same email address as just now.</p>";
		
			}	
			
	  }	
	
}				             

?>