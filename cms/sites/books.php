<?php
error_reporting(E_ALL);

echo "<div id=\"info\">\n";

echo "<h2>New project</h2>\n";

if(isset($_POST['project']) AND $_POST['project'] == "Upload") {

  $sql_data = "INSERT INTO project

    SET
    ID_cat = '".mysqli_real_escape_string(trim($_POST['ID_cat']))."',
    ID_2ndcat = '".mysqli_real_escape_string(trim($_POST['ID_2ndcat']))."',
    ID_client = '".mysqli_real_escape_string(trim($_POST['ID_client']))."',
    name = '".mysqli_real_escape_string(trim($_POST['name']))."',
    hair = '".mysqli_real_escape_string(trim($_POST['hair']))."',
    makeup = '".mysqli_real_escape_string(trim($_POST['makeup']))."',
    styling = '".mysqli_real_escape_string(trim($_POST['styling']))."',
    setdesign = '".mysqli_real_escape_string(trim($_POST['setdesign']))."',
    thumb_size = '".mysqli_real_escape_string(trim($_POST['thumb_size']))."',
    thumb_spacing = '".mysqli_real_escape_string(trim($_POST['thumb_spacing']))."'

  ";
  mysqli_query($conn, $sql_data) OR die("<pre>".$sql_data."</pre>".mysqli_error($conn));


  $sql_get_id = "SELECT ID FROM project ORDER BY ID DESC";

  $result_get_id = mysqli_query($conn, $sql_get_id) OR die("<pre>".$sql_get_id."</pre>".mysqli_error($conn));
  $row_get_id = mysqli_fetch_assoc($result_get_id);

  echo "<p>\n"."<em class=\"em\">loading data&hellip;</em>\n"."</p>\n";
  echo "<meta http-equiv=\"refresh\" content=\"1; URL=".curPageURL()."\">\n";


  echo "<div style=\"width:450px\">\n";

  echo "<label style=\"width:140px; display:inline-block;\" for=\"Category\">Category</label>\n";
  echo "<select name=\"ID_cat\" id=\"ID_cat\" for=\"ID_cat\" style=\"width:185px; margin-top: 10px; display:inline-block;\">\n";
    echo "<option value=\"0\">Select a category</option>\n";
    echo "<option value=\"0\">---------------------------</option>\n";

    $sql_open = "SELECT

      ID,
      category

      FROM cat

      ORDER BY category ASC

    ";

    $result_open = mysqli_query($conn, $sql_open);

    while($row_open = mysqli_fetch_assoc($result_open)) {
      echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n";
    }

  echo "</select><br />";


  echo "<label style=\"width:140px; display:inline-block;\" for=\"2nd Category\">2nd Category</label>\n";
  echo "<select name=\"ID_2ndcat\" id=\"ID_2ndcat\" for=\"ID_2ndcat\" style=\"width:185px; margin-top: 10px; display:inline-block;\">\n";
    echo "<option value=\"0\">Select a additional category</option>\n";
    echo "<option value=\"0\">---------------------------</option>\n";

    $sql_open = "SELECT

      ID,
      category

      FROM cat

      ORDER BY category ASC

    ";

    $result_open = mysqli_query($conn, $sql_open);

    while($row_open = mysqli_fetch_assoc($result_open)) {
      echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n";
    }

  echo "</select><br />";


  echo "<label style=\"width:140px; display:inline-block;\" for=\"name\">Client</label>\n";
  echo "<select name=\"ID_client\" id=\"ID_client\" style=\"width:185px; margin-top: 12px; display:inline-block;\">\n";
    echo "<option value=\"0\">Select a client</option>\n";
    echo "<option value=\"0\">---------------------------</option>\n";

    $sql_open = "SELECT
      ID,
      name

      FROM clients

      ORDER BY name ASC
    ";

    $result_open = mysqli_query($conn, $sql_open);

    while($row_open = mysqli_fetch_assoc($result_open)) {
      echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['name'], ENT_QUOTES)."</option>\n";
    }

  echo "</select><br />";

  echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"name\">Project</label>\n";
  echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"name\" name=\"name\" type=\"text\" maxlength=\"255\" />\n";

  echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"hair\">Hair</label>\n";
  echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"hair\" name=\"hair\" type=\"text\" maxlength=\"255\" />\n";

  echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"makeup\">Make-up</label>\n";
  echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"makeup\" name=\"makeup\" type=\"text\" maxlength=\"255\" />\n";

  echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"styling\">Styling</label>\n";
  echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"styling\" name=\"styling\" type=\"text\" maxlength=\"255\" />\n";

  echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"setdesign\">Set design</label>\n";
  echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"setdesign\" name=\"setdesign\" type=\"text\" maxlength=\"255\" />\n";

  echo "<label style=\"width:140px; display:inline-block;\" for=\"name\">Thumbnail size</label>\n";
  echo "<select name=\"thumb_size\" id=\"thumb_size\" style=\"width:185px; margin-top: 12px; display:inline-block;\">\n";
    echo "<option value=\"c\">Select a size</option>\n";
    echo "<option value=\"c\">---------------------------</option>\n";
    echo "<option value=\"a\">tiny</option>\n";
    echo "<option value=\"b\">small</option>\n";
    echo "<option value=\"c\">medium</option>\n";
    echo "<option value=\"d\">large</option>\n";
    echo "<option value=\"e\">huge</option>\n";
  echo "</select><br />";

  echo "<label style=\"width:140px; display:inline-block;\" for=\"name\">Thumbnail spacing</label>\n";
  echo "<select name=\"thumb_soacing\" id=\"thumb_spacing\" style=\"width:185px; margin-top: 12px; display:inline-block;\">\n";
    echo "<option value=\"b\">Select a border size</option>\n";
    echo "<option value=\"b\">---------------------------</option>\n";
    echo "<option value=\"a\">small</option>\n";
    echo "<option value=\"b\">medium</option>\n";
    echo "<option value=\"c\">large</option>\n";
  echo "</select><br />";

  echo "<br class=\"clear\" />\n";

  echo "<br />";
  echo "<label style=\"width:140px; display:block; padding-top:10px;\">Item views</label>\n";
  echo "<div style=\"width:450px; display: inline-block; margin-top:-19px;\">\n";
  for($i=1; $i<=12; $i++){
    echo "<label style=\"width:0px; display:block; float:left; padding-left:140px\" for=\"Foto[".$i."]\">".$i."</label>\n";
    echo "<input style=\"width:245px; display:block; float:left; margin-left:32px\" id=\"Foto[".$i."]\" name=\"Foto[".$i."]\" type=\"file\" />\n";
  }
  echo "</div>\n";
  echo "<p style=\"text-indent:140px;\">\n"."<em class=\"em\">Note: First image will be set as opener.</em>\n"."</p>\n";

  echo "</div><br />\n";


  echo "<input type=\"submit\" name=\"project\" class=\"button\" value=\"Upload\" /><br /><br /><br />\n";
  echo "</div>\n";



  for($i=1; $i<=12; $i++){

    $myFILE['name'] = $_FILES['Foto']['name'][$i];
    $myFILE['type'] = $_FILES['Foto']['type'][$i];
    $myFILE['tmp_name'] = $_FILES['Foto']['tmp_name'][$i];

    do {
      $Name = renameFile($myFILE['name']);
    } while (file_exists(PIC_FOLDER."Sabrina_Theissen_".$Name));

    if (move_uploaded_file($myFILE['tmp_name'], PIC_FOLDER."Sabrina_Theissen_".$Name)) {

      $content_img = mysqli_real_escape_string(trim("Sabrina_Theissen_".$Name));

      $sql_img = "INSERT INTO
        img

        SET
        id_p = '".$row_get_id['ID']."',
        content_img = '".$content_img."',
        date = NOW()
      ";

      mysqli_query($conn, $sql_img) OR die("<pre>".$sql_img."</pre>".mysqli_error($conn));

      if ($i == 1) {
        project_thumbs($content_img);
      }

    }

  }

}

/*             View               */

else {

  echo "<form ".
  "action=\"".curPageURL()."\" ".
  "method=\"post\" ".
  "enctype=\"multipart/form-data\" ".
  "accept-charset=\"ISO-8859-1\">";
  echo "<div style=\"width:450px\">\n";

  echo "<label style=\"width:140px; display:inline-block;\" for=\"name\">Category</label>\n";
  echo "<select name=\"ID_cat\" id=\"ID_cat\" style=\"width:185px; margin-top: 10px; display:inline-block;\">\n";
  echo "<option value=\"0\">Select a category</option>\n";
  echo "<option value=\"0\">---------------------------</option>\n";

  $sql_open = "SELECT

    ID,
    category
    FROM
    cat

    ORDER BY category ASC

  ";

  $result_open = mysqli_query($conn, $sql_open);

  while($row_open = mysqli_fetch_assoc($result_open)) {
    echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n";
  }

  echo "</select><br />";

  echo "<label style=\"width:140px; display:inline-block;\" for=\"2nd Category\">2nd Category</label>\n";
  echo "<select name=\"ID_2ndcat\" id=\"ID_2ndcat\" for=\"ID_2ndcat\" style=\"width:185px; margin-top: 10px; display:inline-block;\">\n";
  echo "<option value=\"0\">Select a additional category</option>\n";
  echo "<option value=\"0\">---------------------------</option>\n";

  $sql_open = "SELECT
    ID,
    category

    FROM cat
    ORDER BY category ASC
  ";

  $result_open = mysqli_query($conn, $sql_open);

  while($row_open = mysqli_fetch_assoc($result_open)) {
    echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n";
  }

  echo "</select><br />";

  echo "<label style=\"width:140px; display:inline-block;\" for=\"name\">Client</label>\n";
  echo "<select name=\"ID_client\" id=\"ID_client\" style=\"width:185px; margin-top: 12px; display:inline-block;\">\n";
  echo "<option value=\"0\">Select a client</option>\n";
  echo "<option value=\"0\">---------------------------</option>\n";

  $sql_open = "SELECT
    ID,
    name
    FROM clients

    ORDER BY name ASC

  ";

  $result_open = mysqli_query($conn, $sql_open);

  while($row_open = mysqli_fetch_assoc($result_open)) {
    echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['name'], ENT_QUOTES)."</option>\n";
  }

  echo "</select><br />";

  echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"name\">Project</label>\n";
  echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"name\" name=\"name\" type=\"text\" maxlength=\"255\" />\n";

  echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"hair\">Hair</label>\n";
  echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"hair\" name=\"hair\" type=\"text\" maxlength=\"255\" />\n";

  echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"makeup\">Make-up</label>\n";
  echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"makeup\" name=\"makeup\" type=\"text\" maxlength=\"255\" />\n";

  echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"styling\">Styling</label>\n";
  echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"styling\" name=\"styling\" type=\"text\" maxlength=\"255\" />\n";

  echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"setdesign\">Set design</label>\n";
  echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"setdesign\" name=\"setdesign\" type=\"text\" maxlength=\"255\" />\n";

  echo "<label style=\"width:140px; display:inline-block;\" for=\"name\">Thumbnail size</label>\n";
  echo "<select name=\"thumb_size\" id=\"thumb_size\" style=\"width:185px; margin-top: 12px; display:inline-block;\">\n";
    echo "<option value=\"c\">Select a size</option>\n";
    echo "<option value=\"c\">---------------------------</option>\n";
    echo "<option value=\"a\">tiny</option>\n";
    echo "<option value=\"b\">small</option>\n";
    echo "<option value=\"c\">medium</option>\n";
    echo "<option value=\"d\">large</option>\n";
    echo "<option value=\"e\">huge</option>\n";
  echo "</select><br />";

  echo "<label style=\"width:140px; display:inline-block;\" for=\"name\">Thumbnail spacing</label>\n";
  echo "<select name=\"thumb_spacing\" id=\"thumb_spacing\" style=\"width:185px; margin-top: 12px; display:inline-block;\">\n";
    echo "<option value=\"b\">Select a border size</option>\n";
    echo "<option value=\"b\">---------------------------</option>\n";
    echo "<option value=\"a\">small</option>\n";
    echo "<option value=\"b\">medium</option>\n";
    echo "<option value=\"c\">large</option>\n";
  echo "</select><br />";

  echo "<br class=\"clear\" />\n";

  echo "<br />";
  echo "<label style=\"width:140px; display:block; padding-top:10px;\">Item views</label>\n";
  echo "<div style=\"width:450px; display: inline-block; margin-top:-19px;\">\n";
  for($i=1; $i<=12; $i++){
    echo "<label style=\"width:0px; display:block; float:left; padding-left:140px\" for=\"Foto[".$i."]\">".$i."</label>\n";
    echo "<input style=\"width:245px; display:block; float:left; margin-left:32px\" id=\"Foto[".$i."]\" name=\"Foto[".$i."]\" type=\"file\" />\n";
  }
  echo "</div>\n";
  echo "<p style=\"text-indent:140px;\">\n"."<em class=\"em\">Note: First image will be set as opener.</em>\n"."</p>\n";

  echo "</div><br />\n";

  echo "<input type=\"submit\" name=\"project\" class=\"button\" value=\"Upload\" /><br /><br /><br />\n";
  echo "</form>";


  echo"<form action=\"generate-thumbnails.php\" method=\"post\" name=\"thumbnails\">\n";
  echo"  <input type=\"submit\" name=\"thumbnails\" value=\"Regenerate all thumbnails\" />\n";
  echo"</form>\n";

  echo "</div>\n";
}





echo "<div id=\"bio\">\n";
echo "<h2>Books</h2>\n";

echo "<div id=\"listing\">\n";


$sql_items = "SELECT

  ID,
  recordListingID,
  ID_cat,
  ID_client,
  name,
  hair,
  makeup,
  styling,
  setdesign,
  thumb_size,
  thumb_spacing

  FROM project

  ORDER BY recordListingID DESC

";

$result_items = mysqli_query($conn, $sql_items) OR die("<pre>".$sql_items."</pre>".mysqli_error($conn));

while($row_items = mysqli_fetch_assoc($result_items)) {

  $sql_img = "SELECT
    ID,
    ID_p,
    content_img,
    date

    FROM img

    WHERE	id_p = '".$row_items['ID']."'

    ORDER BY ID ASC
  ";

  $result_img = mysqli_query($conn, $sql_img) OR die("<pre>".$sql_img."</pre>".mysqli_error($conn));
  $row_img = mysqli_fetch_assoc($result_img);

  $sql_client = "SELECT
    ID,
    name

    FROM clients

    WHERE ID = '".$row_items['ID_client']."'
  ";

  $result_client = mysqli_query($conn, $sql_client) OR die("<pre>".$sql_client."</pre>".mysqli_error($conn));
  $row_client = mysqli_fetch_assoc($result_client);


  echo "<div id=\"recordsArray_" . $row_items['ID'] . "\" class=\"item\"><img src=\"images/".htmlentities($row_img['content_img'], ENT_QUOTES)."\" /><h2>".htmlentities($row_items['name'], ENT_QUOTES)."</h2><p class=\"view\"><a href=\"?s=book_view&id=".$row_items['ID']."\">[ view ]</a></p></div>\n";

}

echo"<form action=\"process-sortable.php\" method=\"post\" name=\"sortables\">\n";
echo"<input type=\"hidden\" name=\"item-log\" id=\"item-log\" />\n";
echo"</form>\n";

echo "</div><br class=\"clear\" /><br /><br />\n";

echo "</div>\n";

?>
