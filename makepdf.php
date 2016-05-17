<?php

	include_once("dompdf/dompdf_config.inc.php");

	if(isset($_GET['selection']))
		

		{
			$selection = $_GET['selection'];
			
	
			$row_selection = explode(",", $selection);


	$html = '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><title>Sabrina Theissen Photography / Ligthroom Selection</title><style type "text/css">html, body {margin:0; padding: 0; } p { font-size: 11px; color: #333; letter-spacing: 1px; margin: -25px 0 0 35px; } img { margin-top: -1px; }</style></head><body cellspacing="0" cellpadding="0">';	
 			 		
			foreach ($row_selection as $i) {

			$fin_selection = "<img src=\"http://sabrinatheissen.com/cms/images/Sabrina_Theissen".$i."jpg\" /><p>&copy; Sabrina Theissen &nbsp; www.sabrinatheissen.com</p>";
			
			$html = $html . $fin_selection;
	
					
				}
	
	$html = $html .'</body></html>';	

				$dompdf = new DOMPDF();
				$dompdf->set_paper('a4', 'portrait');
				$dompdf->load_html($html);
				$dompdf->render();
				$dompdf->stream('Sabrina_Theissen_Photography.pdf');	
				
		}

?>