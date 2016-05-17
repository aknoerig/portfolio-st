<?php 
    error_reporting(E_ALL); 

	echo "<div id=\"info\">\n";
	
			echo "<h2>Add a cut</h2>\n"; 
			
 	if(isset($_POST['images']) AND $_POST['images'] == "Images") { 
			
					echo "<p>\n"."<em class=\"em\">loading data&hellip;</em>\n"."</p>\n"; 
            		echo "<meta http-equiv=\"refresh\" content=\"2; URL=".curPageURL()."\">\n"; 

			$sql_data = "INSERT INTO
			
							tears							
					set	
					
							date = '".mysql_real_escape_string(trim($_POST['dd']))." ".mysql_real_escape_string(trim($_POST['month']))." ".mysql_real_escape_string(trim($_POST['yyyy']))."',
							caption = '".mysql_real_escape_string(trim($_POST['caption']))."',
							text = '".mysql_real_escape_string(trim($_POST['cut_text']))."'
																				
					";		mysql_query($sql_data) OR die("<pre>".$sql_data."</pre>".mysql_error());
		
					
			$sql_get_id = "SELECT ID FROM tears ORDER BY ID DESC";
				
    		$result_get_id = mysql_query($sql_get_id) OR die("<pre>".$sql_get_id."</pre>".mysql_error());
			$row_get_id = mysql_fetch_assoc($result_get_id);

			
		
                for($i=1; $i<=14; $i++){ 
                 
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
								id_t = '".$row_get_id['ID']."',
								content_img = '".mysql_real_escape_string(trim("Sabrina_Theissen_".$Name))."',
							    date = NOW()
                       
                       ";
                       
                mysql_query($sql_img) OR die("<pre>".$sql_img."</pre>".mysql_error());
                
				
			
					} 
            } 
    }
    
     	if(isset($_POST['video']) AND $_POST['video'] == "Videos") { 
			
					echo "<p>\n"."<em class=\"em\">loading data&hellip;</em>\n"."</p>\n"; 
            		echo "<meta http-equiv=\"refresh\" content=\"2; URL=".curPageURL()."\">\n"; 

			$sql_data = "INSERT INTO
			
							tears							
					set	
					
							date = '".mysql_real_escape_string(trim($_POST['dd']))." ".mysql_real_escape_string(trim($_POST['month']))." ".mysql_real_escape_string(trim($_POST['yyyy']))."',
							caption = '".mysql_real_escape_string(trim($_POST['caption']))."',
							text = '".mysql_real_escape_string(trim($_POST['cut_text']))."',
							pager = '".mysql_real_escape_string(trim($_POST['pager']))."',
							vid = 'yes'
																				
					";		mysql_query($sql_data) OR die("<pre>".$sql_data."</pre>".mysql_error());
		
					
			$sql_get_id = "SELECT ID FROM tears ORDER BY ID DESC";
				
    		$result_get_id = mysql_query($sql_get_id) OR die("<pre>".$sql_get_id."</pre>".mysql_error());
			$row_get_id = mysql_fetch_assoc($result_get_id);

			
		
                for($i=1; $i<=14; $i++){ 
                 
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
								id_t = '".$row_get_id['ID']."',
								content_img = '".mysql_real_escape_string(trim("Sabrina_Theissen_".$Name))."',
							    date = NOW()
                       
                       ";
                       
                mysql_query($sql_img) OR die("<pre>".$sql_img."</pre>".mysql_error());
                
				
			
					} 
            } 
    }
  
			echo "<form ". 
                 "action=\"".curPageURL()."\" ". 
				 "method=\"post\" ". 
				 "name=\"cut_form\" ". 
				 "id=\"cut_form\" ". 
				"onsubmit=\"flipTextMain()\" ". 
				 "enctype=\"multipart/form-data\" ". 
				 "accept-charset=\"UTF-8\">"; 
echo "<div style=\"width:450px\">\n"; 
			
				echo "<label style=\"width:150px; display:inline-block;\" for=\"Date\">Date</label>\n";
			    echo "<select name=\"dd\" id=\"dd\" for=\"dd\" style=\"width:55px; margin-top: 10px; margin-right:8px; display:inline-block;\">\n"; 
				echo "<option value=\"0\">Day</option>\n";
				echo "<option value=\"0\">---</option>\n";
				echo "<option value=\"1st\">1st</option>\n"; 
				echo "<option value=\"2nd\">2nd</option>\n"; 
				echo "<option value=\"3rd\">3rd</option>\n"; 
				echo "<option value=\"4th\">4th</option>\n"; 
				echo "<option value=\"5th\">5th</option>\n"; 
				echo "<option value=\"6th\">6th</option>\n"; 
				echo "<option value=\"7th\">7th</option>\n"; 
				echo "<option value=\"8th\">8th</option>\n"; 
				echo "<option value=\"9th\">9th</option>\n"; 
				echo "<option value=\"10th\">10th</option>\n"; 
				echo "<option value=\"11th\">11th</option>\n"; 
				echo "<option value=\"12th\">12th</option>\n"; 
				echo "<option value=\"13th\">13th</option>\n"; 
				echo "<option value=\"14th\">14th</option>\n"; 
				echo "<option value=\"15th\">15th</option>\n"; 
				echo "<option value=\"16th\">16th</option>\n"; 
				echo "<option value=\"17th\">17th</option>\n"; 
				echo "<option value=\"18th\">18th</option>\n"; 
				echo "<option value=\"19th\">19th</option>\n"; 
				echo "<option value=\"20th\">20th</option>\n"; 
				echo "<option value=\"21st\">21st</option>\n"; 
				echo "<option value=\"22nd\">22nd</option>\n"; 
				echo "<option value=\"23rd\">23rd</option>\n"; 
				echo "<option value=\"24th\">24th</option>\n"; 
				echo "<option value=\"25th\">25th</option>\n"; 
				echo "<option value=\"26th\">26th</option>\n"; 
				echo "<option value=\"27th\">27th</option>\n"; 
				echo "<option value=\"28th\">28th</option>\n"; 
				echo "<option value=\"29th\">29th</option>\n"; 
				echo "<option value=\"30th\">30th</option>\n"; 
				echo "<option value=\"31st\">31st</option>\n"; 
				echo "</select>";

			    echo "<select name=\"month\" id=\"month\" for=\"month\" style=\"width:75px; margin-top: 10px; margin-right:8px; display:inline-block;\">\n"; 
				echo "<option value=\"0\">Month</option>\n";
				echo "<option value=\"0\">-----</option>\n";
				echo "<option value=\"Jan\">Jan</option>\n"; 
				echo "<option value=\"Feb\">Feb</option>\n"; 
				echo "<option value=\"Mar\">Mar</option>\n"; 
				echo "<option value=\"Apr\">Apr</option>\n"; 
				echo "<option value=\"May\">May</option>\n"; 
				echo "<option value=\"Jun\">Jun</option>\n"; 
				echo "<option value=\"Jul\">Jul</option>\n"; 
				echo "<option value=\"Aug\">Aug</option>\n"; 
				echo "<option value=\"Sep\">Sep</option>\n"; 
				echo "<option value=\"Oct\">Oct</option>\n"; 
				echo "<option value=\"Nov\">Nov</option>\n"; 
				echo "<option value=\"Dec\">Dec</option>\n"; 
				echo "</select>";				

			    echo "<select name=\"yyyy\" id=\"yyyy\" for=\"yyyy\" style=\"width:75px; margin-top: 10px; display:inline-block;\">\n"; 
				echo "<option value=\"0\">Year</option>\n";
				echo "<option value=\"0\">----</option>\n";
				for($i=date("Y")-10 ;$i<=date("Y")+1; $i++){ 
        				if($i == date("Y")) 
            	echo "<option value=\"".$i."\">".$i."</option>\n"; 
        				else 
            	echo "<option value=\"".$i."\">".$i."</option>\n"; 
        				echo $i."\n"; 
        		echo "</option>\n"; 
    			} 
				echo "</select><br />";				

				
				echo "<label class=\"top-15\" style=\"width:150px; display:inline-block; \" for=\"caption\">Caption</label>\n"; 
                echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"caption\" name=\"caption\" type=\"text\" maxlength=\"255\" />\n";

				echo "<label class=\"top-15\" style=\"width:151px; vertical-align: top; display:inline-block; \" for=\"text\">Text</label>\n"; 
                
                
                echo "<textarea style=\"display:none;\" id=\"cut_text\" name=\"cut_text\" type=\"text\" maxlength=\"255\" /></textarea>\n";

    			echo "<iframe src=\"sites/reset.html\" class=\"top-15\" name=\"richTextField\" id=\"richTextField\" style=\"border: 1px solid #000; width:244px; height:105px; display:inline-block;\"></iframe><br />\n";

				echo "<input class=\"sml_button\" type=\"button\" style=\"display:inline-block; margin-left:155px; \" onClick=\"iLink()\" value=\"Link\">";
  				echo "<input class=\"sml_button\" type=\"button\" style=\"display:inline-block; margin-left:5px; \" onClick=\"iUnLink()\" value=\"Unlink\">\n";
            
                
                echo "<br class=\"clear\" />\n";

                echo "<br />";
            	echo "<label style=\"width:140px; display:block; padding-top:10px;\">Images</label>\n"; 
            	echo "<div style=\"width:450px; display: inline-block; margin-top:-19px;\">\n";
            	for($i=1; $i<=14; $i++){  
                echo "<label style=\"width:0px; display:block; float:left; padding-left:125px\" for=\"Foto[".$i."]\">".$i."</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:32px\" id=\"Foto[".$i."]\" name=\"Foto[".$i."]\" type=\"file\" />\n"; 
				}
				echo "</div>\n";
				
				echo "<p style=\"padding-left:157px; margin-top: 7px; line-height: 1em\">\n"."<em class=\"em\">Note: First image will be set as<br />opener.</em>\n"."</p>\n";

            	echo "<label style=\"width:152px; display:inline-block;\">Pagination</label>\n"; 
			    echo "<select name=\"pager\" id=\"pager\" for=\"pager\" style=\"width:75px; margin-top: 10px; margin-right:8px; display:inline-block;\">\n"; 
				echo "<option value=\"0\">Select</option>\n";
				echo "<option value=\"0\">-----</option>\n";
				echo "<option value=\"light\">light</option>\n";
				echo "<option value=\"dark\">dark</option>\n";
				echo "</select>";
				echo "<br /><br />";
				
            	echo "<label style=\"width:140px; display:block; padding-top:10px;\">Video</label>\n"; 
            	echo "<div style=\"width:450px; display: inline-block; margin-top:-19px;\">\n";
                echo "<label style=\"width:0px; display:block; float:left; padding-left:80px\" for=\"Foto[10]\">Cover</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:77px\" id=\"Foto[10]\" name=\"Foto[11]\" type=\"file\" />\n"; 
                echo "<label style=\"width:0px; display:block; float:left; padding-left:80px\" for=\"Foto[11]\">mp4</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:77px\" id=\"Foto[11]\" name=\"Foto[12]\" type=\"file\" />\n"; 
                echo "<label style=\"width:0px; display:block; float:left; padding-left:80px\" for=\"Foto[12]\">ogv</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:77px\" id=\"Foto[12]\" name=\"Foto[13]\" type=\"file\" />\n"; 
                echo "<label style=\"width:0px; display:block; float:left; padding-left:80px\" for=\"Foto[13]\">webm</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:77px\" id=\"Foto[13]\" name=\"Foto[14]\" type=\"file\" />\n"; 
                echo "<label style=\"width:0px; display:block; float:left; padding-left:80px\" for=\"Foto[14]\">mobile</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:77px\" id=\"Foto[14]\" name=\"Foto[14]\" type=\"file\" />\n"; 

				echo "</div>\n";
				
				echo "<p style=\"padding-left:157px; margin-top: 8px; line-height: 0.9em\">\n"."<em class=\"em\">Cover image should be set as PNG.</em>\n"."</p>\n";

				echo "</div><br />\n";


            	echo "<label style=\"width:155px; display:inline-block; padding-top:10px;\">Post to</label>\n"; 
            	echo "<input type=\"submit\" name=\"images\" class=\"button inline\" value=\"Images\" />";
            	echo "<label style=\"width:35px; display:inline-block; padding-top:10px;\">or</label>\n"; 
            	echo "<input type=\"submit\" name=\"video\" class=\"button inline\" value=\"Videos\" />";
            	echo "</div>\n";
 
             
		
echo "<div id=\"bio\">\n";
   			echo "<h2>Cuts</h2>\n";
   		
   		echo "<div id=\"tear_listing\">\n";
	
	
	$sql_items = "SELECT 
			
                            ID,
                            date,
                            caption,
                            text,
                            recordListingID
                            
                    FROM 
                            tears
                                                        
                    ORDER BY recordListingID ASC
                                                        
           			";  
           			
    $result_items = mysql_query($sql_items) OR die("<pre>".$sql_items."</pre>".mysql_error()); 
	while($row_items = mysql_fetch_assoc($result_items)) {	

	$sql_img = "SELECT 
			
                            ID,
                            ID_p,
                            content_img,
                            date
                    FROM 
                            img
                            
                    WHERE	id_t = '".$row_items['ID']."'
                    
                    ORDER BY ID ASC
                            
           			";  
           			
    		$result_img = mysql_query($sql_img) OR die("<pre>".$sql_img."</pre>".mysql_error()); 
			$row_img = mysql_fetch_assoc($result_img);
	
	
			echo "<div id=\"recordsArray_" . $row_items['ID'] . "\" class=\"item_cuts\" style=\"vertical-align: top\"><img src=\"images/".htmlentities($row_img['content_img'], ENT_QUOTES)."\" /><h2>".htmlentities($row_items['caption'], ENT_QUOTES)."</h2><p class=\"view\"><a href=\"?s=tear_view&id=".$row_items['ID']."\">[ view ]</a></p></div>\n";
						
}	   		
	        echo "<br class=\"clear\" /><br /><br />\n";

            echo "</div>\n"; 
            echo "</div>\n"; 

?>