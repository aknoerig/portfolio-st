<?php 
    
    error_reporting(E_ALL); 

    // Allgemeine Konstanten 
    // ========================================= 
    // Angaben zur Dateigröße 
    define('BYTE', 1); 
    define('KB', 1024*BYTE); 
    define('MB', 1024*KB); 


    // Allgemeine Variablen 
    // ========================================= 
    // Monatsnamen 
    $Monatsnamen = array(1 => 'Januar', 
                         2 => 'Februar', 
                         3 => 'März', 
                         4 => 'April', 
                         5 => 'Mai', 
                         6 => 'Juni', 
                         7 => 'Juli', 
                         8 => 'August', 
                         9 => 'September', 
                         10 => 'Oktober', 
                         11 => 'November', 
                         12 => 'Dezember'); 

    // Konstanten und Variablen für die Fotos 
    // ========================================= 
    // Dateigröße 
    define('FILE_SIZE', 50*MB); 

    // Bildgröße bzw. Ausmaß in Pixeln 
    define('PIC_WIDTH', 4096); 
    define('PIC_HEIGHT', 4096); 

    // Thumbnailhöhe in Pixeln 
    define('TN_WIDTH', 600); 

    // Qualität 
    define('PIC_QUALI', 80); 
    define('TN_QUALI', 100); 

    // Foto-Ordner 
    define('PIC_FOLDER', 'images/'); 
    define('TN_FOLDER', PIC_FOLDER.'thumbnails/'); 

    // Doc-Ordner 
    define('DOC_FOLDER', 'docs/'); 

    // erlaubte Dateiendungen für Bilder 
    $_file_extensions = array('jpg', 'jpeg', 'jpe', 'gif', 'png'); 

    // erlaubte Dateiendungen für Audio 
    $_file_extensions_doc = array('pdf'); 

    // erlaubte MIME-Typen für Bilder 
    $_file_mime_types = array('image/pjpeg', 'image/jpeg', 'image/gif', 'image/png', 'image/x-png'); 

    // erlaubte MIME-Typen für Audio 
    $_file_mime_types_doc = array('application/pdf'); 

?>