<?php		

		$query = "
							SELECT 
							
								ID,
								ID_a,
								content_img
								
							FROM 
							
								img
								
							WHERE ID ='".$_GET['id']."'
						
								";
			
			$result_query = mysql_query($query) or die(mysql_error());
			while($row_query = @mysql_fetch_assoc($result_query)){
			
			unlink(PIC_FOLDER.$row_query['content_img']);
			unlink(PIC_FOLDER.'ltr_thumbs/'.$row_query['content_img']);
			unlink(PIC_FOLDER.'ltr_thumbs_sml/'.$row_query['content_img']);
			
			}

			$delete_i = "
			
							DELETE FROM img WHERE ID ='".$_GET['id']."'

								";
			$i_delete = mysql_query($delete_i) or die(mysql_error());
			$i_row_delete = @mysql_fetch_assoc($i_delete);


			echo "<meta http-equiv=\"refresh\" content=\"0; URL=?s=lightbox\">\n";


?>