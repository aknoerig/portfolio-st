<?php 
    error_reporting(E_ALL); 


			$loeschen = "
			
			DELETE FROM clients WHERE ID ='".$_GET['id']."'
						
								";
			
			$delete = mysql_query($loeschen) or die(mysql_error());
			$row_delete = @mysql_fetch_assoc($delete);


			echo "<meta http-equiv=\"refresh\" content=\"1; URL=?s=settings\">\n";


   echo "<div id=\"info\">\n";

			echo "<h2>Account</h2>\n";
			
            $sql_open = "SELECT 
			
                            ID,
							user,
							pass
                    FROM 
                            about
					WHERE
							ID = '1'
                   "; 
            $result_open = mysql_query($sql_open); 
            $row_open_ = mysql_fetch_assoc($result_open); 





			if(isset($_POST['account']) AND $_POST['account'] == "Update") {
	
            $sql_update = "UPDATE
			
                                about 
                        SET 
							    user = '".mysql_real_escape_string(trim($_POST['user']))."',
							    pass = '".mysql_real_escape_string(trim(md5($_POST['pass'])))."'
						WHERE 
								ID = '1'
                       ";
					   
            $result_update = mysql_query($sql_update); 
            $row_update = @mysql_fetch_assoc($result_update);
			
			echo "<p>\n"."<em class=\"em\">loading data&hellip;</em>\n"."</p>\n"; 
            echo "<meta http-equiv=\"refresh\" content=\"1; URL=".curPageURL()."\">\n"; 

			}


			echo "<form ". 
                 " action=\"".curPageURL()."\" ". 
                 " method=\"post\" ". 
                 " accept-charset=\"iso-8859-1\">\n"; 


			echo "<label style=\"width:100px; display:block; float:left; margin-top:5px;\" for=\"user\">User</label>\n"; 
			echo "<input style=\"margin-top:5px;\" type=\"text\" name=\"user\" id=\"user\" maxlenght=\"255\" value=\"".htmlentities($row_open_['user'], ENT_QUOTES)."\"><br />\n"; 

			echo "<label class=\"top-15\" style=\"width:100px; display:block; float:left;\" for=\"pass\">Password</label>\n"; 
			echo "<input class=\"top-15\" type=\"password\" name=\"pass\" id=\"pass\" maxlenght=\"255\" value=\"".htmlentities($row_open_['pass'], ENT_QUOTES)."\">\n"; 

			echo "<p>\n"."<em class=\"em\">Note: Mix up numbers and characters for more security.</em>\n"."</p><br />\n"; 

			echo "<input type=\"hidden\" name=\"ID\" value=\"1\" />\n"; 
            echo "<input type=\"submit\" name=\"account\" class=\"button\" value=\"Update\" /><br /><br />\n"; 
            echo "</form></div>\n"; 
            
        	
        	echo "<div id=\"bio\">\n";
        	
    		    	
       	echo "<h2>Clients</h2>\n"; 
			
			if(isset($_POST['clients']) AND $_POST['clients'] == "Save") {

	
            $sql_colour = "INSERT INTO
			
                                clients
                        set 
                        		name = '".mysql_real_escape_string(trim($_POST['name']))."',
                        		public = '".mysql_real_escape_string(trim($_POST['public']))."'
                        		
                       	";		
                       
                       mysql_query($sql_colour) OR die("<pre>".$sql_colour."</pre>".mysql_error());
				
			}
	
        	echo "<form ". 
                 " action=\"".curPageURL()."\" ". 
                 " method=\"post\" ". 
                 " accept-charset=\"iso-8859-1\">\n"; 


			echo "<label style=\"width:120px; display:block; float:left; margin-top:5px;\" for=\"name\">Client name</label>\n";
			echo "<input style=\"float:left; width:165px; margin-top:5px; margin-right: 25px;\" type=\"text\" name=\"name\" id=\"name\" maxlenght=\"255\">\n"; 
			
			
echo "<label style=\"width:75px; display:block; float:left; margin-top:2px;\" for=\"public\">Public</label>\n";
			    echo "<select name=\"public\" id=\"public\" style=\"width:60px; display:inline-block;\">\n"; 
				echo "<option value=\"public\">Yes</option>\n"; 
				echo "<option value=\"private\">No</option>\n";
				echo "</select><br /><br /><br />";

            echo "<input type=\"submit\" name=\"clients\" class=\"button top-0\" value=\"Save\" /><br />\n"; 
            echo "</form>\n";
			echo "\n";
        	
        	echo "<div style=\"width:452px; height:2px; border-top:1px dashed #ccc;\"></div><br />\n"; 
        	
        	echo "<div style=\"margin-bottom:45px; display: inline-block;\">\n"; 
        	
        	$sql_open = "SELECT 
			
                            ID,
							name,
							public
                    FROM 
                            clients
							
					ORDER BY name ASC

							"; 
            
			$result_open = mysql_query($sql_open); 
            
			while($row_open = mysql_fetch_assoc($result_open)) 
				
				{
					
 			echo "<p class=\"left-shipping normal floater top-0\">".htmlentities($row_open['name'], ENT_QUOTES).", ".htmlentities($row_open['public'], ENT_QUOTES)." [change]</p>\n";
 			echo "<input type=\"button\" name=\"delete\" class=\"button_x floater\" value=\"x\" onClick=\"self.location.href='?s=clients_delete&id=".$row_open['ID']."'\"><br />";
 			
				}
				
 			echo "</div>\n";
 			
 			
			echo "<div style=\"width:450px; height:2px; border-top:1px solid #000;\"></div>\n";

 			
 			echo "<h2>Categories</h2>\n"; 
			
			if(isset($_POST['categories']) AND $_POST['categories'] == "Save") {

	
            $sql_colour = "INSERT INTO
			
                                cat
                        set 
                        		category = '".mysql_real_escape_string(trim($_POST['category']))."'
                        		
                       	";		
                       
                       mysql_query($sql_colour) OR die("<pre>".$sql_colour."</pre>".mysql_error());
				
			}
	
        	echo "<form ". 
                 " action=\"".curPageURL()."\" ". 
                 " method=\"post\" ". 
                 " accept-charset=\"iso-8859-1\">\n"; 


			echo "<label style=\"width:120px; display:block; float:left; margin-top:5px;\" for=\"category\">Category</label>\n";
			echo "<input style=\"float:left; width:165px; margin-top:5px; margin-right: 25px;\" type=\"text\" name=\"category\" id=\"category\" maxlenght=\"255\"><br /><br /><br />\n"; 
			

            echo "<input type=\"submit\" name=\"categories\" class=\"button top-0\" value=\"Save\" /><br />\n"; 
            echo "</form>\n";
			echo "\n";
        	
        	echo "<div style=\"width:452px; height:2px; border-top:1px dashed #ccc;\"></div><br />\n"; 
        	
        	echo "<div style=\"margin-bottom:45px; display: inline-block;\">\n"; 
        	
        	$sql_open = "SELECT 
			
                            ID,
							category
                    FROM 
                            cat
							
					ORDER BY category ASC

							"; 
            
			$result_open = mysql_query($sql_open); 
            
			while($row_open = mysql_fetch_assoc($result_open)) 
				
				{
					
 			echo "<p class=\"left-shipping normal floater top-0\">".htmlentities($row_open['category'], ENT_QUOTES)."</p>\n";
 			echo "<input type=\"button\" name=\"delete\" class=\"button_x floater\" value=\"x\" onClick=\"self.location.href='?s=cat_delete&id=".$row_open['ID']."'\"><br />";
 			
				}
				
 			echo "</div>\n";
 			
 			
 			
        	
    echo "</div>\n";
?>