<?php		

		$query = "
							SELECT 
							
								ID,
								ID_p,
								content_img
								
							FROM 
							
								img
								
							WHERE ID_p ='".$_GET['id']."'
						
								";
			
			$result_query = mysql_query($query) or die(mysql_error());
			while($row_query = @mysql_fetch_assoc($result_query)){
			
			unlink(PIC_FOLDER.$row_query['content_img']);
			
			}

			$delete_i = "
			
							DELETE FROM img WHERE ID_p ='".$_GET['id']."'

								";
			$i_delete = mysql_query($delete_i) or die(mysql_error());
			$i_row_delete = @mysql_fetch_assoc($i_delete);


			$delete_p = "
			
							DELETE FROM project WHERE ID ='".$_GET['id']."'

								";
			$p_delete = mysql_query($delete_p) or die(mysql_error());
			$p_row_delete = @mysql_fetch_assoc($p_delete);

			

			echo "<meta http-equiv=\"refresh\" content=\"0; URL=?s=books\">\n";


?>