<?php 
    error_reporting(E_ALL); 

	echo "<div id=\"info\">\n";
	
			echo "<h2>Add Images</h2>\n"; 
			
 	if(isset($_POST['project']) AND $_POST['project'] == "Upload") { 
			
			$sql_data = "INSERT INTO
			
							lightbox							
					set	
					
							ID_cat = '".mysql_real_escape_string(trim($_POST['ID_cat']))."',
							ID_2ndcat = '".mysql_real_escape_string(trim($_POST['ID_2ndcat']))."'
																											
					";		mysql_query($sql_data) OR die("<pre>".$sql_data."</pre>".mysql_error());
		
					
			$sql_get_id = "SELECT ID FROM lightbox ORDER BY ID DESC";
				
    		$result_get_id = mysql_query($sql_get_id) OR die("<pre>".$sql_get_id."</pre>".mysql_error());
			$row_get_id = mysql_fetch_assoc($result_get_id);

			
echo "<div style=\"width:450px\">\n"; 
			
				echo "<label style=\"width:140px; display:inline-block;\" for=\"Category\">Category</label>\n";
			    echo "<select name=\"ID_cat\" id=\"ID_cat\" for=\"ID_cat\" style=\"width:185px; margin-top: 10px; display:inline-block;\">\n"; 
				echo "<option value=\"0\">Select a category</option>\n";
				echo "<option value=\"0\">---------------------------</option>\n";
			    
	        	$sql_open = "SELECT 
			
                            ID,
							category
                    FROM 
                            box_cats
							
					ORDER BY ID ASC

							"; 
            
			$result_open = mysql_query($sql_open); 
            
			while($row_open = mysql_fetch_assoc($result_open)) 
				
				{
					
			echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n"; 

				}		    
			    				
				echo "</select><br />";
				
				
				echo "<label style=\"width:140px; display:inline-block;\" for=\"2nd Category\">2nd Category</label>\n";
			    echo "<select name=\"ID_2ndcat\" id=\"ID_2ndcat\" for=\"ID_2ndcat\" style=\"width:185px; margin-top: 10px; display:inline-block;\">\n"; 
				echo "<option value=\"0\">Select a additional category</option>\n";
				echo "<option value=\"0\">---------------------------</option>\n";
			    
	        	$sql_open = "SELECT 
			
                            ID,
							category
                    FROM 
                            box_cats
							
					ORDER BY ID ASC

							"; 
            
				$result_open = mysql_query($sql_open); 
            
				while($row_open = mysql_fetch_assoc($result_open)) 
				
					{
					
						echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n"; 

					}		    
			    				
				echo "</select><br />";
							
                echo "<br />";
            	echo "<label style=\"width:140px; display:block; padding-top:10px;\">Item views</label>\n"; 
            	echo "<div style=\"width:450px; display: inline-block; margin-top:-19px;\">\n";
            	for($i=1; $i<=10; $i++){  
                echo "<label style=\"width:0px; display:block; float:left; padding-left:140px\" for=\"Foto[".$i."]\">".$i."</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:32px\" id=\"Foto[".$i."]\" name=\"Foto[".$i."]\" type=\"file\" />\n"; 
				}
				echo "</div>\n";
				
				echo "</div><br />\n";


            echo "<input type=\"submit\" name=\"project\" class=\"button\" value=\"Upload\" /><br /><br />\n";
            echo "\n";

		
                for($i=1; $i<=10; $i++){ 
                 
                $myFILE['name'] = $_FILES['Foto']['name'][$i]; 
                $myFILE['type'] = $_FILES['Foto']['type'][$i]; 
                $myFILE['tmp_name'] = $_FILES['Foto']['tmp_name'][$i];
				                
                    do { 
                        $Name = renameFile($myFILE['name']);
                        
                    } while(file_exists(PIC_FOLDER."Sabrina_Theissen_".$Name)); 

                    if (move_uploaded_file($myFILE['tmp_name'], PIC_FOLDER."Sabrina_Theissen_".$Name)) {

				$sql_img = "INSERT INTO
				
                                img 
                        SET 
								id_a = '".$row_get_id['ID']."',
								content_img = '".mysql_real_escape_string(trim("Sabrina_Theissen_".$Name))."',
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
				echo "<option value=\"0\">Select a category</option>\n";
				echo "<option value=\"0\">---------------------------</option>\n";
			    
	        	$sql_open = "SELECT 
			
                            ID,
							category
                    FROM 
                            box_cats
							
					ORDER BY ID ASC

							"; 
            
			$result_open = mysql_query($sql_open); 
            
			while($row_open = mysql_fetch_assoc($result_open)) 
				
				{
					
			echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n"; 

				}		    
			    				
				echo "</select><br />";
				
				echo "<label style=\"width:140px; display:inline-block;\" for=\"2nd Category\">2nd Category</label>\n";
			    echo "<select name=\"ID_2ndcat\" id=\"ID_2ndcat\" for=\"ID_2ndcat\" style=\"width:185px; margin-top: 10px; display:inline-block;\">\n"; 
				echo "<option value=\"0\">Select a additional category</option>\n";
				echo "<option value=\"0\">---------------------------</option>\n";
			    
	        	$sql_open = "SELECT 
			
                            ID,
							category
                    FROM 
                            box_cats
							
					ORDER BY ID ASC

							"; 
            
				$result_open = mysql_query($sql_open); 
            
				while($row_open = mysql_fetch_assoc($result_open)) 
				
					{
					
						echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n"; 

					}		    
			    				
				echo "</select><br />";


                echo "<br />";
            	echo "<label style=\"width:140px; display:block; padding-top:10px;\">Item views</label>\n"; 
            	echo "<div style=\"width:450px; display: inline-block; margin-top:-19px;\">\n";
            	for($i=1; $i<=10; $i++){  
                echo "<label style=\"width:0px; display:block; float:left; padding-left:140px\" for=\"Foto[".$i."]\">".$i."</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:32px\" id=\"Foto[".$i."]\" name=\"Foto[".$i."]\" type=\"file\" />\n"; 
				}
				echo "</div>\n";
				
				echo "</div><br />\n";

            echo "<input type=\"submit\" name=\"project\" class=\"button\" value=\"Upload\" /><br /><br />\n";
            echo "</form>\n"; 
        } 
     
		
		
				echo "<div style=\"width:430px; height:2px; border-top:1px solid #000;\"></div>\n";
			

			echo "<h2 class=\"bottom-25\">Accounts</h2>\n";
			
			$sql_accounts_on = "SELECT 
			
                            ID,
                            timestamp,
                            mail,
                            contact,
                            agency,
                            code
                    
                    FROM 
                                       
                            accesses 
                            
                    WHERE timestamp >= NOW() - INTERVAL 3 DAY
                                                                                    
                    ORDER BY timestamp DESC
                                                        
           			";  
           			
    		$result_accounts_on = mysql_query($sql_accounts_on) OR die("<pre>".$sql_accounts_on."</pre>".mysql_error()); 
			while($row_accounts_on = mysql_fetch_assoc($result_accounts_on)) {	
			

			echo "<p class=\"left-shipping normal floater top-0 accounts\"><strong>".htmlentities($row_accounts_on['agency'], ENT_QUOTES)."</strong><br /> ".htmlentities($row_accounts_on['contact'], ENT_QUOTES)." (<a href=\"mailto:".htmlentities($row_accounts_on['mail'], ENT_QUOTES)."\">".htmlentities($row_accounts_on['mail'], ENT_QUOTES)."</a>)<span class=\"code\">".htmlentities($row_accounts_on['code'], ENT_QUOTES)." <img src=\"gui/on.gif\"></span>\n";
echo "<div style=\"display: inline-block; width:430px; height:8px; border-top:1px dashed #ccc;\"></div>\n"; 
			
		}		
		
					$sql_accounts_off = "SELECT 
			
                            ID,
                            timestamp,
                            mail,
                            contact,
                            agency,
                            code
                    
                    FROM 
                                       
                            accesses 
                            
                    WHERE timestamp < NOW() - INTERVAL 3 DAY
                                                                                    
                    ORDER BY timestamp DESC
                                                        
           			";  
           			
    		$result_accounts_off = mysql_query($sql_accounts_off) OR die("<pre>".$sql_accounts_off."</pre>".mysql_error()); 
			while($row_accounts_off = mysql_fetch_assoc($result_accounts_off)) {	
			
			echo "<p class=\"left-shipping normal floater top-0 accounts\"><strong>".htmlentities($row_accounts_off['agency'], ENT_QUOTES)."</strong><br /> ".htmlentities($row_accounts_off['contact'], ENT_QUOTES)." (<a href=\"mailto:".htmlentities($row_accounts_off['mail'], ENT_QUOTES)."\">".htmlentities($row_accounts_off['mail'], ENT_QUOTES)."</a>)<span class=\"code\">".htmlentities($row_accounts_off['code'], ENT_QUOTES)." <img src=\"gui/off.gif\"></span>\n";
echo "<div style=\"display: inline-block; width:430px; height:8px; border-top:1px dashed #ccc;\"></div>\n"; 
			
		}	
	   
	   echo "<br /><br /><br /><br /></div>\n"; 
	
		echo "<div id=\"bio\">\n";
   			echo "<h2>Images</h2>\n";
   		
   		echo "<p>\n"."<em class=\"em trasher-onstate\">dropping image from lightbox&hellip;</em>\n"."</p>\n"; 		
	
		echo "<div id=\"lb_listing\">\n";
	
	
	$sql_img_sizing = "SELECT 
			
                            ID,
                            ID_a,
                            date,
                            content_img
                    
                    FROM 
                                       
                            img
                            
                    WHERE ID_a != 'NULL'
                    
                    ORDER BY ID DESC LIMIT 0,10
                                                        
                                                        
           			";  
           			
    $result_img_sizing = mysql_query($sql_img_sizing) OR die("<pre>".$sql_img_sizing."</pre>".mysql_error()); 
	while($row_img_sizing = mysql_fetch_assoc($result_img_sizing)) {	
	
	
				ltr_thumb(''.htmlentities($row_img_sizing['content_img'], ENT_QUOTES).'', 'images/ltr_thumbs/'.htmlentities($row_img_sizing['content_img'], ENT_QUOTES).'', 0, 0, 1240, 1754);
				ltr_thumb_sml(''.htmlentities($row_img_sizing['content_img'], ENT_QUOTES).'', 'images/ltr_thumbs_sml/'.htmlentities($row_img_sizing['content_img'], ENT_QUOTES).'', 0, 0, 1240, 1754);
	
	}
	
	$sql_items = "SELECT 
			
                            ID,
                            ID_a,
                            content_img,
                            recordListingID
                    
                    FROM 
                                       
                            img
                            
                    WHERE ID_a != 'NULL'
                                                        
                    ORDER BY recordListingID ASC
                                                        
           			";  
           			
    $result_items = mysql_query($sql_items) OR die("<pre>".$sql_items."</pre>".mysql_error()); 
	while($row_items = mysql_fetch_assoc($result_items)) {	
							
				echo "<div id=\"recordsArray_" . $row_items['ID'] . "\" class=\"lb_img\"><img src=\"images/ltr_thumbs_sml/".htmlentities($row_items['content_img'], ENT_QUOTES)."\" /><p class=\"view\"><a href=\"#\" onClick=\"setTimeout('window.location=\'?s=drop_lightbox&id=".htmlentities($row_items['ID'], ENT_QUOTES)."\'',2500); return true;\">[ drop ]</a></p></div>\n";

           				
			}
              
              echo "</div>\n"; 
 		         
   		         echo "<br class=\"clear\" /><br /><br />\n";

            echo "</div>\n"; 

?>