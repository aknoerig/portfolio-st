<?php
	require_once 'dompdf/lib/html5lib/Parser.php';
	require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
	require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
	require_once 'dompdf/src/Autoloader.php';
	Dompdf\Autoloader::register();

	#include_once("dompdf/dompdf_config.inc.php");

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

		use Dompdf\Dompdf;
		$dompdf = new Dompdf();
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->loadHtml($html);
		$dompdf->render();
		$dompdf->stream('Sabrina_Theissen_Photography.pdf');	
			
	}

?>