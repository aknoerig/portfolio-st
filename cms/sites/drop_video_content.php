<?php		

		$query = "
							SELECT 
							
								ID,
								ID_t,
								content_img
								
							FROM 
							
								img
								
							WHERE ID_t ='".$_GET['id']."'
						
								";
			
			$result_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
			while($row_query = @mysqli_fetch_assoc($result_query)){
			
			unlink(PIC_FOLDER.$row_query['content_img']);
			
			}

			$delete_i = "
			
							DELETE FROM img WHERE ID_t ='".$_GET['id']."'

								";
			$i_delete = mysqli_query($conn, $delete_i) or die(mysqli_error($conn));
			$i_row_delete = @mysqli_fetch_assoc($i_delete);
			

			echo "<meta http-equiv=\"refresh\" content=\"0; URL=?s=tear_view&id=".$_GET['id']."\">\n";


?>