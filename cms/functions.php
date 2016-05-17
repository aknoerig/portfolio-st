<?php 
    function checkUpload($myFILE, $file_extensions, $mime_types, $maxsize, $maxwidth=0, $maxheight=0)
    { 
        $errors = array(); 
        // Uploadfehler prüfen 
        switch ($myFILE['error']){ 
            case 1: $errors[] = "Please select file <b>smaller than ".$maxsize/MB." MB</b>.";
                    break; 
            case 2: $errors[] = "Please select file <b>smaller than ".$maxsize/MB." MB</b>.";
                    break; 
            case 3: $errors[] = "Upload not completed."; 
                    break; 
            case 4: $errors[] = "No files selected."; 
                    return $errors;   
                    break; 
            default : break; 
        } 
        // MIME-Type prüfen 
        if(!in_array(strtolower($myFILE['type']), $mime_types)){ 
            $fehler = "Wrong media type: (".$myFILE['type'].").<br />". 
                      "Allowed media types are:<br />\n"; 
            foreach($mime_types as $type) 
                $fehler .= " - ".$type."\n<br />"; 
            $errors[] = $fehler; 
        } 
        // Dateiendung prüfen 
        if($myFILE['name']=='' OR !in_array(strtolower(getExtension($myFILE['name'])), $file_extensions)){ 
            $fehler = "Wrong media suffix: (".getExtension($myFILE['name']).").<br />". 
                      "Allowed media suffixes are:<br />\n"; 
            foreach($file_extensions as $extension) 
                $fehler .= " - ".$extension."\n<br />"; 
            $errors[] = $fehler; 
        } 
        // Bildmaße prüfen 
        if(@getimagesize($myFILE['tmp_name'])){ 
            $size = getimagesize($myFILE['tmp_name']); 
            if ($size[0] > $maxwidth OR $size[1] > $maxheight) 
                $errors[] = "Resolution to high (".$size[0]."x".$size[1]." Pixel).<br />". 
                            "Allowed resolutions are: ".$maxwidth."x".$maxheight." Pixel\n";
        } 
        // Dateigröße prüfen 
        elseif($myFILE['size'] > $maxsize){ 
            $errors[] = "Filesize to big: (".$myFILE['size']/MB." MB).<br />". 
                        "Allowed file sizes are: ".$maxsize/MB." MB\n"; 
        } 
        return $errors; 
    } 


    function checkUpload_doc($myFILE_doc, $file_extensions_doc, $mime_types_doc)
    { 
        $errors_doc = array(); 

		if(!in_array(strtolower($myFILE_doc['type']), $mime_types_doc)){ 
            $fehler_doc = "Wrong media type: (".$myFILE_doc['type'].").<br />". 
                      "Allowed media types are:<br />\n"; 
            foreach($mime_types_doc as $type_doc) 
                $fehler_doc .= " - ".$type_doc."\n<br />"; 
            $errors_doc[] = $fehler_doc; 
        } 

		// Dateiendung prüfen 
        if($myFILE_doc['name']=='' OR !in_array(strtolower(getExtension($myFILE_doc['name'])), $file_extensions_doc)){ 
            $fehler_doc = "Wrong media suffix: (".getExtension($myFILE_doc['name']).").<br />". 
                      "Allowed media suffixes are:<br />\n"; 
            foreach($file_extensions_doc as $extension_doc) 
                $fehler_doc .= " - ".$extension_doc."\n<br />"; 
            $errors[] = $fehler_doc; 
        } 
        return $errors_doc; 
    } 


// gibt die Dateiendung einer Datei zurück 
    function getExtension ($filename) 
    { 
        if(strrpos($filename, '.')) 
            return substr($filename, strrpos($filename, '.')+1); 
        return false; 
    } 

    // erzeugt einen Zufallswert 
    function getRandomValue() 
    { 
        return substr(md5(rand(1, 9999)),0,8).substr(time(),-6); 
    } 
    
    
    //***********************************//
    
    // generates code
    
	$newcode = "";
	$length=5;
	$string="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

	mt_srand((double)microtime()*1000000);

	for ($i=1; $i <= $length; $i++) {
	$newcode .= substr($string, mt_rand(0,strlen($string)-1), 1);
	}

    
    
    //$newcode = getnewcode();
    //mysql_query("DELETE FROM tabelle WHERE datum < '".strtotime('-120 hours')."'");
    

    //***********************************//

     
    // erzeugt einen neuen Dateinamen aus Zufallswert und 
    function renameFile ($filename) 
    { 
        return  getRandomValue().".".getExtension($filename); 
    } 

// erzeugt ein Thumbnail 
    function createThumbnail($pic, $thumbdir, $thumbname, $newwidth, $quality)
    { 
        $size = getImageSize($pic); 

        // Größe berechnen 
        // kein resize, wenn die aktuelle Bildhöhe weniger als die neue Bildhöhe beträgt
        if($size[1] < $newwidth){ 
            $width = $size[0]; 
            $height = $size[1]; 
        } 
        // Bild nach Höhe anpassen 
        else{ 
            $width = $newwidth; 
            $height = $newwidth*$size[1]/$size[0]; 
        } 
        // Typ ermittelm 
        if($size[2]==1) { 
            // Originalbild laden 
            $original=ImageCreateFromGIF($pic); 
            // leeres Thumbnail erstellen 
            $thumbnail=ImageCreateTrueColor($width,$height); 
            // Originalbild in das Thumbnail mit angepasster Größe kopieren 
            ImageCopyResized($thumbnail,$original,0,0,0,0,$width,$height,$size[0],$size[1]);
            // Bild im temporären Thumbnail Ordner speichern 
            ImageGIF($thumbnail,$thumbdir.$thumbname); 
        } 
        elseif($size[2]==2) { 
            $original=ImageCreateFromJPEG($pic); 
            $thumbnail=ImageCreateTrueColor($width,$height); 
            ImageCopyResized($thumbnail,$original,0,0,0,0,$width,$height,$size[0],$size[1]);
            ImageJPEG($thumbnail, $thumbdir.$thumbname, $quality); 
        } 
        elseif($size[2]==3) { 
            $original=ImageCreateFromPNG($pic); 
            $thumbnail=ImageCreateTrueColor($width,$height); 
            ImageCopyResized($thumbnail,$original,0,0,0,0,$width,$height,$size[0],$size[1]);
            ImagePNG($thumbnail, $thumbdir.$thumbname); 
        } 
        else 
            return false; 
        return true; 
    } 


//Mail with Attachment

function mail_att($to,$subject,$message,$anhang) 
   { 
   $absender = "Sabrina Theissen"; 
   $absender_mail = "mail@sabrinatheissen.com"; 
   $reply = "mail@sabrinatheissen.com"; 

   $mime_boundary = "-----=" . md5(uniqid(mt_rand(), 1)); 

   $header  ="From:".$absender."<".$absender_mail.">\n"; 
   $header .= "Reply-To: ".$reply."\n"; 

   $header.= "MIME-Version: 1.0\r\n"; 
   $header.= "Content-Type: multipart/mixed;\r\n"; 
   $header.= " boundary=\"".$mime_boundary."\"\r\n"; 

   $content = "This is a multi-part message in MIME format.\r\n\r\n"; 
   $content.= "--".$mime_boundary."\r\n"; 
   $content.= "Content-Type: text/html charset=\"iso-8859-1\"\r\n"; 
   $content.= "Content-Transfer-Encoding: 8bit\r\n\r\n"; 
   $content.= $message."\r\n"; 

   //$anhang ist ein Mehrdimensionals Array 
   //$anhang enthŠlt mehrere Dateien 
   if(is_array($anhang) AND is_array(current($anhang))) 
      { 
      foreach($anhang AS $dat) 
         { 
         $data = chunk_split(base64_encode($dat['data'])); 
         $content.= "--".$mime_boundary."\r\n"; 
         $content.= "Content-Disposition: attachment;\r\n"; 
         $content.= "\tfilename=\"".$dat['name']."\";\r\n"; 
         $content.= "Content-Length: .".$dat['size'].";\r\n"; 
         $content.= "Content-Type: ".$dat['type']."; name=\"".$dat['name']."\"\r\n"; 
         $content.= "Content-Transfer-Encoding: base64\r\n\r\n"; 
         $content.= $data."\r\n"; 
         } 
      $content .= "--".$mime_boundary."--";  
      } 
   else //Nur 1 Datei als Anhang 
      { 
      $data = chunk_split(base64_encode($anhang['data'])); 
      $content.= "--".$mime_boundary."\r\n"; 
      $content.= "Content-Disposition: attachment;\r\n"; 
      $content.= "\tfilename=\"".$anhang['name']."\";\r\n"; 
      $content.= "Content-Length: .".$dat['size'].";\r\n"; 
      $content.= "Content-Type: ".$anhang['type']."; name=\"".$anhang['name']."\"\r\n"; 
      $content.= "Content-Transfer-Encoding: base64\r\n\r\n"; 
      $content.= $data."\r\n"; 
      }  
       

   if(@mail($to, $subject, $content, $header)) return true; 
   else return false; 
   } 

// End Mail with Attachment


function moveWithoutStructure($source, $target) 
    { 
        // prüfen ob ein '/' am Ende des Ordnernamens steht 
        if(substr($source,-1)!="/") 
            $source .= "/"; 
        if(substr($target,-1)!="/") 
            $target .= "/"; 
        if (!is_dir($source)) 
            return false; 
        // Ordnerzeiger erstellen 
        $ordner = dir($source); 
        while ($datei=$ordner->read()){ 
            if ($datei != '.' AND $datei != '..' ){ 
                $Entry = $source.$datei; 
                // Funktion rekursiv auf alle Unterordner anwenden 
                if (is_dir($Entry)){ 
                    moveWithoutStructure($Entry, $target); 
                    // Ordner löschen 
                    rmdir($Entry); 
                } 
                elseif($source != $target){ 
                    // Datei in den Zielordner kopieren 
                    copy($Entry, $target.$datei); 
                    // Ursprungsdatei löschen 
                    unlink($Entry); 
                } 
            } 
        } 
        $ordner->close(); 
        return true; 
    } 

    function readDirectory($pfad) 
    { 
        if(substr($pfad,-1)!="/") 
            $pfad .= "/"; 
        if(!is_dir($pfad)) 
            return false; 
        $filesArr = array(); 
        $ordner = dir($pfad); 
        while($datei = $ordner->read()) { 
            if($datei != "." AND $datei != "..") { 
                if(is_file($pfad.$datei)) 
                    $filesArr[] = $datei; 
            } 
        } 
        $ordner->close(); 
        return $filesArr; 
    }
	
function curPageURL() {
 $pageURL = 'http';
 if (isset($_SERVER["HTTPS"]) == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}


if (is_array ($_GET)) {
  foreach ($_GET as $gkey => $gvalue) {
    $_GET[$gkey] = preg_replace ("/\\\\([\"'])/", "$1", $gvalue);
  }
}

if (is_array ($_POST)) {
  foreach ($_POST as $pkey => $pvalue) {
    $_POST[$pkey] = preg_replace ("/\\\\([\"'])/", "$1", $pvalue);
  }
}

if (is_array ($_COOKIE)) {
  foreach ($_COOKIE as $ckey => $cvalue) {
    $_COOKIE[$ckey] = preg_replace ("/\\\\([\"'])/", "$1", $cvalue);
  }
}

if (is_array ($_REQUEST)) {
  foreach ($_REQUEST as $rkey => $rvalue) {
    $_REQUEST[$rkey] = preg_replace ("/\\\\([\"'])/", "$1", $rvalue);
  }
}


?>