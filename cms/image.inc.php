<?php

/* project (book) thumbnails */

function thumb($src_file, $trgt_file, $size) {
  if (is_file($src_file) AND file_exists($src_file)) {

    list($src_w, $src_h) = getImageSize($src_file);
    if ($src_w > $src_h) { // landscape
      $trgt_w = $size;
      $trgt_h = $src_h / ($src_w / $trgt_w);
    } else { // portrait
      $trgt_h = $size;
      $trgt_w = $src_w / ($src_h / $trgt_h);
    }

    if (copy($src_file, $trgt_file)) {
      $src_img = imageCreateFromJpeg($src_file);
      $trgt_img = imageCreateTrueColor($trgt_w, $trgt_h);
      imageCopyResampled($trgt_img, $src_img, 0, 0, 0, 0, $trgt_w, $trgt_h, $src_w ,$src_h);
      imageJpeg($trgt_img, $trgt_file, 100);
    }

  }
}

function project_thumbs($filename) {
  $src_folder = "images/";
  $dest_folder = "images/thumbs/";
  $pathparts = pathinfo($filename);
  $sizes = array(
    "a" => 240,
    "b" => 320,
    "c" => 400,
    "d" => 480,
    "e" => 560);
    // used as height for portrait, as width for landscape formats

  foreach ($sizes as $size_name => $size) {
    thumb($src_folder.$filename, $dest_folder.$pathparts['filename']."_".$size_name.".".$pathparts['extension'], $size);
  }
}


/* lightroom thumbnail */
function ltr_thumb($filename_ltr, $trgt_file_ltr, $x_dimension_ltr, $y_dimension_ltr, $width_ltr, $height_ltr){
  $file_ltr = "images/".$filename_ltr;

  if(is_file($file_ltr) AND file_exists($file_ltr)) {
    $trgt_w_ltr = 528;
    $trgt_h_ltr = 747;
    if(copy($file_ltr, $trgt_file_ltr)) {
      $src_img_ltr = imageCreateFromJpeg($file_ltr);
      $trgt_img_ltr = imageCreateTrueColor($trgt_w_ltr, $trgt_h_ltr);
      imageCopyResampled($trgt_img_ltr, $src_img_ltr, 0, 0, $x_dimension_ltr, $y_dimension_ltr, $trgt_w_ltr, $trgt_h_ltr, $width_ltr ,$height_ltr);
      imagejpeg($trgt_img_ltr, $trgt_file_ltr, 100);
    }
  }
}


/* lightroom small thumbnails */
function ltr_thumb_sml($filename_ltr_sml, $trgt_file_ltr_sml, $x_dimension_ltr_sml, $y_dimension_ltr_sml, $width_ltr_sml, $height_ltr_sml){
  $file_ltr_sml = "images/".$filename_ltr_sml;

  if(is_file($file_ltr_sml) AND file_exists($file_ltr_sml)) {
    $trgt_w_ltr_sml = 160;
    $trgt_h_ltr_sml = 226;
    if(copy($file_ltr_sml, $trgt_file_ltr_sml)) {
      $src_img_ltr_sml = imageCreateFromJpeg($file_ltr_sml);
      $trgt_img_ltr_sml = imageCreateTrueColor($trgt_w_ltr_sml, $trgt_h_ltr_sml);
      imageCopyResampled($trgt_img_ltr_sml, $src_img_ltr_sml, 0, 0, $x_dimension_ltr_sml, $y_dimension_ltr_sml, $trgt_w_ltr_sml, $trgt_h_ltr_sml, $width_ltr_sml ,$height_ltr_sml);
      imagejpeg($trgt_img_ltr_sml, $trgt_file_ltr_sml, 100);
    }
  }
}

?>
