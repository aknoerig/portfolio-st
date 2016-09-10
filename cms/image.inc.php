<?php

function thumb($src_file, $trgt_file){
        $file = "images/".$src_file;

        if ( is_file($file) AND file_exists($file) ):
                list($src_w, $src_h) = getimagesize($file);
                $trgt_w = 380;
                $trgt_h = $src_h / ($src_w / $trgt_w);/*253;*/
                if ( copy($file, $trgt_file) ):
                        $src_img = imageCreateFromJpeg($file);
                        $trgt_img = imageCreateTrueColor($trgt_w, $trgt_h);
                        imageCopyResampled($trgt_img, $src_img, 0, 0, 0, 0, $trgt_w, $trgt_h, $src_w ,$src_h);
                        imagejpeg($trgt_img, $trgt_file, 100);
                endif;
        endif;
}

function ltr_thumb($filename_ltr, $trgt_file_ltr, $x_dimension_ltr, $y_dimension_ltr, $width_ltr, $height_ltr){
        $file_ltr = "images/".$filename_ltr;

        if(is_file($file_ltr) AND file_exists($file_ltr)):
                $trgt_w_ltr = 528;
                $trgt_h_ltr = 747;
                if(copy($file_ltr, $trgt_file_ltr)):
                        $src_img_ltr = imageCreateFromJpeg($file_ltr);
                        $trgt_img_ltr = imageCreateTrueColor($trgt_w_ltr, $trgt_h_ltr);
                        imageCopyResampled($trgt_img_ltr, $src_img_ltr, 0, 0, $x_dimension_ltr, $y_dimension_ltr, $trgt_w_ltr, $trgt_h_ltr, $width_ltr ,$height_ltr);
                        imagejpeg($trgt_img_ltr, $trgt_file_ltr, 100);
                endif;
        endif;
}

function ltr_thumb_sml($filename_ltr_sml, $trgt_file_ltr_sml, $x_dimension_ltr_sml, $y_dimension_ltr_sml, $width_ltr_sml, $height_ltr_sml){
        $file_ltr_sml = "images/".$filename_ltr_sml;

        if(is_file($file_ltr_sml) AND file_exists($file_ltr_sml)):
                $trgt_w_ltr_sml = 160;
                $trgt_h_ltr_sml = 226;
                if(copy($file_ltr_sml, $trgt_file_ltr_sml)):
                        $src_img_ltr_sml = imageCreateFromJpeg($file_ltr_sml);
                        $trgt_img_ltr_sml = imageCreateTrueColor($trgt_w_ltr_sml, $trgt_h_ltr_sml);
                        imageCopyResampled($trgt_img_ltr_sml, $src_img_ltr_sml, 0, 0, $x_dimension_ltr_sml, $y_dimension_ltr_sml, $trgt_w_ltr_sml, $trgt_h_ltr_sml, $width_ltr_sml ,$height_ltr_sml);
			                  imagejpeg($trgt_img_ltr_sml, $trgt_file_ltr_sml, 100);
                endif;
        endif;
}

?>
