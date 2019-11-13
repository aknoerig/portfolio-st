<?php
	session_start();

	ini_set('display_errors',true);

	error_reporting(E_ALL);

  include("config.php");
  include("mysql.php");
  include("functions.php");
  include("image.inc.php");



  $sql_items = "SELECT
    ID
    FROM project
  ";

  $result_items = mysqli_query($conn, $sql_items) OR die("<pre>".$sql_items."</pre>".mysqli_error($conn));

  while ($row_items = mysqli_fetch_assoc($result_items)) {

    $sql_img = "SELECT
      ID,
      ID_p,
      content_img

      FROM img
      WHERE	id_p = '".$row_items['ID']."'
      ORDER BY ID ASC
    ";

    $result_img = mysqli_query($conn, $sql_img) OR die("<pre>".$sql_img."</pre>".mysqli_error($conn));
    $row_img = mysqli_fetch_assoc($result_img);

    project_thumbs(''.htmlentities($row_img['content_img'], ENT_QUOTES).'');

  }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><html>
<head>
  <title>Sabrina Theissen &ndash; CMS</title>
</head>

<body>
  <p>Regenerated book thumbnails</p>
</body>
</html>
