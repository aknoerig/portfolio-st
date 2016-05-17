<?php		

		$query = "
							SELECT 
							
								ID_a,
								content_img
								
							FROM 
							
								img
														
								";
			
			$result_query = mysql_query($query) or die(mysql_error());
			while($row_query = @mysql_fetch_assoc($result_query)){
			
			unlink(PIC_FOLDER.$row_query['content_img']);
			
			}

			$delete_i = "
			
							DELETE FROM img WHERE ID_a != '' 

								";
			$i_delete = mysql_query($delete_i) or die(mysql_error());
			$i_row_delete = @mysql_fetch_assoc($i_delete);
			

			echo "<meta http-equiv=\"refresh\" content=\"0; URL=?s=lightbox\">\n";


?>