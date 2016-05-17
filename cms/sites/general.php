<?php 
    error_reporting(E_ALL); 

    echo "<div id=\"info\">\n";
   			echo "<h2>Address</h2>\n";

            $sql_open = "SELECT 
			
                            ID,
							about_txt,
							ustnr,
							name,
							street,
							no,
							additional,
							zip,
							city,
							country,
							phone,
							mobile,
							mail,
							agency,
							name_r,
							web_r,
							phone_r,
							imprint,
							terms,
							about_img
                    FROM 
                            about
					WHERE
							ID = '1'
                   "; 
            $result_open = mysql_query($sql_open); 
            $row_open_ = mysql_fetch_assoc($result_open); 


			if(isset($_POST['address']) AND $_POST['address'] == "Update") {
	
            $sql_update = "UPDATE
			
                                about 
                                
                        SET 
                        		name = '".mysql_real_escape_string(trim($_POST['name']))."',
                                street = '".mysql_real_escape_string(trim($_POST['street']))."',
                                no = '".mysql_real_escape_string(trim($_POST['no']))."',
						 		additional = '".mysql_real_escape_string(trim($_POST['additional']))."',
							    zip = '".mysql_real_escape_string(trim($_POST['zip']))."',
							    city = '".mysql_real_escape_string(trim($_POST['city']))."',
							    country = '".mysql_real_escape_string(trim($_POST['country']))."',
							    ustnr = '".mysql_real_escape_string(trim($_POST['ustnr']))."'
							    
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
                 " accept-charset=\"ISO-8859-1\">\n"; 
		
			echo "<div style=\"height:5px;\"></div>\n";
			echo "<label style=\"width:120px; display:inline-block;\" for=\"c_name\">Name</label>\n"; 
			echo "<input style=\"width:255px; display:inline-block;\" type=\"text\" name=\"name\" id=\"name\" maxlenght=\"255\" value=\"".htmlentities($row_open_['name'], ENT_QUOTES)."\"><br />\n";
			
			echo "<label class=\"top-15\" style=\"width:120px; display:inline-block;\" for=\"street\">Street</label>\n"; 
            echo "<input class=\"top-15\" style=\"display:inline-block;\" type=\"text\" name=\"street\" id=\"street\" maxlenght=\"50\" value=\"".htmlentities($row_open_['street'], ENT_QUOTES)."\" >\n";

			echo "<label class=\"top-15\" style=\"width:40px; display:inline-block;\" for=\"no\">&nbsp;No.</label>\n"; 
	        echo "<input class=\"top-15\" style=\"inline-display:inline-block;\" type=\"text\" name=\"no\" id=\"no\" size=\"4\" maxlenght=\"50\" value=\"".htmlentities($row_open_['no'], ENT_QUOTES)."\" ><br />\n";

			echo "<label class=\"top-15\" style=\"width:120px; display:inline-block;\" for=\"additional\">Additional</label>\n"; 
			echo "<input class=\"top-15\" style=\"width:255px; display:inline-block;\" type=\"text\" name=\"additional\" id=\"additional\" maxlenght=\"255\" value=\"".htmlentities($row_open_['additional'], ENT_QUOTES)."\"><br />\n"; 

			echo "<label class=\"top-15\" style=\"width:120px; display:inline-block;\" for=\"zip\">Zip</label>\n"; 
	        echo "<input class=\"top-15\" style=\"display:inline-block;\" type=\"text\" name=\"zip\" id=\"zip\" size=\"7\" maxlenght=\"50\" value=\"".htmlentities($row_open_['zip'], ENT_QUOTES)."\" >&nbsp;&nbsp;\n";

            echo "<label class=\"top-15\" style=\"width:55px; display:inline-block;\" for=\"city\">&nbsp;City</label>\n"; 
            echo "<input class=\"top-15\" style=\"display:inline-block;\" type=\"text\" name=\"city\" id=\"city\" size=\"14\" maxlenght=\"50\" value=\"".htmlentities($row_open_['city'], ENT_QUOTES)."\" ><br />\n";

			echo "<label class=\"top-15\" style=\"width:120px; display:inline-block;\" for=\"country\">Country</label>\n"; 
			echo "<input class=\"top-15\" style=\"display:inline-block;\" type=\"text\" name=\"country\" id=\"country\" maxlenght=\"255\" value=\"".htmlentities($row_open_['country'], ENT_QUOTES)."\"><br />\n"; 
						
			echo "<label class=\"top-15\" style=\"width:120px; display:inline-block;\" for=\"ustnr\">VAT-ID</label>\n"; 
			echo "<input class=\"top-15\" type=\"text\" name=\"ustnr\" id=\"ustnr\" maxlenght=\"255\" value=\"".htmlentities($row_open_['ustnr'], ENT_QUOTES)."\"><br /><br />\n";

			echo "<input type=\"hidden\" name=\"ID\" value=\"1\" />\n"; 
            echo "<input type=\"submit\" name=\"address\" class=\"button top-5\" value=\"Update\" /><br /><br />\n"; 

			echo "</form>";
			echo "\n";
			
			echo "<div style=\"width:430px; height:2px; border-top:1px solid #000;\"></div>\n";
			

			echo "<h2>Contacts</h2>\n"; 
			
			if(isset($_POST['contacts']) AND $_POST['contacts'] == "Update") {
	
            $sql_update = "UPDATE
			
                                about 
                        SET 
                                mail = '".mysql_real_escape_string(trim($_POST['mail']))."',
                                phone = '".mysql_real_escape_string(trim($_POST['phone']))."',
                                mobile = '".mysql_real_escape_string(trim($_POST['mobile']))."'
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
                 
			echo "<div style=\"height:10px;\"></div>\n";
			echo "<label style=\"width:120px; display:block; float:left;\" for=\"phone\">Landline</label>\n"; 
			echo "<input type=\"text\" name=\"phone\" id=\"phone\" maxlenght=\"255\" value=\"".htmlentities($row_open_['phone'], ENT_QUOTES)."\"><br />\n";

			echo "<label class=\"top-15\" style=\"width:120px; display:block; float:left;\" for=\"mobile\">Mobile</label>\n"; 
			echo "<input class=\"top-15\" type=\"text\" name=\"mobile\" id=\"mobile\" maxlenght=\"255\" value=\"".htmlentities($row_open_['mobile'], ENT_QUOTES)."\"><br />\n";
			
			echo "<label class=\"top-15\" style=\"width:120px; display:block; float:left; \" for=\"mail\">Mail</label>\n"; 
			echo "<input class=\"top-15\" style=\"display:block; float:left; margin-right:5px\" type=\"text\" name=\"mail\" id=\"mail\" size=\"8\" maxlenght=\"255\" value=\"".htmlentities($row_open_['mail'], ENT_QUOTES)."\">\n"; 
			echo "<label class=\"top-15\" style=\"display:block; float:left;\">@sabrinatheissen.com</label><br /><br /><br />\n"; 


			echo "<input type=\"hidden\" name=\"ID\" value=\"1\" />\n"; 
            echo "<input type=\"submit\" name=\"contacts\" class=\"button top-5\" value=\"Update\" /><br /><br />\n"; 
            echo "</form>\n";
			
			

			echo "<div style=\"width:430px; height:2px; border-top:1px solid #000;\"></div>\n";
			

			echo "<h2>Represent</h2>\n"; 
			
			if(isset($_POST['represent']) AND $_POST['represent'] == "Update") {
	
            $sql_update = "UPDATE
			
                                about 
                        SET 
                                agency = '".mysql_real_escape_string(trim($_POST['agency']))."',
                                name_r = '".mysql_real_escape_string(trim($_POST['name_r']))."',
                                phone_r = '".mysql_real_escape_string(trim($_POST['phone_r']))."',
                                web_r = '".mysql_real_escape_string(trim($_POST['web_r']))."'

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
                 
			echo "<div style=\"height:10px;\"></div>\n";
			echo "<label style=\"width:120px; display:block; float:left; margin-top:2px;\" for=\"agency\">Agency</label>\n"; 
			echo "<input style=\"width:220px;\" type=\"text\" name=\"agency\" id=\"agency\" maxlenght=\"255\" value=\"".htmlentities($row_open_['agency'], ENT_QUOTES)."\"><br />\n";

			echo "<label class=\"top-15\" style=\"width:120px; display:block; float:left;\" for=\"name_r\">Additional</label>\n"; 
			echo "<input style=\"width:220px;\" class=\"top-15\" type=\"text\" name=\"name_r\" id=\"name_r\" maxlenght=\"255\" value=\"".htmlentities($row_open_['name_r'], ENT_QUOTES)."\"><br />\n";

			echo "<label class=\"top-15\" style=\"width:120px; display:block; float:left;\" for=\"phone_r\">Landline</label>\n"; 
			echo "<input style=\"width:220px;\" class=\"top-15\" type=\"text\" name=\"phone_r\" id=\"phone_r\" maxlenght=\"255\" value=\"".htmlentities($row_open_['phone_r'], ENT_QUOTES)."\"><br />\n";

			echo "<label class=\"top-15\" style=\"width:120px; display:block; float:left;\" for=\"web_r\">Website</label>\n"; 
			echo "<input style=\"width:220px;\" class=\"top-15\" type=\"text\" name=\"web_r\" id=\"web_r\" maxlenght=\"255\" value=\"".htmlentities($row_open_['web_r'], ENT_QUOTES)."\"><br /><br />\n";
			


			echo "<input type=\"hidden\" name=\"ID\" value=\"1\" />\n"; 
            echo "<input type=\"submit\" name=\"represent\" class=\"button top-5\" value=\"Update\" /><br /><br />\n"; 
            echo "</form>\n";
			echo "</div>\n";			
			
			

	echo "<div id=\"bio\">\n";
	
			echo "<h2>About</h2>\n"; 
			
			 if(isset($_POST['about']) AND $_POST['about'] == "Update") { 
				  

             for($i=1; $i<=1; $i++){ 
 
                $myFILE['name'] = $_FILES['Foto']['name'][$i]; 
                $myFILE['type'] = $_FILES['Foto']['type'][$i]; 
                $myFILE['tmp_name'] = $_FILES['Foto']['tmp_name'][$i]; 
                $myFILE['error'] = $_FILES['Foto']['error'][$i]; 
                $myFILE['size'] = $_FILES['Foto']['size'][$i]; 

                
                    do { 
                        $Name = renameFile($myFILE['name']); 
                    } while(file_exists(PIC_FOLDER."PIC_".$Name)); 

                    if (move_uploaded_file($myFILE['tmp_name'], PIC_FOLDER."PIC_".$Name)) {

				unlink(PIC_FOLDER.$row_open_['about_img']);
				
				$sql = "UPDATE 
                                about 
                        SET 
								about_img = '".mysql_real_escape_string(trim("PIC_".$Name))."',
                                about_txt = '".mysql_real_escape_string(trim($_POST['about_txt']))."'
                       WHERE 
								ID = '1'
                       
                       "; 
                       
                        mysql_query($sql) OR die("<pre>".$sql."</pre>".mysql_error());

						echo "<p>\n"."<em class=\"em\">loading data&hellip;</em>\n"."</p>\n"; 
            			echo "<meta http-equiv=\"refresh\" content=\"1; URL=".curPageURL()."\">\n";
            			
            			echo "<div id=\"about-switch-container\">";
                		echo "<textarea class=\"top-5 on\" id=\"about_txt\" name=\"about_txt\" type=\"text\" style=\"width: 440px; height: 160px;\" />".htmlentities($row_open_['about_txt'], ENT_QUOTES)."</textarea>\n";             
                		echo "</div><br />";              
                                
                		echo "<label style=\"width:120px; display:block; float:left; padding-top:2px;\" for=\"Foto[".$i."]\">Portrait</label>\n"; 
                		echo "<input id=\"Foto[".$i."]\" name=\"Foto[".$i."]\" type=\"file\" />\n";
                		echo "<div id=\"about_img\"><img src=\"gui/reload.png\" width=\"125\"><div id=\"about_img_prev\"><a href=\"images/".htmlentities($row_open_['about_img'], ENT_QUOTES)."\" target=\"_blank\">&nbsp;</a></div></div>";
                		
                		echo "<br /><br /><input type=\"submit\" name=\"about\" class=\"button\" value=\"Update\" /><br />\n"; 
        
						echo "<br /><br />\n";

                    }
					
				else { 

				$sql = "UPDATE 
                                about 
                        SET 
                                about_txt = '".mysql_real_escape_string(trim($_POST['about_txt']))."'
                       WHERE 
								ID = '1'
                       
                       "; 
                       
                        mysql_query($sql) OR die("<pre>".$sql."</pre>".mysql_error());

						echo "<p>\n"."<em class=\"em\">loading data&hellip;</em>\n"."</p>\n"; 
            			echo "<meta http-equiv=\"refresh\" content=\"1; URL=".curPageURL()."\">\n";
            			
            			echo "<div id=\"about-switch-container\">";
                		echo "<textarea class=\"top-5 on\" id=\"about_txt\" name=\"about_txt\" type=\"text\" style=\"width: 440px; height: 160px;\" />".htmlentities($row_open_['about_txt'], ENT_QUOTES)."</textarea>\n";             
                		echo "</div><br />";  
                
                		echo "<label style=\"width:120px; display:block; float:left; padding-top:2px;\" for=\"Foto[".$i."]\">Portrait</label>\n"; 
                		echo "<input id=\"Foto[".$i."]\" name=\"Foto[".$i."]\" type=\"file\" />\n";
                		echo "<div id=\"about_img\"><img src=\"images/".htmlentities($row_open_['about_img'], ENT_QUOTES)."\" width=\"125\"><div id=\"about_img_prev\"><a href=\"images/".htmlentities($row_open_['about_img'], ENT_QUOTES)."\" target=\"_blank\">&nbsp;</a></div></div>";
                		
                		echo "<br /><br /><input type=\"submit\" name=\"about\" class=\"button\" value=\"Update\" /><br />\n"; 
        
						echo "<br /><br />\n";

					} 
            } 
  
	}
        else { 
		
			echo "<form ". 
                 "action=\"".curPageURL()."\" ". 
				 "method=\"post\" ". 
				 "enctype=\"multipart/form-data\" ". 
				 "accept-charset=\"ISO-8859-1\">"; 
			echo "<div>\n"; 

            for($i=1; $i<=1; $i++){ 
                
            			echo "<div id=\"about-switch-container\">";
                		echo "<textarea class=\"top-5 on\" id=\"about_txt\" name=\"about_txt\" type=\"text\" style=\"width: 440px; height: 160px;\" />".htmlentities($row_open_['about_txt'], ENT_QUOTES)."</textarea>\n";             
                		echo "</div><br />";  
                
                echo "<label style=\"width:120px; display:block; float:left; padding-top:2px;\" for=\"Foto[".$i."]\">Portrait</label>\n"; 
                echo "<input id=\"Foto[".$i."]\" name=\"Foto[".$i."]\" type=\"file\" />\n";
                echo "<div id=\"about_img\"><img src=\"images/".htmlentities($row_open_['about_img'], ENT_QUOTES)."\" width=\"125\"><div id=\"about_img_prev\"><a href=\"images/".htmlentities($row_open_['about_img'], ENT_QUOTES)."\" target=\"_blank\">&nbsp;</a></div></div>";


            } 
            echo "<br /><input type=\"submit\" name=\"about\" class=\"button\" value=\"Update\" /><br />\n"; 
            echo "</div></form>\n";
			echo "<br />\n";
        } 
     
     
     
 			echo "<div style=\"width:452px; height:2px; border-top:1px solid #000;\"></div>\n";    
     
			echo "<h2>Legal</h2>\n"; 
			
			 if(isset($_POST['legal']) AND $_POST['legal'] == "Update") { 
			 

            for($i=1; $i<=1; $i++){ 
 
                $myFILE['name'] = $_FILES['Docs']['name'][$i]; 
                $myFILE['type'] = $_FILES['Docs']['type'][$i]; 
                $myFILE['tmp_name'] = $_FILES['Docs']['tmp_name'][$i]; 

                
                    do { 
                        $Name = renameFile($myFILE['name']); 
                    } while(file_exists(DOC_FOLDER."DOC_".$Name)); 

                    if (move_uploaded_file($myFILE['tmp_name'], DOC_FOLDER."DOC_".$Name)) {

				unlink(DOC_FOLDER.$row_open_['terms']);
			
				$sql = "UPDATE 
                                about 
                        SET 
								terms = '".mysql_real_escape_string(trim("DOC_".$Name))."',
								imprint = '".mysql_real_escape_string(trim($_POST['imprint'][$i]))."'
                       WHERE 
								ID = '1'
                       
                       "; 
                       
                        mysql_query($sql) OR die("<pre>".$sql."</pre>".mysql_error());

						echo "<p>\n"."<em class=\"em\">loading data&hellip;</em>\n"."</p>\n"; 
            			echo "<meta http-equiv=\"refresh\" content=\"1; URL=".curPageURL()."\">\n";
            			
            			echo "<div id=\"imprint-switch-container\">";
                		echo "<textarea class=\"top-5 on\" id=\"imprint[".$i."]\" name=\"imprint[".$i."]\" type=\"text\" style=\"width: 440px; height: 160px;\" />".htmlentities($row_open_['imprint'], ENT_QUOTES)."</textarea>\n";
                		echo "</div><br />";              
                
                
                		echo "<label style=\"width:120px; display:block; float:left; padding-top:2px;\" for=\"Docs[".$i."]\">Terms (PDF)</label>\n";
                		echo "<input id=\"Docs[".$i."]\" name=\"Docs[".$i."]\" type=\"file\" />\n";
                		echo "<a href=\"docs/".htmlentities($row_open_['terms'], ENT_QUOTES)."\" class=\"pdf_prev\" target=\"_blank\">Terms / AGBs (Preview)</a>\n";

                		
                		echo "<br /><br /><input type=\"submit\" name=\"legal\" class=\"button\" value=\"Update\" /><br />\n"; 
        
						echo "<br /><br />\n";

                    }
					
				else { 

				$sql = "UPDATE 
                                about 
                        SET 
								imprint = '".mysql_real_escape_string(trim($_POST['imprint'][$i]))."'
                       WHERE 
								ID = '1'
                       
                       "; 
                       
                        mysql_query($sql) OR die("<pre>".$sql."</pre>".mysql_error());
                        

						echo "<p>\n"."<em class=\"em\">loading data&hellip;</em>\n"."</p>\n"; 
            			echo "<meta http-equiv=\"refresh\" content=\"1; URL=".curPageURL()."\">\n";
            			
            			echo "<div id=\"imprint-switch-container\">";
                		echo "<textarea class=\"top-5 on\" id=\"imprint[".$i."]\" name=\"imprint[".$i."]\" type=\"text\" style=\"width: 440px; height: 160px;\" />".htmlentities($row_open_['imprint'], ENT_QUOTES)."</textarea>\n";
                		echo "</div><br />";              
                
                		echo "<label style=\"width:120px; display:block; float:left; padding-top:2px;\" for=\"Docs[".$i."]\">Terms (PDF)</label>\n";
                		echo "<input id=\"Docs[".$i."]\" name=\"Docs[".$i."]\" type=\"file\" />\n";
                		echo "<a href=\"docs/".htmlentities($row_open_['terms'], ENT_QUOTES)."\" class=\"pdf_prev\" target=\"_blank\">Terms / AGBs (Preview)</a>\n";

                		
                		echo "<br /><br /><input type=\"submit\" name=\"legal\" class=\"button\" value=\"Update\" /><br />\n"; 
        
						echo "<br /><br />\n";

					} 
            } 
  
	}
        else { 
		
			echo "<form ". 
                 "action=\"".curPageURL()."\" ". 
				 "method=\"post\" ". 
				 "enctype=\"multipart/form-data\" ". 
				 "accept-charset=\"ISO-8859-1\">"; 
			echo "<div>\n"; 

            for($i=1; $i<=1; $i++){ 
                
            			echo "<div id=\"imprint-switch-container\">";
                		echo "<textarea class=\"top-5 on\" id=\"imprint[".$i."]\" name=\"imprint[".$i."]\" type=\"text\" style=\"width: 440px; height: 160px;\" />".htmlentities($row_open_['imprint'], ENT_QUOTES)."</textarea>\n";
                		echo "</div><br />";              
                
                		echo "<label style=\"width:120px; display:block; float:left; padding-top:2px;\" for=\"Docs[".$i."]\">Terms (PDF)</label>\n";
                		echo "<input id=\"Docs[".$i."]\" name=\"Docs[".$i."]\" type=\"file\" />\n";
                		echo "<a href=\"docs/".htmlentities($row_open_['terms'], ENT_QUOTES)."\" class=\"pdf_prev\" target=\"_blank\">Terms / AGBs (Preview)</a>\n";
             
            } 
            echo "<br /><input type=\"submit\" name=\"legal\" class=\"button\" value=\"Update\" /><br />\n"; 
            echo "</div></form>\n";
			echo "<br /><br />\n";
        } 
     
        
	echo "</div>\n"; 
			
?>