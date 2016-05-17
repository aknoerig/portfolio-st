<div id="content">
	
	<script>
			   $(function() {
					$("#sign").show();
					$("#sign_d").hide();
			   });
	</script>

	<a href="?s=books">
		<div id="mark-books"<?php echo "$_set_hider"; ?>></div>
		<div id="sign"<?php echo "$_set_hider"; ?>></div>
		<div id="sign_d"<?php echo "$_set_hider"; ?>></div>
	</a>

<?php

			if(!isset($_SESSION['access']))
			   {
			   
			   echo "<script>";
			   echo "window.onload = function() {";
    		   echo "if(!window.location.hash) {";
        	   echo "window.location = window.location + '#access';";
        	   echo "window.location.reload(true);";
        	   echo "}";
        	   echo "}";
        	   echo "</script>";

			   }  else  {
			   
?> 
			   
			   <script>
			   $(function() {
					$("html, body").css({ "background-color" : "#1a1b20", "-webkit-transition" : "0.6s linear", "-moz-transition" : "0.6s linear", "-o-transition" : "0.6s linear", "transition" : "0.6s linear" },0);			   
					$(".navi-white").children("li").addClass("white-points");
					$("#counter p").addClass("white-points");
					$("#mark-books").hide();
					$("#sign").hide();
					$("#sign_d").show();
					$(".stalled").show();
					$(".books").hide();
			   });
			   </script>

	<div id="overview"<?php echo "$_set_overview"; ?>>

	<div id="ltb">
	
	<?php
	
	$sql_ltr_img = "SELECT 
			
                            ID,
                            ID_a,
                            content_img,
                            recordListingID
                    
                    FROM 
                                       
                            img
                            
                    WHERE ID_a != 'NULL'
                                                        
                    ORDER BY recordListingID ASC
                                                        
           			";  
           			
    $result_ltr_img = mysql_query($sql_ltr_img) OR die("<pre>".$sql_ltr_img."</pre>".mysql_error()); 
	while($row_ltr_img = mysql_fetch_assoc($result_ltr_img)) {	
	
			echo "<div id=\"container\"><p class=\"add\">ADD</p><p class=\"clear\">DROP</p><div class=\"reset\"></div><div class=\"clicked\"></div><img src=\"cms/images/ltr_thumbs_sml/".htmlentities($row_ltr_img['content_img'], ENT_QUOTES)."\" /></div>\n";
	
	}
	?>		

			</div>

	<a href="#top"><div id="footer_l"></div><div id="footer_d"></div></a>
	
	</div>
	
	<div id="counter"><a href="#top"><p>Top</p></a></div>
	<div id="ltr_note_container"><p><?php if(isset($note)) { echo $note; } ?></p></div>
	<div id="ltr_btn_container">
		 <input type="submit" class="ltr_btn" value="Download" name="Download">
	</div>
	
<?php } ?>	

</div>