<?php 
    error_reporting(E_ALL); 

			
			echo "<div id=\"info\">\n";
	
			echo "<h2>Update project</h2>\n"; 			
			
			$sql_get_id = "SELECT ID, ID_a FROM img WHERE	ID = '".$_GET['id']."' ";
				
    		$result_get_id = mysqli_query($conn, $sql_get_id) OR die("<pre>".$sql_get_id."</pre>".mysqli_error($conn));
			$row_get_id = mysqli_fetch_assoc($result_get_id);

			$sql_get_cat_id = "SELECT ID, ID_cat, ID_2ndcat FROM lightbox WHERE ID = '".$_GET['from_arch']."' ";
				
    		$result_get_cat_id = mysqli_query($conn, $sql_get_cat_id) OR die("<pre>".$sql_get_cat_id."</pre>".mysqli_error($conn));
			$row_get_cat_id= mysqli_fetch_assoc($result_get_cat_id);

			$sql_get_cat_name1 = "SELECT ID, category FROM box_cats WHERE ID = '".$row_get_cat_id['ID_cat']."' ";
				
    		$result_get_cat_name1 = mysqli_query($conn, $sql_get_cat_name1) OR die("<pre>".$sql_get_cat_name1."</pre>".mysqli_error($conn));
			$row_get_cat_name1= mysqli_fetch_assoc($result_get_cat_name1);

			$sql_get_cat_name2 = "SELECT ID, category FROM box_cats WHERE ID = '".$row_get_cat_id['ID_2ndcat']."' ";
				
    		$result_get_cat_name2 = mysqli_query($conn, $sql_get_cat_name2) OR die("<pre>".$sql_get_cat_name2."</pre>".mysqli_error($conn));
			$row_get_cat_name2= mysqli_fetch_assoc($result_get_cat_name2);

			
			
 	if(isset($_POST['project']) AND $_POST['project'] == "Update") { 
			
			$sql_data = "UPDATE
			
							lightbox							
					set	
					
							ID_cat = '".mysqli_real_escape_string(trim($_POST['ID_cat']))."',
							ID_2ndcat = '".mysqli_real_escape_string(trim($_POST['ID_2ndcat']))."'
							
					WHERE	ID = '".$_GET['id']."'
													
					";		
					
							mysqli_query($conn, $sql_data) OR die("<pre>".$sql_data."</pre>".mysqli_error($conn));
		
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
                            box_cats
							
					ORDER BY ID ASC

							"; 
            
			$result_open = mysqli_query($conn, $sql_open); 
            
			while($row_open = mysqli_fetch_assoc($result_open)) 
				
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
                            box_cats
							
					ORDER BY ID ASC

							"; 
            
				$result_open = mysqli_query($conn, $sql_open); 
            
				while($row_open = mysqli_fetch_assoc($result_open)) 
				
					{
					
						echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n"; 

					}		    
			    				
				echo "</select><br />";
							


            echo "<input type=\"submit\" name=\"project\" class=\"button\" value=\"Update\" /><br /><br /><br />\n";
            echo "</div>\n";

  
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
				echo "<option value=\"".htmlentities($row_get_cat_id['ID_2ndcat'], ENT_QUOTES)."\">".htmlentities($row_get_cat_name1['category'], ENT_QUOTES)."</option>\n";
				echo "<option value=\"0\">---------------------------</option>\n";
			    
	        	$sql_open = "SELECT 
			
                            ID,
							category
                    FROM 
                            box_cats
							
					ORDER BY ID ASC

							"; 
            
			$result_open = mysqli_query($conn, $sql_open); 
            
			while($row_open = mysqli_fetch_assoc($result_open)) 
				
				{
					
			echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n"; 

				}		    
			    				
				echo "</select><br />";
				
				echo "<label style=\"width:140px; display:inline-block;\" for=\"2nd Category\">2nd category</label>\n";
			    echo "<select name=\"ID_2ndcat\" id=\"ID_2ndcat\" for=\"ID_2ndcat\" style=\"width:185px; margin-top: 10px; display:inline-block;\">\n"; 
				echo "<option value=\"".htmlentities($row_get_cat_id['ID_cat'], ENT_QUOTES)."\">".htmlentities($row_get_cat_name2['category'], ENT_QUOTES)."</option>\n";
				echo "<option value=\"0\">---------------------------</option>\n";
			    
	        	$sql_open = "SELECT 
			
                            ID,
							category
                    FROM 
                            box_cats
							
					ORDER BY ID ASC

							"; 
            
				$result_open = mysqli_query($conn, $sql_open); 
            
				while($row_open = mysqli_fetch_assoc($result_open)) 
				
					{
					
						echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n"; 

					}		    
			    				
				echo "</select><br />";


            echo "<input type=\"submit\" name=\"project\" class=\"button\" value=\"Update\" /><br /><br /><br />\n";
            echo "</form></div>\n"; 
        } 
     
        echo "</div>\n"; 

	
echo "<div id=\"bio\">\n";
   			echo "<h2>Images</h2>\n";
   			
	
	$sql_items = "SELECT 
			
                            ID,
                            ID_a,
                            content_img
                    
                    FROM 
                                       
                            img
                            
                    WHERE ID = '".$_GET['id']."'
                                                                                                                
           			";  
           			
    $result_items = mysqli_query($conn, $sql_items) OR die("<pre>".$sql_items."</pre>".mysqli_error($conn)); 
	while($row_items = mysqli_fetch_assoc($result_items)) {	
	
				echo "<div id=\"lb_img_details\"><img src=\"images/".htmlentities($row_items['content_img'], ENT_QUOTES)."\" /><p class=\"view\"><a href=\"?s=lightbox_view&id=".$row_items['ID']."\">[ view ]</a></p></div>\n";

           				
			}
   		         
   		         echo "<br class=\"clear\" /><br /><br />\n";

            echo "</div>\n"; 


?>