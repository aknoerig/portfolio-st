<?php

/* returns thumnail for a given project/book */
function getThumb($project_id) {
  $sql_preview_img = "SELECT
    ID,
    content_img
    FROM img
    WHERE	id_p = '".$project_id."'
    ORDER BY ID ASC
    LIMIT 1
  ";
  $result_preview_img = mysql_query($sql_preview_img) OR die("<pre>".$sql_preview_img."</pre>".mysql_error());
  $preview_img = mysql_fetch_assoc($result_preview_img);
  $pathparts = pathinfo($preview_img['content_img']);

  $sql_size = "SELECT
    thumb_size
    FROM project
    WHERE ID = '".$project_id."'
  ";
  $result_size = mysql_query($sql_size) OR die("<pre>".$sql_size."</pre>".mysql_error());
  $size = mysql_fetch_assoc($result_size)['thumb_size'];

  return "/cms/images/thumbs/".$pathparts['filename']."_".$size.".".$pathparts['extension'];
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
