<?php 
	session_start();
    
	error_reporting(E_ALL); 
    include("config.php"); 
    include("mysql.php"); 
    include("functions.php");
    include("image.inc.php");
		
?> 

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
     "http://www.w3.org/TR/html4/strict.dtd"><html>
<head> 

<title>Sabrina Theissen &ndash; CMS</title>

<link rel="stylesheet" type="text/css" media="screen" href="gui/face.css" />
<link rel="stylesheet" type="text/css" media="screen" href="gui/mediaelementplayer.css" />

<?php
if(isset($_GET['s']) AND $_GET['s'] == "books" OR isset($_GET['s']) AND $_GET['s'] == "lightbox" OR isset($_GET['s']) AND $_GET['s'] == "tears" OR !isset($_GET['s']))
	
				{

echo "<script src=\"gui/jquery-1.3.2.min.js\"></script>\n";
				
				}	else	{
				
echo "<script src=\"gui/jquerylib.js\"></script>\n";
				
				}
				
?>
<script src="gui/jquery-custom.js"></script>
<script src="gui/globals.js"></script>
<script src="gui/mediaelement-and-player.js"></script>

 <script type="text/javascript">

$(document).ready(function() { 
        $("#listing").sortable({ 
            update : function () { 
                var order = $(this).sortable('serialize') + '&action=updateRecordsListings'; 
			$.post("sort_items.php", order)
            } 
        }); 
    }); 

$(document).ready(function() { 
        $("#lb_listing").sortable({ 
            update : function () { 
                var order = $(this).sortable('serialize') + '&action=updateRecordsListingsLb'; 
			$.post("sort_lb.php", order)
            } 
        }); 
    }); 

$(document).ready(function() { 
        $("#tear_listing").sortable({ 
            update : function () { 
                var order = $(this).sortable('serialize') + '&action=updateRecordsListingsCuts'; 
			$.post("sort_tears.php", order)
            } 
        }); 
    }); 
    
</script>

</head> 
<body onload="LinkerOn();">

<div id="x-space">

<?php

				if(isset($_GET['s']) AND $_GET['s'] == "general")
	
				{

					$intro_a = "";
					$general_a = "manage_active";
					$tears_a = "";
					$lightbox_a = "";
					$books_a = "";
					$settings_a = "";
					$mailing_a = "";
				
				}
				
				elseif(isset($_GET['s']) AND $_GET['s'] == "lightbox" OR isset($_GET['s']) AND $_GET['s'] == "drop_lightbox" OR isset($_GET['s']) AND $_GET['s'] == "lightbox_view")
	
				{

					$intro_a = "";
					$general_a = "";
					$tears_a = "";
					$lightbox_a = "manage_active";
					$books_a = "";
					$settings_a = "";
					$mailing_a = "";
				
				}
				
				elseif(isset($_GET['s']) AND $_GET['s'] == "books" OR isset($_GET['s']) AND $_GET['s'] == "books_delete" OR isset($_GET['s']) AND $_GET['s'] == "book_view" OR isset($_GET['s']) AND $_GET['s'] == "drop_img" OR isset($_GET['s']) AND $_GET['s'] == "drop_book" OR !isset($_GET['s']))
	
				{

					$intro_a = "";
					$general_a = "";
					$tears_a = "";
					$lightbox_a = "";
					$books_a = "manage_active";
					$settings_a = "";
					$mailing_a = "";
				
				}
				
				elseif(isset($_GET['s']) AND $_GET['s'] == "tears" OR isset($_GET['s']) AND $_GET['s'] == "drop_tear" OR isset($_GET['s']) AND $_GET['s'] == "tear_view" OR isset($_GET['s']) AND $_GET['s'] == "drop_tear_img" OR isset($_GET['s']) AND $_GET['s'] == "drop_video_content")
	
				{

					$intro_a = "";
					$general_a = "";
					$tears_a = "manage_active";
					$lightbox_a = "";
					$books_a = "";
					$settings_a = "";
					$mailing_a = "";
				
				}
				
elseif(isset($_GET['s']) AND $_GET['s'] == "settings" OR isset($_GET['s']) AND $_GET['s'] == "settings_delete" OR isset($_GET['s']) AND $_GET['s'] == "cat_delete")
	
				{

					$intro_a = "";
					$general_a = "";
					$tears_a = "";
					$lightbox_a = "";
					$books_a = "";
					$settings_a = "manage_active";
					$mailing_a = "";
				
				}
				
elseif(isset($_GET['s']) AND $_GET['s'] == "mailing" OR isset($_GET['s']) AND $_GET['s'] == "mailing_delete")
	
				{

					$intro_a = "";
					$general_a = "";
					$tears_a = "";
					$lightbox_a = "";
					$books_a = "";
					$clients_a = "";
					$mailing_a = "manage_active";
				
				}

elseif(isset($_GET['s']) AND $_GET['s'] == "intro" OR isset($_GET['s']) AND $_GET['s'] == "drop_intro")
	
				{
				
					$intro_a = "manage_active";
					$general_a = "";
					$tears_a = "";
					$lightbox_a = "";
					$books_a = "";
					$clients_a = "";
					$mailing_a = "";
				
				}
				
?>

<?php

			if(!isset($_SESSION["user"]))
			   {
			   echo "<div style=\"margin:20px 25px;\">";
			   echo "<h3 style=\"color:#f00;\">Session expired or not identified.<br />Log in first.</h3>\n"; 
			   echo "<p>\n"."<em class=\"em\">redirecting&hellip;</em>\n"."</p>\n"; 
			   echo "<meta http-equiv=\"refresh\" content=\"3; URL=../admin/\">\n"; 
			   exit;
			   echo "</div>"; 
			   }
			   
?> 

<?php

			if(
			   
			   isset($_POST['Logout']) AND $_POST['Logout'] == "Logout"
			   
			  ) 
			
				{
						echo "<div id=\"logout-note\">\n"; 
						echo "<em class=\"em\">logging out&hellip;</em>\n"; 
            			echo "<meta http-equiv=\"refresh\" content=\"2; URL=../admin\">\n"; 
			            echo "</div>\n";
						
						session_destroy();
										
				}


			echo "<div id=\"logout\">\n"; 
			echo "<form ". 
                 " action=\"".curPageURL()."\" ". 
                 " method=\"post\" ". 
                 " accept-charset=\"ISO-8859-1\">\n";
				 

            echo "<input type=\"submit\" name=\"Logout\" class=\"logout\" value=\"Logout\" /><br /><br />\n"; 
            echo "</form></div>\n"; 

?>
 
<h5>Sabrina Theissen &ndash; CMS</h5> 


<?php 
    $s = array(); 

    	$s['books'] = "sites/books.php";    
    	$s['drop_book'] = "sites/drop_book.php";    
    	$s['book_view'] = "sites/book_view.php";
    	$s['drop_img'] = "sites/drop_img.php";
    	$s['books_delete'] = "sites/books_delete.php";
    	$s['tears'] = "sites/tears.php";
    	$s['drop_tear_img'] = "sites/drop_tear_img.php";
    	$s['drop_video_content'] = "sites/drop_video_content.php";
    	$s['drop_tear'] = "sites/drop_tear.php";
    	$s['tear_view'] = "sites/tear_view.php";
    	$s['lightbox'] = "sites/lightbox.php";
    	$s['drop_lightbox'] = "sites/drop_lightbox.php";
    	$s['general'] = "sites/general.php";
    	$s['general_delete'] = "sites/general_delete.php";
    	$s['settings'] = "sites/settings.php";
    	$s['clients_delete'] = "sites/clients_delete.php";
    	$s['cat_delete'] = "sites/cat_delete.php";
    	$s['mailing'] = "sites/mailing.php";
    	$s['mailing_delete'] = "sites/mailing_delete.php";
    	$s['intro'] = "sites/intro.php";
    	$s['drop_intro'] = "sites/drop_intro.php";
    	$s['drop_ltr_complete'] = "sites/drop_ltr_complete.php";


    if(isset($_GET['s']) AND isset($s[$_GET['s']])){
    	include("left.php"); 
        include $s[$_GET['s']]; 
    } 
    	else {
    	
    	    	include("left.php"); 
        		include("sites/books.php"); 
        }
    
?>

</div>

<div id="credit"><span class="small"><a href="http://www.buero-buero.org" target="_blank">a buero buero interweb</a></span></div>

<script>
$('video,audio').mediaelementplayer(/* Options */);
</script>

</body> 
</html>

