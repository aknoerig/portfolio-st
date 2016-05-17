<?php 

include("mysql.php"); 

if($_GET['lastComment']){

	$sql_items = "SELECT 
			
                            ID,
                            date,
                        	caption,
                            text,
                            vid,
                            pager
                            
                    FROM 
                    
                            tears
                            
                    WHERE ID > '".mysql_real_escape_string($_GET['lastComment'])."'
                    
                    ORDER BY ID DESC
                    
                    LIMIT 0 , 30
                                                        
           			";  
           			
    $result_items = mysql_query($sql_items) OR die("<pre>".$sql_items."</pre>".mysql_error()); 

	$val = $_GET['lastComment'];

	while($row_items = mysql_fetch_assoc($result_items)) {
	
	if( htmlentities($row_items['vid'], ENT_QUOTES) == "yes") {

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
           			
    		$result_img = mysql_query($sql_img) OR die("<pre>".$sql_img."</pre>".mysql_error()); 
			$row_img = mysql_fetch_assoc($result_img);
			
			$sizing = GetImageSize("cms/images/".htmlentities($row_img['content_img'], ENT_QUOTES).""); 	
			
			echo "<div id=\"tear\" class=\"item margin\" style=\"width:".$sizing[0]."px;\">\n";
				
			echo "<video width=\"".$sizing[0]."\" height=\"".$sizing[1]."\" poster=\"cms/images/".htmlentities($row_img['content_img'], ENT_QUOTES)."\" controls=\"controls\" preload=\"none\">\n";
		 
	$sql_img_array = "SELECT 
			
                            ID,
                            ID_t,
                            content_img,
                            date
                    FROM 
                            img

                    WHERE	id_t = '".$row_items['ID']."'
                                                
                    ORDER BY ID ASC
                            
           			";  
           			
    		$result_img_array = mysql_query($sql_img_array) OR die("<pre>".$sql_img_array."</pre>".mysql_error()); 
			while($row_img_array = mysql_fetch_assoc($result_img_array)) {

					if(substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", 20) == "mp4") {
						$setCodec ="codecs=avc1.42E01E, mp4a.40.2";
					}   elseif(substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", 20) == "ogv") {
						$setCodec ="codecs=theora, vorbis";
					}	elseif(substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", 20) == "webm") {
						$setCodec ="codecs=vp8, vorbis";
					} 	
										
   	   			   						if(substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", 20) == "ogv") {
   										$setType = "ogg"; }  else {  $setType = "".substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", 20)."";}
	
										if(substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", -3) != "png") {
										
      									echo "<source type=\"video/".$setType."; ".$setCodec."\" src=\"cms/images/".htmlentities($row_img_array['content_img'], ENT_QUOTES)."\" width=\"".$sizing[0]."\" height=\"".$sizing[1]."\" />\n";			
   		         
										} 		         
   		      		}
   		
   		 		echo "</video>\n"; 
         		echo "<h2>".htmlentities($row_items['caption'], ENT_QUOTES)."</h2><p>".htmlentities($row_items['text'], ENT_QUOTES)."</p><h3>".htmlentities($row_items['date'], ENT_QUOTES)."</h3>\n";
   		
   				echo "</div>\n";
   		
   		}	else	{

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
           			
    		$result_img = mysql_query($sql_img) OR die("<pre>".$sql_img."</pre>".mysql_error()); 
			$row_img = mysql_fetch_assoc($result_img);
			
			$sizing = GetImageSize("cms/images/".htmlentities($row_img['content_img'], ENT_QUOTES).""); 	
			   		
   	echo "<div id=\"tear\" class=\"item margin\" style=\"width:".$sizing[0]."px;\">\n";

	
    echo "<div id=\"imgContainer\" class=\"scrollContainer_".htmlentities($row_items['ID'], ENT_QUOTES)."\" style=\"width:".$sizing[0]."px; height:".$sizing[1]."px;\">\n";
    
    
    
    echo "<div id=\"carousel\" style=\"width:".$sizing[0]."px;\">\n";


	$sql_img_single = "SELECT 
			
                            ID,
                            ID_t,
                            content_img,
                            date
                    FROM 
                            img

                    WHERE	id_t = '".$row_items['ID']."'
                                                
                    ORDER BY ID DESC
                            
           			";  
           			
    $result_img_single = mysql_query($sql_img_single) OR die("<pre>".$sql_img_single."</pre>".mysql_error()); 
	$row_img_single = mysql_fetch_assoc($result_img_single);

	$sql_img_count = "SELECT 
			
                            ID,
                            ID_t,
                            COUNT(content_img)
                    FROM 
                            img

                    WHERE	id_t = '".$row_items['ID']."' AND ID != '".$row_img_single['ID']."' 
                                                
                            
           			";  
           			
    $result_img_count = mysql_query($sql_img_count) OR die("<pre>".$sql_img_count."</pre>".mysql_error()); 
	$row_img_count = mysql_fetch_assoc($result_img_count);
	
	$sql_img_array = "SELECT 
			
                            ID,
                            ID_t,
                            content_img,
                            date
                    FROM 
                            img

                    WHERE	id_t = '".$row_items['ID']."' AND ID != '".$row_img_single['ID']."' 
                                                
                    ORDER BY ID ASC
                            
           			";  
           			
    		$result_img_array = mysql_query($sql_img_array) OR die("<pre>".$sql_img_array."</pre>".mysql_error()); 
			while($row_img_array = mysql_fetch_assoc($result_img_array)) {
		
		echo "<div id=\"pages\" style=\"width:".$sizing[0]."px; height:".$sizing[1]."px;\"><h2 class=\"".htmlentities($row_items['pager'], ENT_QUOTES)."\" style=\"width:".$sizing[0]."px; bottom: ".(($sizing[1]/2)-35)."px;\">1/".($row_img_count['COUNT(content_img)']+1)."</h2></div>";

	   		         						echo "<img class=\"sub\" src=\"cms/images/".htmlentities($row_img_array['content_img'], ENT_QUOTES)."\" width=\"".$sizing[0]."\" height=\"".$sizing[1]."\"  />\n";
   		         
   		      		}
   		      		
   		      		
   		      		   		         		echo "<img class=\"last-tear\" src=\"cms/images/".htmlentities($row_img_single['content_img'], ENT_QUOTES)."\" width=\"".$sizing[0]."\" height=\"".$sizing[1]."\"  />\n";


   			echo "<script type=\"text/javascript\">\n";
			echo "$(\".scrollContainer_".htmlentities($row_items['ID'], ENT_QUOTES)." #carousel .sub, .scrollContainer_".htmlentities($row_items['ID'], ENT_QUOTES)." #carousel #pages\").click(function(){\n";
			echo "$(\"#carousel\").find(\"img\").last().css({'cursor' : 'default'});\n";
			echo "$(this).parent(\"#carousel\").animate({\"marginTop\": \"-=".$sizing[1]."px\"}, 300);\n";
			echo "});\n";

			echo "$(\".scrollContainer_".htmlentities($row_items['ID'], ENT_QUOTES)." #carousel .last-tear\").click(function(){\n";
			echo "$(this).parent(\"#carousel\").animate({\"marginTop\": \"0px\"}, 500);\n";
			echo "});\n";

			echo "</script>\n";
		
 
   				echo "</div>\n";
   				echo "</div>\n";
  					
         		echo "<h2>".htmlentities($row_items['caption'], ENT_QUOTES)."</h2><p>".htmlentities($row_items['text'], ENT_QUOTES)."</p><h3>".htmlentities($row_items['date'], ENT_QUOTES)."</h3>\n";
   				echo "</div>\n";
   		}
   		
}
   		      
		
   		echo "<a href=\"#top\"><div id=\"footer\" style=\"margin-top: 75px\"></div></a></div></div>\n"; 
	

	}

}




?>