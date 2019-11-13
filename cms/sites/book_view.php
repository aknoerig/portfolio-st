<?php
error_reporting(E_ALL);


echo "<div id=\"info\">\n";

echo "<h2>Update project</h2>\n";

$sql_get_id = "SELECT ID, ID_cat, ID_2ndcat, ID_client, name, hair, makeup, styling, setdesign, thumb_size, thumb_spacing FROM project WHERE	ID = '".$_GET['id']."' ";

$result_get_id = mysqli_query($conn, $sql_get_id) OR die("<pre>".$sql_get_id."</pre>".mysqli_error($conn));
$row_get_id = mysqli_fetch_assoc($result_get_id);

$sql_get_cat1 = "SELECT ID, category FROM cat WHERE ID = '".$row_get_id['ID_cat']."' ";

$result_get_cat1 = mysqli_query($conn, $sql_get_cat1) OR die("<pre>".$sql_get_cat1."</pre>".mysqli_error($conn));
$row_get_cat1= mysqli_fetch_assoc($result_get_cat1);

$sql_get_cat2 = "SELECT ID, category FROM cat WHERE ID = '".$row_get_id['ID_2ndcat']."' ";

$result_get_cat2 = mysqli_query($conn, $sql_get_cat2) OR die("<pre>".$sql_get_cat2."</pre>".mysqli_error($conn));
$row_get_cat2= mysqli_fetch_assoc($result_get_cat2);

$sql_get_cl = "SELECT ID, name FROM clients WHERE ID = '".$row_get_id['ID_client']."' ";

$result_get_cl = mysqli_query($conn, $sql_get_cl) OR die("<pre>".$sql_get_cl."</pre>".mysqli_error($conn));
$row_get_cl= mysqli_fetch_assoc($result_get_cl);


if(isset($_POST['project']) AND $_POST['project'] == "Update") {

  $sql_data = "UPDATE

  project

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

  WHERE	ID = '".$_GET['id']."'

  ";

  mysqli_query($conn, $sql_data) OR die("<pre>".$sql_data."</pre>".mysqli_error($conn));

  echo "<p>\n"."<em class=\"em\">loading data&hellip;</em>\n"."</p>\n";
  echo "<meta http-equiv=\"refresh\" content=\"1; URL=".curPageURL()."\">\n";

  echo "<div style=\"width:450px\">\n";

  echo "<label style=\"width:140px; display:inline-block;\" for=\"Category\">Category</label>\n";
  echo "<select name=\"ID_cat\" id=\"ID_cat\" for=\"ID_cat\" style=\"width:185px; margin-top: 10px; display:inline-block;\">\n";
  echo "<option value=\"0\">	Select a category</option>\n";
  echo "<option value=\"0\">---------------------------</option>\n";

  $sql_open = "SELECT

  ID,
  category
  FROM
  cat

  ORDER BY category ASC

  ";

  $result_open = mysqli_query($conn, $sql_open);

  while($row_open = mysqli_fetch_assoc($result_open))

  {

    echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n";

  }

  echo "</select><br />";


  echo "<label style=\"width:140px; display:inline-block;\" for=\"2nd category\">2nd category</label>\n";
  echo "<select name=\"ID_2ndcat\" id=\"ID_2ndcat\" for=\"ID_2ndcat\" style=\"width:185px; margin-top: 10px; display:inline-block;\">\n";
  echo "<option value=\"0\">Select a additional category</option>\n";
  echo "<option value=\"0\">---------------------------</option>\n";

  $sql_open = "SELECT

  ID,
  category
  FROM
  cat

  ORDER BY category ASC

  ";

  $result_open = mysqli_query($conn, $sql_open);

  while($row_open = mysqli_fetch_assoc($result_open))

  {

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
  FROM
  clients

  ORDER BY name ASC

  ";

  $result_open = mysqli_query($conn, $sql_open);

  while($row_open = mysqli_fetch_assoc($result_open))

  {

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
  echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"setdesign\" name=\"setdesign\" type=\"text\" maxlength=\"255\" value=\"".htmlentities($row_get_id['setdesign'], ENT_QUOTES)."\" />\n";

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
  echo "<label style=\"width:140px; display:block; padding-top:10px;\">More views</label>\n";
  echo "<div style=\"width:450px; display: inline-block; margin-top:-19px;\">\n";
  for($i=1; $i<=12; $i++){
    echo "<label style=\"width:0px; display:block; float:left; padding-left:140px\" for=\"Foto[".$i."]\">".$i."</label>\n";
    echo "<input style=\"width:245px; display:block; float:left; margin-left:32px\" id=\"Foto[".$i."]\" name=\"Foto[".$i."]\" type=\"file\" />\n";
  }
  echo "</div>\n";
  echo "<p style=\"text-indent:140px;\">\n"."<em class=\"em\">Note: First image will be set as opener.</em>\n"."</p>\n";

  echo "</div><br />\n";


  echo "<input type=\"submit\" name=\"project\" class=\"button\" value=\"Update\" /><br /><br /><br />\n";
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
  echo "<option value=\"".htmlentities($row_get_cat1['ID'], ENT_QUOTES)."\">	".htmlentities($row_get_cat1['category'], ENT_QUOTES)."</option>\n";
  echo "<option value=\"0\">---------------------------</option>\n";

  $sql_open = "SELECT

  ID,
  category
  FROM
  cat

  ORDER BY category ASC

  ";

  $result_open = mysqli_query($conn, $sql_open);

  while($row_open = mysqli_fetch_assoc($result_open))

  {

    echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n";

  }

  echo "</select><br />";

  echo "<label style=\"width:140px; display:inline-block;\" for=\"2nd Category\">2nd category</label>\n";
  echo "<select name=\"ID_2ndcat\" id=\"ID_2ndcat\" for=\"ID_2ndcat\" style=\"width:185px; margin-top: 10px; display:inline-block;\">\n";
  echo "<option value=\"".htmlentities($row_get_cat2['ID'], ENT_QUOTES)."\">".htmlentities($row_get_cat2['category'], ENT_QUOTES)."</option>\n";
  echo "<option value=\"0\">---------------------------</option>\n";

  $sql_open = "SELECT

  ID,
  category
  FROM
  cat

  ORDER BY category ASC

  ";

  $result_open = mysqli_query($conn, $sql_open);

  while($row_open = mysqli_fetch_assoc($result_open))

  {

    echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['category'], ENT_QUOTES)."</option>\n";

  }

  echo "</select><br />";

  echo "<label style=\"width:140px; display:inline-block;\" for=\"name\">Client</label>\n";
  echo "<select name=\"ID_client\" id=\"ID_client\" style=\"width:185px; margin-top: 12px; display:inline-block;\">\n";
  echo "<option value=\"".htmlentities($row_get_cl['ID'], ENT_QUOTES)."\">".htmlentities($row_get_cl['name'], ENT_QUOTES)."</option>\n";
  echo "<option value=\"0\">---------------------------</option>\n";

  $sql_open = "SELECT

  ID,
  name
  FROM
  clients

  ORDER BY name ASC

  ";

  $result_open = mysqli_query($conn, $sql_open);

  while($row_open = mysqli_fetch_assoc($result_open))

  {

    echo "<option value=\"".htmlentities($row_open['ID'], ENT_QUOTES)."\">".htmlentities($row_open['name'], ENT_QUOTES)."</option>\n";

  }

  echo "</select><br />";

  echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"name\">Project</label>\n";
  echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"name\" name=\"name\" type=\"text\" maxlength=\"255\" value=\"".htmlentities($row_get_id['name'], ENT_QUOTES)."\" />\n";

  echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"hair\">Hair</label>\n";
  echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"hair\" name=\"hair\" type=\"text\" maxlength=\"255\" value=\"".htmlentities($row_get_id['hair'], ENT_QUOTES)."\" />\n";

  echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"makeup\">Make-up</label>\n";
  echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"makeup\" name=\"makeup\" type=\"text\" maxlength=\"255\" value=\"".htmlentities($row_get_id['makeup'], ENT_QUOTES)."\" />\n";

  echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"styling\">Styling</label>\n";
  echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"styling\" name=\"styling\" type=\"text\" maxlength=\"255\" value=\"".htmlentities($row_get_id['styling'], ENT_QUOTES)."\" />\n";

  echo "<label class=\"top-15\" style=\"width:140px; display:inline-block; \" for=\"setdesign\">Set design</label>\n";
  echo "<input class=\"top-15\" style=\"width:240px; display:inline-block;\" id=\"setdesign\" name=\"setdesign\" type=\"text\" maxlength=\"255\" value=\"".htmlentities($row_get_id['setdesign'], ENT_QUOTES)."\" />\n";

  echo "<label style=\"width:140px; display:inline-block;\" for=\"name\">Thumbnail size</label>\n";
  echo "<select name=\"thumb_size\" id=\"thumb_size\" style=\"width:185px; margin-top: 12px; display:inline-block;\">\n";
  echo "<option value=\"c\">Select a size</option>\n";
  echo "<option value=\"c\">---------------------------</option>\n";
  echo "<option value=\"a\"";
  echo $row_get_id['thumb_size'] == 'a' ? "selected" : "";
  echo ">tiny</option>\n";
  echo "<option value=\"b\"";
  echo $row_get_id['thumb_size'] == 'b' ? "selected" : "";
  echo ">small</option>\n";
  echo "<option value=\"c\"";
  echo $row_get_id['thumb_size'] == 'c' ? "selected" : "";
  echo ">medium</option>\n";
  echo "<option value=\"d\"";
  echo $row_get_id['thumb_size'] == 'd' ? "selected" : "";
  echo ">large</option>\n";
  echo "<option value=\"e\"";
  echo $row_get_id['thumb_size'] == 'e' ? "selected" : "";
  echo ">huge</option>\n";
  echo "</select><br />";

  echo "<label style=\"width:140px; display:inline-block;\" for=\"name\">Thumbnail spacing</label>\n";
  echo "<select name=\"thumb_spacing\" id=\"thumb_spacing\" style=\"width:185px; margin-top: 12px; display:inline-block;\">\n";
  echo "<option value=\"b\">Select a border size</option>\n";
  echo "<option value=\"b\">---------------------------</option>\n";
  echo "<option value=\"a\"";
  echo $row_get_id['thumb_spacing'] == 'a' ? "selected" : "";
  echo ">small</option>\n";
  echo "<option value=\"b\"";
  echo $row_get_id['thumb_spacing'] == 'b' ? "selected" : "";
  echo ">medium</option>\n";
  echo "<option value=\"c\"";
  echo $row_get_id['thumb_spacing'] == 'c' ? "selected" : "";
  echo ">large</option>\n";
  echo "</select><br />";

  echo "<br class=\"clear\" />\n";

  echo "<br />";
  echo "<label style=\"width:140px; display:block; padding-top:10px;\">More views</label>\n";
  echo "<div style=\"width:450px; display: inline-block; margin-top:-19px;\">\n";
  for($i=1; $i<=12; $i++){
    echo "<label style=\"width:0px; display:block; float:left; padding-left:140px\" for=\"Foto[".$i."]\">".$i."</label>\n";
    echo "<input style=\"width:245px; display:block; float:left; margin-left:32px\" id=\"Foto[".$i."]\" name=\"Foto[".$i."]\" type=\"file\" />\n";
  }
  echo "</div>\n";
  echo "<p style=\"text-indent:140px;\">\n"."<em class=\"em\">Note: First image will be set as opener.</em>\n"."</p>\n";

  echo "</div><br />\n";

  echo "<input type=\"submit\" name=\"project\" class=\"button\" value=\"Update\" /><br /><br /><br />\n";
  echo "</form></div>\n";
}





echo "<div id=\"bio\">\n";


$sql_items = "SELECT

ID,
ID_cat,
ID_client,
name,
hair,
makeup,
styling,
setdesign,
thumb_size,
thumb_spacing
FROM
project

WHERE	ID = '".$_GET['id']."'

ORDER BY ID DESC

";

$result_items = mysqli_query($conn, $sql_items) OR die("<pre>".$sql_items."</pre>".mysqli_error($conn));
$row_items = mysqli_fetch_assoc($result_items);

echo "<h2><a href=\"?s=books\" class=\"cookie_h\">Books</a><span class=\"cookie\">></span>".htmlentities($row_items['name'], ENT_QUOTES)."</h2>\n";
echo "<div id=\"trasher\"><img src=\"gui/trasher.png\" onClick=\"setTimeout('window.location=\'?s=drop_book&id=".$_GET['id']."\'',2500); return true;\"  /></div>\n";
echo "<div id=\"trasher-note\"><p>Drop the whole project</p></div>\n";
echo "<p>\n"."<em class=\"em trasher-onstate\">dropping project from books&hellip;</em>\n"."</p>\n";

$sql_client = "SELECT

ID,
name
FROM
clients

WHERE ID = '".$row_items['ID_client']."'

";

$result_client = mysqli_query($conn, $sql_client) OR die("<pre>".$sql_client."</pre>".mysqli_error($conn));
$row_client = mysqli_fetch_assoc($result_client);


$sql_img = "SELECT

ID,
ID_p,
content_img,
date
FROM
img

WHERE	id_p = '".$row_items['ID']."'

ORDER BY ID ASC

";

$result_img = mysqli_query($conn, $sql_img) OR die("<pre>".$sql_img."</pre>".mysqli_error($conn));

echo "<div id=\"project_details\">\n";

while($row_img = mysqli_fetch_assoc($result_img)) {


  echo "<img src=\"images/".htmlentities($row_img['content_img'], ENT_QUOTES)."\" /><p class=\"view\"><a href=\"?s=drop_img&id=".$row_img['ID']."&from_book=".$row_items['ID']."\">[ drop ]</a></p>\n";


}

echo "</div></div>\n";

?>
