<?php 
    error_reporting(E_ALL); 

			
			echo "<div id=\"info\">\n";
	
			echo "<h2>Update post</h2>\n"; 			
			
			$sql_get_id = "SELECT ID, date, caption, text, vid, pager FROM tears WHERE	ID = '".$_GET['id']."' ";
				
    		$result_get_id = mysqli_query($conn, $sql_get_id) OR die("<pre>".$sql_get_id."</pre>".mysqli_error($conn));
			$row_get_id = mysqli_fetch_assoc($result_get_id);
			
			
 	if(isset($_POST['project']) AND $_POST['project'] == "Update") { 

					echo "<p>\n"."<em class=\"em\">loading data&hellip;</em>\n"."</p>\n"; 
            		echo "<meta http-equiv=\"refresh\" content=\"2; URL=".curPageURL()."\">\n"; 
		
		
			if($row_get_id['vid'] != "yes") {
	
			$sql_data = "UPDATE
			
							tears							
					set	
					
							caption = '".mysqli_real_escape_string(trim($_POST['caption']))."',
							text = '".mysqli_real_escape_string(trim($_POST['cut_text']))."',
							pager = '".mysqli_real_escape_string(trim($_POST['pager']))."'
							
					WHERE	ID = '".$_GET['id']."'
													
					";		
				
				} else {
				
	
			$sql_data = "UPDATE
			
							tears							
					set	
					
							caption = '".mysqli_real_escape_string(trim($_POST['caption']))."',
							text = '".mysqli_real_escape_string(trim($_POST['cut_text']))."'
														
					WHERE	ID = '".$_GET['id']."'
													
					";		
				
				
				}
					
				mysqli_query($conn, $sql_data) OR die("<pre>".$sql_data."</pre>".mysqli_error($conn));
		
				if($row_get_id['vid'] != "yes") {
				
					$media_count = "10";
				
				} else {
				
					$media_count = "4";
				
				}
		
                for($i=1; $i<=$media_count; $i++){ 

                 
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
								content_img = '".mysqli_real_escape_string(trim("Sabrina_Theissen_".$Name))."',
							    date = NOW()
                       
                       ";
                       
                mysqli_query($conn, $sql_img) OR die("<pre>".$sql_img."</pre>".mysqli_error($conn));
                
				
			
					} 
                 
            } 
  
	}
	
	/*             View               */
	
		
			echo "<form ". 
                 "action=\"".curPageURL()."\" ". 
				 "method=\"post\" ". 
				 "name=\"cut_form\" ". 
				 "id=\"cut_form\" ". 
				"onsubmit=\"flipText()\" ". 
				 "enctype=\"multipart/form-data\" ". 
				 "accept-charset=\"ISO-8859-1\">"; 
echo "<div style=\"width:450px\">\n"; 
				
				echo "<label class=\"top-10\" style=\"width:150px; display:inline-block; \" for=\"caption\">Caption</label>\n"; 
                echo "<input class=\"top-10\" style=\"width:240px; display:inline-block;\" id=\"caption\" name=\"caption\" type=\"text\" maxlength=\"255\" value=\"".htmlentities($row_get_id['caption'], ENT_QUOTES)."\" />\n";

				echo "<label class=\"top-15\" style=\"width:151px; vertical-align: top; display:inline-block; \" for=\"text\">Text</label>"; 
                echo "<textarea style=\"display:none;\" id=\"cut_text\" name=\"cut_text\" type=\"text\" maxlength=\"255\" /></textarea>\n";

				echo "<iframe src=\"sites/tears_txt.php?id=".$row_get_id['ID']."\" class=\"top-15\" name=\"richTextField\" id=\"richTextField\" style=\"border: 1px solid #000; width:244px; height:105px; display:inline-block;\"></iframe><br />\n";
				echo "<input class=\"sml_button\" type=\"button\" style=\"display:inline-block; margin-left:155px; \" onClick=\"iLink()\" value=\"Link\">";
  				echo "<input class=\"sml_button\" type=\"button\" style=\"display:inline-block; margin-left:5px; \" onClick=\"iUnLink()\" value=\"Unlink\">\n";

                echo "<br class=\"clear\" />\n";

		if($row_get_id['vid'] != "yes") {
		
                echo "<br />";
            	echo "<label style=\"width:140px; display:block; padding-top:10px;\">Images</label>\n"; 
            	echo "<div style=\"width:450px; display: inline-block; margin-top:-19px;\">\n";
            	for($i=1; $i<=10; $i++){  
                echo "<label style=\"width:0px; display:block; float:left; padding-left:125px\" for=\"Foto[".$i."]\">".$i."</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:32px\" id=\"Foto[".$i."]\" name=\"Foto[".$i."]\" type=\"file\" />\n"; 
				}
				echo "</div>\n";
				
				echo "<p style=\"padding-left:157px; margin-top: 7px; line-height: 1em\">\n"."<em class=\"em\">Note: First image will be set as<br />opener.</em>\n"."</p>\n";

            	echo "<label style=\"width:152px; display:inline-block;\">Pagination</label>\n"; 
			    echo "<select name=\"pager\" id=\"pager\" for=\"pager\" style=\"width:75px; margin-top: 10px; margin-right:8px; display:inline-block;\">\n"; 
				echo "<option value=\"".htmlentities($row_get_id['pager'], ENT_QUOTES)."\">".htmlentities($row_get_id['pager'], ENT_QUOTES)."</option>\n";
				echo "<option value=\"0\">-----</option>\n";
				echo "<option value=\"light\">light</option>\n";
				echo "<option value=\"dark\">dark</option>\n";
				echo "</select>";
				echo "<br /><br />";

		} else {
                echo "<br />";
            	echo "<label style=\"width:140px; display:block; padding-top:10px;\">Video</label>\n"; 
            	echo "<div style=\"width:450px; display: inline-block; margin-top:-19px;\">\n";
                echo "<label style=\"width:0px; display:block; float:left; padding-left:80px\" for=\"Foto[1]\">Cover</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:77px\" id=\"Foto[1]\" name=\"Foto[1]\" type=\"file\" />\n"; 
                echo "<label style=\"width:0px; display:block; float:left; padding-left:80px\" for=\"Foto[2]\">mp4</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:77px\" id=\"Foto[2]\" name=\"Foto[2]\" type=\"file\" />\n"; 
                echo "<label style=\"width:0px; display:block; float:left; padding-left:80px\" for=\"Foto[3]\">ogv</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:77px\" id=\"Foto[3]\" name=\"Foto[3]\" type=\"file\" />\n"; 
                echo "<label style=\"width:0px; display:block; float:left; padding-left:80px\" for=\"Foto[4]\">webm</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:77px\" id=\"Foto[4]\" name=\"Foto[4]\" type=\"file\" />\n"; 
                echo "<label style=\"width:0px; display:block; float:left; padding-left:80px\" for=\"Foto[5]\">mobile</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:77px\" id=\"Foto[5]\" name=\"Foto[4]\" type=\"file\" />\n"; 
				echo "</div>\n";
				
				echo "<p style=\"padding-left:155px; margin-top: 8px; line-height: 0.9em\">\n"."<em class=\"em\">Cover image should be set as PNG.</em>\n"."</p>\n";
			}	
				echo "</div><br />\n";


            echo "<input onClick=\"submit_cut();\" type=\"submit\" name=\"project\" class=\"button switch_ascii\" value=\"Update\" /><br /><br /><br />\n";
            echo "</div>\n";
      
	
echo "<div id=\"bio\">\n";
   				
	$sql_items = "SELECT 
			
                            ID,
                            date,
                        	caption,
                            text
                            
                    FROM 
                    
                            tears
                            
                  	WHERE	ID = '".$_GET['id']."'

                    ORDER BY ID DESC
                                                        
           			";  
           			
    $result_items = mysqli_query($conn, $sql_items) OR die("<pre>".$sql_items."</pre>".mysqli_error($conn)); 
	$row_items = mysqli_fetch_assoc($result_items);
   	
   	echo "<h2><a href=\"?s=tears\" class=\"cookie_h\">Cuts</a><span class=\"cookie\">></span>".htmlentities($row_items['caption'], ENT_QUOTES)."</h2>\n";
   	echo "<div id=\"trasher\"><img src=\"gui/trasher.png\" onClick=\"setTimeout('window.location=\'?s=drop_tear&id=".$_GET['id']."\'',2500); return true;\"  /></div>\n";	
   	echo "<div id=\"trasher-note\"><p>&nbsp;&nbsp;Drop the whole post</p></div>\n";
	echo "<p>\n"."<em class=\"em trasher-onstate\">dropping post from tears&hellip;</em>\n"."</p>\n"; 
			

	$sql_img = "SELECT 
			
                            ID,
                            ID_t,
                            content_img,
                            date
                    FROM 
                            img
                            
                    WHERE	id_t = '".$row_items['ID']."'
                    
                    ORDER BY ID ASC
                            
           			";  
           			
    		$result_img = mysqli_query($conn, $sql_img) OR die("<pre>".$sql_img."</pre>".mysqli_error($conn)); 
			$row_img = mysqli_fetch_assoc($result_img);
			
			echo "<div id=\"project_details\">\n";
			
   				if(substr("".htmlentities($row_img['content_img'], ENT_QUOTES)."", -3) == "jpg")  {
  
 	/*
			$sizing = GetImageSize("images/".htmlentities($row_img['content_img'], ENT_QUOTES).""); 
	*/
	 
       					echo "<img src=\"images/".htmlentities($row_img['content_img'], ENT_QUOTES)."\" /><p class=\"view\"><a href=\"?s=drop_tear_img&id=".$row_img['ID']."&from_tear=".$row_items['ID']."\">[ drop ]</a></p>\n";
  				
			while($row_img = mysqli_fetch_assoc($result_img)) {
	
   				
      					echo "<img src=\"images/".htmlentities($row_img['content_img'], ENT_QUOTES)."\" /><p class=\"view\"><a href=\"?s=drop_tear_img&id=".$row_img['ID']."&from_tear=".$row_items['ID']."\">[ drop ]</a></p>\n";
      									
   		

   			}
   			
   		} else {
   		
   		if($row_img['ID_t'] != "") {
   		
   		echo "<video width=\"540\" height=\"304\" poster=\"images/".htmlentities($row_img['content_img'], ENT_QUOTES)."\" controls=\"controls\" preload=\"none\">\n";
   		
   		
   				while($row_img = mysqli_fetch_assoc($result_img)) {
   				
   				
					if(substr("".htmlentities($row_img['content_img'], ENT_QUOTES)."", 20) == "mp4") {
						$setCodec ="codecs=avc1.42E01E, mp4a.40.2";
					}   elseif(substr("".htmlentities($row_img['content_img'], ENT_QUOTES)."", 20) == "ogv") {
						$setCodec ="codecs=theora, vorbis";
					}	elseif(substr("".htmlentities($row_img['content_img'], ENT_QUOTES)."", 20) == "webm") {
						$setCodec ="codecs=vp8, vorbis";
					} 				
   			
   			   		if(substr("".htmlentities($row_img['content_img'], ENT_QUOTES)."", 20) == "ogv") {
   		
   							$setType = "ogg"; }  else {  $setType = "".substr("".htmlentities($row_img['content_img'], ENT_QUOTES)."", 20).""; 
   				
				   				}
	
      					echo "<source type=\"video/".$setType."; ".$setCodec."\" src=\"images/".htmlentities($row_img['content_img'], ENT_QUOTES)."\" />\n";

   			}
	
   	   		echo "</video><p class=\"view\" style=\"margin-top: 8px;\"><a href=\"?s=drop_video_content&id=".$row_items['ID']."\">[ drop ]</a></p>\n";
   		
   		} else {
				echo "<p style=\"margin-top: 10px; line-height: 0.9em\">\n"."<em class=\"em\">No video added yet.</em>\n"."</p>\n";
   			}
   	
   		}
   		
   	            echo "</div></div>\n"; 

?>