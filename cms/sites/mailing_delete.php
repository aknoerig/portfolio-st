<?php
    error_reporting(E_ALL);


			$loeschen = "

			DELETE FROM maillist WHERE ID ='".$_GET['id']."'

								";

			$delete = mysql_query($loeschen) or die(mysql_error());
			$row_delete = @mysql_fetch_assoc($delete);


			echo "<meta http-equiv=\"refresh\" content=\"1; URL=?s=mailing\">\n";


    echo "<div id=\"info\">\n";

			echo "<h2>Letter</h2>\n";


			echo "<form ".
                 "action=\"".curPageURL()."\" ".
				 "method=\"post\" ".
				 "enctype=\"multipart/form-data\">\n";
			echo "<div>\n";

            echo "<label style=\"width:130px; display:block; float:left; margin-top:5px;\" for=\"subject\">Subject</label>\n";
			echo "<input style=\"float:left; width:260px; margin-top:5px; margin-right: 25px;\" type=\"text\" name=\"subject\" id=\"subject\" maxlenght=\"255\"><br /><br />\n";

            echo "<label style=\"width:130px; display:block; float:left; margin-top:5px;\" for=\"caption\">Caption</label>\n";
			echo "<input style=\"float:left; width:260px; margin-top:5px; margin-right: 25px;\" type=\"text\" name=\"caption\" id=\"caption\" maxlenght=\"255\"><br /><br />\n";

            echo "<label style=\"width:130px; display:block; float:left;\" for=\"text\">Message</label>\n";
                echo "<textarea class=\"top-5\" style=\"width:255px; height:85px; display:inline-block;\" id=\"text\" name=\"text\" type=\"text\" maxlength=\"255\" /></textarea>\n";

                echo "<br class=\"clear\" /><br />\n";


                echo "<label style=\"width:0px; display:block; float:left; padding-right:100px\" for=\"Foto[1]\">Image</label>\n";
                echo "<input style=\"width:260px; display:block; float:left; margin-left:32px\" id=\"Foto[1]\" name=\"Foto[1]\" type=\"file\" /><br /><br />\n";

            echo "<input type=\"submit\" name=\"prev_letter\" class=\"button\" value=\"Preview\" style=\"display: inline-block; margin: 25px 0 45px 133px;\" />\n";
            echo "<label style=\"display: inline-block; margin: 0 15px; font-size: 15px;\">&rarr;</label>\n";
 			echo "<input type=\"submit\" name=\"send_letter\" class=\"button\" value=\"Bon voyage\" style=\"display: inline-block;\" />\n";

    echo "</div></form>\n";

if(isset($_POST['prev_letter']) AND $_POST['prev_letter'] == "Preview") {

         		for($i=1; $i<=1; $i++){

                $myFILE['name'] = $_FILES['Foto']['name'][$i];
                $myFILE['type'] = $_FILES['Foto']['type'][$i];
                $myFILE['tmp_name'] = $_FILES['Foto']['tmp_name'][$i];

                    do {
                        $Name = renameFile($myFILE['name']);

                    } while(file_exists(PIC_FOLDER."PIC_".$Name));

                    if (move_uploaded_file($myFILE['tmp_name'], PIC_FOLDER."PIC_".$Name)) {


                    $sql_data = "INSERT INTO

							letter
					set
							subject = '".mysql_real_escape_string(trim($_POST['subject']))."',
							caption = '".mysql_real_escape_string(trim($_POST['caption']))."',
							text = '".mysql_real_escape_string(trim($_POST['text']))."',
							img = '".mysql_real_escape_string(trim("PIC_".$Name))."'

					";		mysql_query($sql_data) OR die("<pre>".$sql_data."</pre>".mysql_error());


					}

            }

 			$sql_letter = "SELECT ID, subject, caption, text, img FROM letter ORDER BY ID DESC";
    		$result_letter = mysql_query($sql_letter) OR die("<pre>".$sql_letter."</pre>".mysql_error());
			$row_letter = mysql_fetch_assoc($result_letter);

        	echo "<div style=\"width:425px; height:2px; border-top:1px dashed #ccc;\"></div><br />\n";


 			$msg = '

<div style="text-align: center; margin-left: -85px;">
<h1 style="font-family: Arial; font-size: 19px; line-height: 1.1em; letter-spacing: 3px; color: #000; margin: 25px auto 10px; padding: 0 0 8px 0; border-bottom: 3px solid #000; display: inline-block;">'.htmlentities($row_letter['caption'], ENT_QUOTES).'</h1><p style="font-family: Times; font-size: 15px; line-height: 1.3em; letter-spacing: 2px;">'.htmlentities($row_letter['text'], ENT_QUOTES).'</p><a href="http://www.sabrinatheissen.com" style="display: inline-block; width: auto; margin:0; padding:0; outline: none; border: none; text-decoration: none;"><img src="http://www.sabrinatheissen.de/cms/images/'.htmlentities($row_letter['img'], ENT_QUOTES).'" /></a><br /><br /><br /><img src="http://www.sabrinatheissen.de/img/idSign.jpg" style="width:45px;" /><br /><br /><br /><p style="font-family: Arial; font-size: 12px;letter-spacing: 1px; line-height: 1.4em; color: #999; margin-bottom: 45px;">You no longer want to receive tidings from Sabrina?<br />Unsubscribe <a href="http://www.sabrinatheissen.com/#unsubscribe" style="color: #999; text-decoration: none; border-bottom: 1px solid #999;">here</a><br /><br />*Your email address will never be shared with any 3rd parties.</p></div>

';
			echo $msg;

 }
echo "</div>\n";


        	echo "<div id=\"bio\">\n";


       	echo "<h2>Mailing list</h2>\n";

			if(isset($_POST['mailing']) AND $_POST['mailing'] == "Save") {


            $sql_colour = "INSERT INTO

                                maillist
                        set
                        		mail = '".mysql_real_escape_string(trim($_POST['mail']))."'

                       	";

                       mysql_query($sql_colour) OR die("<pre>".$sql_colour."</pre>".mysql_error());

			}

        	echo "<form ".
                 " action=\"".curPageURL()."\" ".
                 " method=\"post\" ".
                 " accept-charset=\"iso-8859-1\">\n";


			echo "<label style=\"width:140px; display:block; float:left; margin-top:5px;\" for=\"name\">Mail address</label>\n";
			echo "<input style=\"float:left; width:290px; margin-top:5px; margin-right: 25px;\" type=\"text\" name=\"mail\" id=\"mail\" maxlenght=\"255\"><br /><br /><br />\n";

            echo "<input type=\"submit\" name=\"mailing\" class=\"button top-0\" value=\"Save\" /><br />\n";
            echo "</form>\n";
			echo "\n";

        	echo "<div style=\"width:452px; height:2px; border-top:1px dashed #ccc;\"></div><br />\n";

        	echo "<div style=\"margin-bottom:45px; display: inline-block;\">\n";

        	$sql_open = "SELECT

                            ID,
							mail
                    FROM
                            maillist

					ORDER BY mail ASC

							";

			$result_open = mysql_query($sql_open);

			while($row_open = mysql_fetch_assoc($result_open))

				{

 			echo "<p class=\"left-shipping normal floater top-0\">".htmlentities($row_open['mail'], ENT_QUOTES)."</p>\n";
 			echo "<input type=\"button\" name=\"delete\" class=\"button_x floater\" value=\"x\" onClick=\"self.location.href='?s=mailing_delete&id=".$row_open['ID']."'\"><br />";

				}

 			echo "</div>\n";


    echo "</div>\n";
?>
