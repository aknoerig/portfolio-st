<?php
	session_start();

    error_reporting(E_ALL); 
    include("config.php"); 
    include("mysql.php"); 
    include("functions.php"); 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
     "http://www.w3.org/TR/html4/strict.dtd"> 
<html> 
<head> 
<title>Sabrina Theissen &ndash; CMS Authentication</title> 
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"> 
<link rel="stylesheet" type="text/css" media="screen" href="gui/face.css" />
</head> 
<body>

<div id="x-space">

<?php

$username = $_POST["admin_user"];
$passwort = md5($_POST["admin_pass"]);

$abfrage = "SELECT ID, user, pass FROM about WHERE ID = '1' ";
$ergebnis = mysqli_query($conn, $abfrage);
$row = mysqli_fetch_object($ergebnis);

if($row->pass == $passwort)
    {
    $_SESSION["user"] = $username;
    echo "<div style=\"margin:20px 25px;\">";
	echo "<h3 style=\"color:#090;\">Login correct</h3>\n"; 
	echo "<p>\n"."<em class=\"em\">loading data&hellip;</em>\n"."</p>\n"; 
	echo "<meta http-equiv=\"refresh\" content=\"3; URL=index.php\">\n"; 
	echo "</div>";    
    }
else
    {
    echo "<div style=\"margin:20px 25px;\">";
	echo "<h3 style=\"color:#f00;\">Login failed</h3>\n"; 
	echo "<p>\n"."<em class=\"em\">redirecting&hellip;</em>\n"."</p>\n"; 
	echo "<meta http-equiv=\"refresh\" content=\"2; URL=../admin/\">\n"; 
	echo "</div>";  
    }

?>

</div>

<div id="credit"><span class="small"><a href="http://www.buero-buero.org" target="_blank">a buero buero interweb</a></span></div>

</body> 
</html>