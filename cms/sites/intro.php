<?php 
    error_reporting(E_ALL); 

	echo "<div id=\"info\">\n";
	
			echo "<h2>Add image</h2>\n"; 
			
 			if(isset($_POST['intro']) AND $_POST['intro'] == "Upload") { 

			echo "<form ". 
                 "action=\"".curPageURL()."\" ". 
				 "method=\"post\" ". 
				 "enctype=\"multipart/form-data\" ". 
				 "accept-charset=\"ISO-8859-1\">"; 
			echo "<div style=\"width:450px\">\n"; 
							
            	echo "<label style=\"width:140px; display:block; padding-top:10px;\">Intro views</label>\n"; 
            	echo "<div style=\"width:450px; display: inline-block; margin-top:-19px;\">\n";
            	for($i=1; $i<=10; $i++){  
                echo "<label style=\"width:0px; display:block; float:left; padding-left:140px\" for=\"Foto[".$i."]\">".$i."</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:32px\" id=\"Foto[".$i."]\" name=\"Foto[".$i."]\" type=\"file\" />\n"; 
				}
				
				echo "</div></div><br />\n";


            echo "<input type=\"submit\" name=\"intro\" class=\"button\" value=\"Upload\" /><br /><br />\n";
            echo "</form>\n"; 

		
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
								content_img = '".mysqli_real_escape_string(trim("PIC_".$Name))."',
							    date = NOW(),
							    intro = 'yes'
                       ";
                       
                mysqli_query($conn, $sql_img) OR die("<pre>".$sql_img."</pre>".mysqli_error($conn));
                
				
			
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
			
            	echo "<label style=\"width:140px; display:block; padding-top:10px;\">Item views</label>\n"; 
            	echo "<div style=\"width:450px; display: inline-block; margin-top:-19px;\">\n";
            	for($i=1; $i<=10; $i++){  
                echo "<label style=\"width:0px; display:block; float:left; padding-left:140px\" for=\"Foto[".$i."]\">".$i."</label>\n"; 
                echo "<input style=\"width:245px; display:block; float:left; margin-left:32px\" id=\"Foto[".$i."]\" name=\"Foto[".$i."]\" type=\"file\" />\n"; 
				}
				echo "</div>\n";
				
				echo "</div><br />\n";

            echo "<input type=\"submit\" name=\"intro\" class=\"button\" value=\"Upload\" /><br /><br />\n";
            echo "</form>\n"; 
        } 
     
		
	   echo "</div>\n"; 


		echo "<div id=\"bio\">\n";
   			echo "<h2>Intro images</h2>\n";
   		
   		echo "<p>\n"."<em class=\"em trasher-onstate\">dropping image from intro selection&hellip;</em>\n"."</p>\n"; 		
	
	$sql_items = "SELECT 
			
                            content_img,
                            intro
                    
                    FROM 
                                       
                            img
                            
                    WHERE intro= 'yes'
                                                        
                    ORDER BY ID DESC
                                                        
           			";  
           			
    $result_items = mysqli_query($conn, $sql_items) OR die("<pre>".$sql_items."</pre>".mysqli_error($conn)); 
	while($row_items = mysqli_fetch_assoc($result_items)) {	
	
				echo "<div class=\"lb_img\"><img src=\"images/".htmlentities($row_items['content_img'], ENT_QUOTES)."\" /><p class=\"view\"><a href=\"#\" onClick=\"setTimeout('window.location=\'?s=drop_intro&img=".htmlentities($row_items['content_img'], ENT_QUOTES)."\'',2500); return true;\">[ drop ]</a></p></div>\n";

           				
			}
   		         
   		         echo "<br class=\"clear\" /><br /><br />\n";


?>