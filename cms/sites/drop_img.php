<?php 
    error_reporting(E_ALL); 
			
			echo "<div id=\"info\">\n";
	
			echo "<h2>Update project</h2>\n"; 
			
			
			$sql_get_id = "SELECT ID, ID_cat, ID_2ndcat, ID_client, name, hair, makeup, styling FROM project WHERE	ID = '".$_GET['from_book']."' ";
				
    		$result_get_id = mysql_query($sql_get_id) OR die("<pre>".$sql_get_id."</pre>".mysql_error());
			$row_get_id = mysql_fetch_assoc($result_get_id);

			$sql_get_cat1 = "SELECT ID, category FROM cat WHERE ID = '".$row_get_id['ID_cat']."' ";
				
    		$result_get_cat1 = mysql_query($sql_get_cat1) OR die("<pre>".$sql_get_cat1."</pre>".mysql_error());
			$row_get_cat1= mysql_fetch_assoc($result_get_cat1);

			$sql_get_cat2 = "SELECT ID, category FROM cat WHERE ID = '".$row_get_id['ID_2ndcat']."' ";
				
    		$result_get_cat2 = mysql_query($sql_get_cat2) OR die("<pre>".$sql_get_cat2."</pre>".mysql_error());
			$row_get_cat2= mysql_fetch_assoc($result_get_cat2);

			$sql_get_cl = "SELECT ID, name FROM clients WHERE ID = '".$row_get_id['ID_client']."' ";
				
    		$result_get_cl = mysql_query($sql_get_cl) OR die("<pre>".$sql_get_cl."</pre>".mysql_error());
			$row_get_cl= mysql_fetch_assoc($result_get_cl);
			
			
 	if(isset($_POST['project']) AND $_POST['project'] == "Update") { 
			
			$sql_data = "UPDATE
			
							project							
					set	
					
							ID_cat = '".mysql_real_escape_string(trim($_POST['ID_cat']))."',
							ID_2ndcat = '".mysql_real_escape_string(trim($_POST['ID_2ndcat']))."',
							ID_client = '".mysql_real_escape_string(trim($_POST['ID_client']))."',							
							name = '".mysql_real_escape_string(trim($_POST['name']))."',
							hair = '".mysql_real_escape_string(trim($_POST['hair']))."',
							makeup = '".mysql_real_escape_string(trim($_POST['makeup']))."',
							styling = '".mysql_real_escape_string(trim($_POST['styling']))."'
							
					WHERE	ID = '".$_GET['from_book']."'
													
					";		
					
							mysql_query($sql_data) OR die("<pre>".$sql_data."</pre>".mysql_error());
		
			echo "<p>\n"."<em class=\"em\">loading data&hellip;</em>\n"."</p>\n"; 
            echo "<meta http-equiv=\"refresh\" content=\"1; URL=".curPageURL()."\">\n"; 

			echo "<div style=\"width:450px\">\n"; 
			
				echo "<label style=\"width:140px; display:inline-block;\" for=\"Category\">Category</label>\n";
			    echo "<select name=\"ID_cat\" id=\"ID_cat\" for=\"ID_cat\" style=\"width:185px; margin-top: 10px; display:inline-block;\">\n"; 
				echo "<option value=\"0\">	Select a category</option>\n";
				echo "<option value=\"0\">---------------------------</option>\n";
			    
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
					
			echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n"; 

				}		    
			    				
				echo "</select><br />";
				
				
				echo "<label style=\"width:140px; display:inline-block;\" for=\"2nd category\">2nd category</label>\n";
			    echo "<select name=\"ID_2ndcat\" id=\"ID_2ndcat\" for=\"ID_2ndcat\" style=\"width:185px; margin-top: 10px; display:inline-block;\">\n"; 
				echo "<option value=\"0\">Select a additional category</option>\n";
				echo "<option value=\"0\">---------------------------</option>\n";
			    
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
					
						echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n"; 

					}		    
			    				
				echo "</select><br />";
							

				echo "<label style=\"width:140px; display:inline-block;\" for=\"name\">Client</label>\n";
			    echo "<select name=\"ID_client\" id=\"ID_client\" style=\"width:185px; margin-top: 12px; display:inline-block;\">\n"; 
				echo "<option value=\"0\">Select a client</option>\n";
				echo "<option value=\"0\">---------------------------</option>\n";
			    
	        	$sql_open = "SELECT 
			
                            ID,
							name
                    FROM 
                            clients
							
					ORDER BY name ASC

							"; 
            
			$result_open = mysql_query($sql_open); 
            
			while($row_open = mysql_fetch_assoc($result_open)) 
				
				{
					
			echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['name'], ENT_QUOTES)."</option>\n"; 

				}		    
				
				echo "</select><br />";
				
				echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"name\">Project</label>\n"; 
                echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"name\" name=\"name\" type=\"text\" maxlength=\"255\" />\n";

				echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"hair\">Hair</label>\n"; 
                echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"hair\" name=\"hair\" type=\"text\" maxlength=\"255\" />\n";

				echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"makeup\">Make-up</label>\n"; 
                echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"makeup\" name=\"makeup\" type=\"text\" maxlength=\"255\" />\n";
                
				echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"styling\">Styling</label>\n"; 
                echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"styling\" name=\"styling\" type=\"text\" maxlength=\"255\" />\n";
                

                echo "<br class=\"clear\" />\n";

                echo "<br />";
            	echo "<label style=\"width:140px; display:block; padding-top:10px;\">More views</label>\n"; 
            	echo "<div style=\"width:450px; display: inline-block; margin-top:-19px;\">\n";
            	for($i=1; $i<=10; $i++){  
                echo "<label style=\"width:0px; display:block; float:left; padding-left:140px\" for=\"Foto[".$i."]\">".$i."</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:32px\" id=\"Foto[".$i."]\" name=\"Foto[".$i."]\" type=\"file\" />\n"; 
				}
				echo "</div>\n";
				echo "<p style=\"text-indent:140px;\">\n"."<em class=\"em\">Note: First image will be set as opener.</em>\n"."</p>\n";
				
				echo "</div><br />\n";


            echo "<input type=\"submit\" name=\"project\" class=\"button\" value=\"Update\" /><br /><br /><br />\n";
            echo "</div>\n";


		
                for($i=1; $i<=10; $i++){ 
                 
                $myFILE['name'] = $_FILES['Foto']['name'][$i]; 
                $myFILE['type'] = $_FILES['Foto']['type'][$i]; 
                $myFILE['tmp_name'] = $_FILES['Foto']['tmp_name'][$i];
				                
                    do { 
                        $Name = renameFile($myFILE['name']);
                        
                    } while(file_exists(PIC_FOLDER."PIC_".$Name)); 

                    if (move_uploaded_file($myFILE['tmp_name'], PIC_FOLDER."PIC_".$Name)) {

				$sql_img = "INSERT INTO
				
                                img 
                        SET 
								id_p = '".$row_get_id['ID']."',
								content_img = '".mysql_real_escape_string(trim("PIC_".$Name))."',
							    date = NOW()
                       
                       ";
                       
                mysql_query($sql_img) OR die("<pre>".$sql_img."</pre>".mysql_error());
                
				
			
					} 
                 
            } 
  
	}
	
	/*             View               */
	
        else { 
		
			echo "<form ". 
                 "action=\"".curPageURL()."\" ". 
				 "method=\"post\" ". 
				 "enctype=\"multipart/form-data\" ". 
				 "accept-charset=\"ISO-8859-1\">"; 
echo "<div style=\"width:450px\">\n"; 
			
				echo "<label style=\"width:140px; display:inline-block;\" for=\"name\">Category</label>\n";
			    echo "<select name=\"ID_cat\" id=\"ID_cat\" style=\"width:185px; margin-top: 10px; display:inline-block;\">\n"; 
				echo "<option value=\"".htmlentities($row_get_cat1['ID'], ENT_QUOTES)."\">	".htmlentities($row_get_cat1['category'], ENT_QUOTES)."</option>\n";
				echo "<option value=\"0\">---------------------------</option>\n";
			    
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
					
			echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n"; 

				}		    
			    				
				echo "</select><br />";
				
				echo "<label style=\"width:140px; display:inline-block;\" for=\"2nd Category\">2nd category</label>\n";
			    echo "<select name=\"ID_2ndcat\" id=\"ID_2ndcat\" for=\"ID_2ndcat\" style=\"width:185px; margin-top: 10px; display:inline-block;\">\n"; 
				echo "<option value=\"".htmlentities($row_get_cat2['ID'], ENT_QUOTES)."\">".htmlentities($row_get_cat2['category'], ENT_QUOTES)."</option>\n";
				echo "<option value=\"0\">---------------------------</option>\n";
			    
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
					
						echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n"; 

					}		    
			    				
				echo "</select><br />";

				echo "<label style=\"width:140px; display:inline-block;\" for=\"name\">Client</label>\n";
			    echo "<select name=\"ID_client\" id=\"ID_client\" style=\"width:185px; margin-top: 12px; display:inline-block;\">\n"; 
				echo "<option value=\"".htmlentities($row_get_cl['ID'], ENT_QUOTES)."\">".htmlentities($row_get_cl['name'], ENT_QUOTES)."</option>\n";
				echo "<option value=\"0\">---------------------------</option>\n";
			    
	        	$sql_open = "SELECT 
			
                            ID,
							name
                    FROM 
                            clients
							
					ORDER BY name ASC

							"; 
            
			$result_open = mysql_query($sql_open); 
            
			while($row_open = mysql_fetch_assoc($result_open)) 
				
				{
					
			echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['name'], ENT_QUOTES)."</option>\n"; 

				}		    
				
				echo "</select><br />";
				
				echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"name\">Project</label>\n"; 
                echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"name\" name=\"name\" type=\"text\" maxlength=\"255\" value=\"".htmlentities($row_get_id['name'], ENT_QUOTES)."\" />\n";

				echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"hair\">Hair</label>\n"; 
                echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"hair\" name=\"hair\" type=\"text\" maxlength=\"255\" value=\"".htmlentities($row_get_id['hair'], ENT_QUOTES)."\" />\n";

				echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"makeup\">Make-up</label>\n"; 
                echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"makeup\" name=\"makeup\" type=\"text\" maxlength=\"255\" value=\"".htmlentities($row_get_id['makeup'], ENT_QUOTES)."\" />\n";
                
				echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"styling\">Styling</label>\n"; 
                echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"styling\" name=\"styling\" type=\"text\" maxlength=\"255\" value=\"".htmlentities($row_get_id['styling'], ENT_QUOTES)."\" />\n";
                

                echo "<br class=\"clear\" />\n";

                echo "<br />";
            	echo "<label style=\"width:140px; display:block; padding-top:10px;\">More views</label>\n"; 
            	echo "<div style=\"width:450px; display: inline-block; margin-top:-19px;\">\n";
            	for($i=1; $i<=10; $i++){  
                echo "<label style=\"width:0px; display:block; float:left; padding-left:140px\" for=\"Foto[".$i."]\">".$i."</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:32px\" id=\"Foto[".$i."]\" name=\"Foto[".$i."]\" type=\"file\" />\n"; 
				}
				echo "</div>\n";
				echo "<p style=\"text-indent:140px;\">\n"."<em class=\"em\">Note: First image will be set as opener.</em>\n"."</p>\n";
				
				echo "</div><br />\n";

            echo "<input type=\"submit\" name=\"project\" class=\"button\" value=\"Update\" /><br /><br /><br />\n";
            echo "</form></div>\n"; 
        } 
     
	
		$query = "
							SELECT 
							
								ID,
								ID_p,
								content_img
								
							FROM 
							
								img
								
							WHERE ID ='".$_GET['id']."'
						
								";
			
			$result_query = mysql_query($query) or die(mysql_error());
			while($row_query = @mysql_fetch_assoc($result_query)){
			
			unlink(PIC_FOLDER.$row_query['content_img']);
			
			}


			$delete_i = "
			
							DELETE FROM img WHERE ID ='".$_GET['id']."'

								";
			$i_delete = mysql_query($delete_i) or die(mysql_error());
			$i_row_delete = @mysql_fetch_assoc($i_delete);
			

			echo "<meta http-equiv=\"refresh\" content=\"1; URL=?s=book_view&id=".$_GET['from_book']."\">\n";


	
echo "<div id=\"bio\">\n";
   			
	
	$sql_items = "SELECT 
			
                            ID,
                            ID_cat,
                            ID_client,
                            name,
                            hair,
                            makeup,
                            styling
                    FROM 
                            project
                            
                  	WHERE	ID = '".$_GET['from_book']."'

                    ORDER BY ID DESC
                                                        
           			";  
           			
    $result_items = mysql_query($sql_items) OR die("<pre>".$sql_items."</pre>".mysql_error()); 
	$row_items = mysql_fetch_assoc($result_items);
   	
   	echo "<h2><a href=\"?s=books\" class=\"cookie_h\">Books</a><span class=\"cookie\">></span>".htmlentities($row_items['name'], ENT_QUOTES)."</h2>\n";

			echo "<p><em class=\"em\">redirecting&hellip;</em><p />\n";

	$sql_client = "SELECT 
			
                            ID,
                            name
                    FROM 
                            clients
                            
                    WHERE ID = '".$row_items['ID_client']."'
                                                        
           			";  
           			
    		$result_client = mysql_query($sql_client) OR die("<pre>".$sql_client."</pre>".mysql_error()); 
			$row_client = mysql_fetch_assoc($result_client);
			

	$sql_img = "SELECT 
			
                            ID,
                            ID_p,
                            content_img,
                            date
                    FROM 
                            img
                            
                    WHERE	id_p = '".$row_items['ID']."'
                    
                    ORDER BY ID ASC
                            
           			";  
           			
    		$result_img = mysql_query($sql_img) OR die("<pre>".$sql_img."</pre>".mysql_error()); 
			
			echo "<div id=\"project_details\">\n";
			
			while($row_img = mysql_fetch_assoc($result_img)) {
	
   		
   					echo "<img src=\"images/".htmlentities($row_img['content_img'], ENT_QUOTES)."\" /><p class=\"view\"><a href=\"?s=book_view&id=".$row_items['ID']."\">[ drop ]</a></p>\n";
						

   			}
   		
   	            echo "</div></div>\n"; 

?>