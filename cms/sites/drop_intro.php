<?php		

		$query = "
							SELECT 
							
								content_img
								
							FROM 
							
								img
								
							WHERE content_img ='".$_GET['img']."'
						
								";
			
			$result_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
			while($row_query = @mysqli_fetch_assoc($result_query)){
			
			unlink(PIC_FOLDER.$row_query['content_img']);
			
			}

			$delete_i = "
			
							DELETE FROM img WHERE content_img ='".$_GET['img']."'

								";
			$i_delete = mysqli_query($conn, $delete_i) or die(mysqli_error($conn));
			$i_row_delete = @mysqli_fetch_assoc($i_delete);
			

			echo "<meta http-equiv=\"refresh\" content=\"0; URL=?s=intro\">\n";


?>