<?php

$sql_count = "SELECT
COUNT(*)
FROM
tears
";
$num_items = mysql_result(mysql_query($sql_count), 0);
$tearDisplayId = 0;

if ($detect->isMobile() && !$detect->isTablet()) { 	?>

  <div id="content">

    <a href="/books/">
      <!--	<div id="sign"<?php echo "$_set_hider"; ?>></div> -->
      <div id="mark-books"<?php echo "$_set_hider"; ?>><img src="/img/sabrina_theissen.svg" /></div>
    </a>

    <?php

    if(isset($_GET['cat'])  AND $_GET['cat'] != "0")	{


      $sql_items = "SELECT

      ID,
      date,
      caption,
      text,
      vid,
      pager,
      recordListingID

      FROM

      tears

      WHERE 	ID = '".$_GET['cat']."'

      ORDER BY recordListingID ASC

      ";

    }	else {


      $sql_items = "SELECT

      ID,
      date,
      caption,
      text,
      vid,
      pager,
      recordListingID

      FROM

      tears

      ORDER BY recordListingID ASC

      LIMIT

      ".($_GET['book']-1).",8

      ";

    }

    ?>

    <div id="overview"<?php echo "$_set_overview"; ?>>

      <?php

      if(isset($_GET['book']) AND $_GET['book'] > 1) {
        echo "<br /><br /><br /><br /><br /><div id=\"loadCuts\"><a href=\"/cuts/0/".($_GET['book']-8)."\">newer posts</a><br /><br /></div>";
      } else {
        ""; }

        echo "<div id=\"list-items\">";


        $result_items = mysql_query($sql_items) OR die("<pre>".$sql_items."</pre>".mysql_error());
        while($row_items = mysql_fetch_assoc($result_items)) {

          $tearDisplayId = $num_items - $row_items['recordListingID'] + 1;

          $postTxt = "".$row_items['text']."";
          $postTxt = preg_replace("/<a[^>]+\>/i", "", $postTxt);



          if( htmlentities($row_items['vid'], ENT_QUOTES) == "yes") {

            $sql_img = "SELECT

            ID,
            ID_t,
            content_img,
            date
            FROM
            img

            WHERE	id_t = '".$row_items['ID']."'

            ORDER BY ID ASC

            ";

            $result_img = mysql_query($sql_img) OR die("<pre>".$sql_img."</pre>".mysql_error());
            $row_img = mysql_fetch_assoc($result_img);

            $sizing = GetImageSize("http://www.sabrinatheissen.com/cms/images/".htmlentities($row_img['content_img'], ENT_QUOTES)."");

            echo "<div id=\"tear\" class=\"item margin\" style=\"width:"; if($sizing[0] > 320) { echo "".($sizing[0]/3.5).""; } else { echo "".$sizing[0].""; } echo "px;\">\n";

            echo "<video width=\""; if($sizing[0] > 320) { echo "".($sizing[0]/3.5).""; } else { echo "".$sizing[0].""; } echo "\" height=\""; if($sizing[0] > 320) { echo "".($sizing[1]/3.5).""; } else { echo "".$sizing[1].""; } echo "\" poster=\"/cms/images/".htmlentities($row_img['content_img'], ENT_QUOTES)."\" controls=\"controls\" preload=\"none\">\n";


            if ($detect->isMobile() && !$detect->isTablet()) {


              $sql_img_array = "SELECT

              ID,
              ID_t,
              content_img,
              date
              FROM
              img

              WHERE	id_t = '".$row_items['ID']."'

              LIMIT 4,1

              ";

            } else {

              $sql_img_array = "SELECT

              ID,
              ID_t,
              content_img,
              date
              FROM
              img

              WHERE	id_t = '".$row_items['ID']."'

              ORDER BY ID ASC

              LIMIT 0,4

              ";

            }

            $result_img_array = mysql_query($sql_img_array) OR die("<pre>".$sql_img_array."</pre>".mysql_error());
            while($row_img_array = mysql_fetch_assoc($result_img_array)) {




              if(substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", 20) == "mp4") {
                $setCodec ="codecs=avc1.42E01E, mp4a.40.2";
              }   elseif(substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", 20) == "ogv") {
                $setCodec ="codecs=theora, vorbis";
              }	elseif(substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", 20) == "webm") {
                $setCodec ="codecs=vp8, vorbis";
              }

              if(substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", 20) == "ogv") {
                $setType = "ogg"; }  else {  $setType = "".substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", 20)."";
                }


                if(substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", -3) != "png") {

                  echo "<source type=\"video/".$setType."; ".$setCodec."\" src=\"/cms/images/".htmlentities($row_img_array['content_img'], ENT_QUOTES)."\" width=\""; if($sizing[0] > 320) { echo "".($sizing[0]/3.5).""; } else { echo "".$sizing[0].""; } echo "\" height=\""; if($sizing[0] > 320) { echo "".($sizing[1]/3.5).""; } else { echo "".$sizing[1].""; } echo "\" />\n";

                }
              }




              echo "</video>\n";
              echo "<a href=\"/cuts/".htmlentities($row_items['ID'], ENT_QUOTES)."/\"><h2>".htmlentities($row_items['caption'], ENT_QUOTES)."</h2></a><p>".$row_items['text']."</p><h3>N&deg;".$tearDisplayId."</h3>\n";

              echo "</div><br /><br />\n";

            }	else	{



              $sql_img = "SELECT

              ID,
              ID_t,
              content_img,
              date
              FROM
              img

              WHERE	id_t = '".$row_items['ID']."'

              ORDER BY ID ASC

              ";

              $result_img = mysql_query($sql_img) OR die("<pre>".$sql_img."</pre>".mysql_error());
              $row_img = mysql_fetch_assoc($result_img);

              $sizing = GetImageSize("http://www.sabrinatheissen.com/cms/images/".htmlentities($row_img['content_img'], ENT_QUOTES)."");

              if(($sizing[0] > 299) AND ($sizing[0] <= 350)) { $quotient = "1.25"; };
              if(($sizing[0] > 360) AND ($sizing[0] <= 460)) { $quotient = "1.8"; };
              if(($sizing[0] > 460) AND ($sizing[0] <= 600)) { $quotient = "2.3"; };
              if(($sizing[0] > 600) AND ($sizing[0] <= 700)) { $quotient = "2.8"; };
              if($sizing[0] > 700) { $quotient = "3.3"; };

              echo "<div id=\"tear\" class=\"item margin\" style=\"width:"; if($sizing[0] > 299) { echo "".($sizing[0]/$quotient).""; } else { echo "".$sizing[0].""; } echo "px;\">\n";


              echo "<div id=\"imgContainer\" class=\"scrollContainer_".htmlentities($row_items['ID'], ENT_QUOTES)."\" style=\"width:"; if($sizing[0] > 299) { echo "".($sizing[0]/$quotient).""; } else { echo "".$sizing[0].""; } echo "px; height:"; if($sizing[0] > 299) { echo "".($sizing[1]/$quotient).""; } else { echo "".$sizing[1].""; } echo "px;\">\n";



              echo "<div id=\"carousel\" style=\"width:"; if($sizing[0] > 299) { echo "".($sizing[0]/$quotient).""; } else { echo "".$sizing[0].""; } echo "px;\">\n";


              $sql_img_single = "SELECT

              ID,
              ID_t,
              content_img,
              date
              FROM
              img

              WHERE	id_t = '".$row_items['ID']."'

              ORDER BY ID DESC

              ";

              $result_img_single = mysql_query($sql_img_single) OR die("<pre>".$sql_img_single."</pre>".mysql_error());
              $row_img_single = mysql_fetch_assoc($result_img_single);

              $sql_img_count = "SELECT

              ID,
              ID_t,
              COUNT(content_img)
              FROM
              img

              WHERE	id_t = '".$row_items['ID']."' AND ID != '".$row_img_single['ID']."'


              ";

              $result_img_count = mysql_query($sql_img_count) OR die("<pre>".$sql_img_count."</pre>".mysql_error());
              $row_img_count = mysql_fetch_assoc($result_img_count);

              $sql_img_array = "SELECT

              ID,
              ID_t,
              content_img,
              date
              FROM
              img

              WHERE	id_t = '".$row_items['ID']."' AND ID != '".$row_img_single['ID']."'

              ORDER BY ID ASC

              ";

              $result_img_array = mysql_query($sql_img_array) OR die("<pre>".$sql_img_array."</pre>".mysql_error());
              while($row_img_array = mysql_fetch_assoc($result_img_array)) {

                /*
                echo "<div id=\"pages\"  class=\"opac_".htmlentities($row_items['pager'], ENT_QUOTES)."\" style=\"width:".$sizing[0]."px; height:".$sizing[1]."px;\"><img src=\"/img/No/1_".($row_img_count['COUNT(content_img)']+1)."_".htmlentities($row_items['pager'], ENT_QUOTES).".svg\" style=\"width: 115px; float: none; margin-top: ".(($sizing[1]/2)-20)."px;\" /></div>";
                */

                echo "<div id=\"pages\" style=\"width:"; if($sizing[0] > 299) { echo "".($sizing[0]/$quotient).""; } else { echo "".$sizing[0].""; } echo "px; height:"; if($sizing[0] > 299) { echo "".($sizing[1]/$quotient).""; } else { echo "".$sizing[1].""; } echo "px;\"><h2 class=\"".htmlentities($row_items['pager'], ENT_QUOTES)."\" style=\"width:"; if($sizing[0] > 299) { echo "".($sizing[0]/$quotient).""; } else { echo "".$sizing[0].""; } echo "px; bottom: "; if($sizing[0] > 299) { echo "".((($sizing[1]/$quotient)-60)/2).""; } else { echo "".(($sizing[1]/$quotient)-35).""; } echo "px;\">1/".($row_img_count['COUNT(content_img)']+1)."</h2></div>";
                echo "<img class=\"sub\" src=\"/cms/images/".htmlentities($row_img_array['content_img'], ENT_QUOTES)."\" width=\""; if($sizing[0] > 299) { echo "".($sizing[0]/$quotient).""; } else { echo "".$sizing[0].""; } echo "\" height=\""; if($sizing[0] > 299) { echo "".($sizing[1]/$quotient).""; } else { echo "".$sizing[1].""; } echo "\" alt=\"Sabrina Theissen | &rsaquo;".htmlentities($row_items['caption'], ENT_QUOTES)."&lsaquo; ".$postTxt."\" />\n";

              }

              echo "<img class=\"last-tear\" src=\"/cms/images/".htmlentities($row_img_single['content_img'], ENT_QUOTES)."\" width=\""; if($sizing[0] > 299) { echo "".($sizing[0]/$quotient).""; } else { echo "".$sizing[0].""; } echo "\" height=\""; if($sizing[0] > 299) { echo "".($sizing[1]/$quotient).""; } else { echo "".$sizing[1].""; } echo "\" alt=\"Sabrina Theissen | &rsaquo;".htmlentities($row_items['caption'], ENT_QUOTES)."&lsaquo; ".$postTxt."\" />\n";


              echo "<script type=\"text/javascript\">\n";
              echo "$(\".scrollContainer_".htmlentities($row_items['ID'], ENT_QUOTES)." #carousel .sub, .scrollContainer_".htmlentities($row_items['ID'], ENT_QUOTES)." #carousel #pages\").click(function(){\n";
                echo "$(\"#carousel\").find(\"img\").last().css({'cursor' : 'default'});\n";
                echo "$(this).parent(\"#carousel\").animate({\"marginTop\": \"-="; if($sizing[0] > 299) { echo "".($sizing[1]/$quotient).""; } else { echo "".$sizing[1].""; } echo "px\"}, 300);\n";
                echo "});\n";

                echo "$(\".scrollContainer_".htmlentities($row_items['ID'], ENT_QUOTES)." #carousel .last-tear\").click(function(){\n";
                  echo "$(this).parent(\"#carousel\").animate({\"marginTop\": \"0px\"}, 500);\n";
                  echo "});\n";

                  echo "</script>\n";


                  echo "</div>\n";
                  echo "</div>\n";

                  echo "<a href=\"/cuts/".htmlentities($row_items['ID'], ENT_QUOTES)."/\"><h2>".htmlentities($row_items['caption'], ENT_QUOTES)."</h2></a><p>".$row_items['text']."</p><h3>N&deg;".$tearDisplayId."</h3>\n";
                  echo "</div><br /><br />\n";
                }

              }

              if(isset($_GET['cat']) AND $_GET['cat'] != 0)	{

                echo "<br /><br /><br /><br /><div id=\"loadCuts\"><a href=\"/cuts/0/1\">Show all Posts</a><br /><br /></div>";

              }	else 	{

                echo "";

              }

              ?>

              <div id="footer"><a class="bb_credits hidden" href="http://www.buero-buero.org" target="_blank" title="Buero Buero. Inter things.">A Buero Buero Interweb</a></div>


            </div>

            <?php



            if(isset($_GET['cat']) AND ($_GET['cat']) == 0 ) {

              if(isset($_GET['book']) AND ($_GET['book']+8) <= $num_items) {
                echo "<div id=\"loadCuts\"><a href=\"/cuts/0/".($_GET['book']+8)."\">older posts</a><br /><br /></div>";
              } else {
                echo ""; }
              } else {
                echo "";
              }

              ?>	 </div>

              <?php } else { ?>


                <!-- DESK -->



                <div id="content">

                  <div id="topper">
                    <a href="#top">Top</a>
                  </div>

                  <a href="/books/">
                    <!--	<div id="sign"<?php echo "$_set_hider"; ?>></div> -->
                    <div id="mark-books"<?php echo "$_set_hider"; ?>><img src="/img/sabrina_theissen.svg" /></div>
                  </a>

                  <div id="overview"<?php echo "$_set_overview"; ?>>

                    <div id="list-items">


                      <?php if(isset($_GET['cat']))	{



                        echo "<br />\n";

                        $sql_items = "SELECT

                        ID,
                        date,
                        caption,
                        text,
                        vid,
                        pager,
                        recordListingID

                        FROM

                        tears

                        WHERE 	ID = '".$_GET['cat']."'

                        ORDER BY recordListingID ASC

                        ";


                        $result_items = mysql_query($sql_items) OR die("<pre>".$sql_items."</pre>".mysql_error());
                        while($row_items = mysql_fetch_assoc($result_items)) {

                          $tearDisplayId = $num_items - $row_items['recordListingID'] + 1;

                          $postTxt = "".$row_items['text']."";
                          $postTxt = preg_replace('#<a(.*)>(.*)</a>#Uis', '\\2', $postTxt);



                          if( htmlentities($row_items['vid'], ENT_QUOTES) == "yes") {

                            $sql_img = "SELECT

                            ID,
                            ID_t,
                            content_img,
                            date
                            FROM
                            img

                            WHERE	id_t = '".$row_items['ID']."'

                            ORDER BY ID ASC

                            ";

                            $result_img = mysql_query($sql_img) OR die("<pre>".$sql_img."</pre>".mysql_error());
                            $row_img = mysql_fetch_assoc($result_img);

                            $sizing = GetImageSize("http://www.sabrinatheissen.com/cms/images/".htmlentities($row_img['content_img'], ENT_QUOTES)."");

                            echo "<div id=\"tear\" class=\"item margin\" style=\"width:".$sizing[0]."px;\">\n";

                            echo "<video width=\"".$sizing[0]."\" height=\"".$sizing[1]."\" poster=\"/cms/images/".htmlentities($row_img['content_img'], ENT_QUOTES)."\" controls=\"controls\" preload=\"none\">\n";


                            $sql_img_array = "SELECT

                            ID,
                            ID_t,
                            content_img,
                            date
                            FROM
                            img

                            WHERE	id_t = '".$row_items['ID']."'

                            ORDER BY ID ASC

                            LIMIT 0,4

                            ";


                            $result_img_array = mysql_query($sql_img_array) OR die("<pre>".$sql_img_array."</pre>".mysql_error());
                            while($row_img_array = mysql_fetch_assoc($result_img_array)) {




                              if(substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", 20) == "mp4") {
                                $setCodec ="codecs=avc1.42E01E, mp4a.40.2";
                              }   elseif(substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", 20) == "ogv") {
                                $setCodec ="codecs=theora, vorbis";
                              }	elseif(substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", 20) == "webm") {
                                $setCodec ="codecs=vp8, vorbis";
                              }

                              if(substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", 20) == "ogv") {
                                $setType = "ogg"; }  else {  $setType = "".substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", 20)."";
                                }


                                if(substr("".htmlentities($row_img_array['content_img'], ENT_QUOTES)."", -3) != "png") {

                                  echo "<source type=\"video/".$setType."; ".$setCodec."\" src=\"/cms/images/".htmlentities($row_img_array['content_img'], ENT_QUOTES)."\" width=\"".$sizing[0]."\" height=\"".$sizing[1]."\" />\n";

                                }
                              }




                              echo "</video>\n";
                              echo "<a href=\"/cuts/".htmlentities($row_items['ID'], ENT_QUOTES)."/\"><h2>".htmlentities($row_items['caption'], ENT_QUOTES)."</h2></a><p>".$row_items['text']."</p><h3>N&deg;".$tearDisplayId."</h3>\n";

                              echo "</div>\n";

                            }	else	{

                              $sql_img = "SELECT

                              ID,
                              ID_t,
                              content_img,
                              date
                              FROM
                              img

                              WHERE	id_t = '".$row_items['ID']."'

                              ORDER BY ID ASC

                              ";

                              $result_img = mysql_query($sql_img) OR die("<pre>".$sql_img."</pre>".mysql_error());
                              $row_img = mysql_fetch_assoc($result_img);

                              $sizing = GetImageSize("http://www.sabrinatheissen.com/cms/images/".htmlentities($row_img['content_img'], ENT_QUOTES)."");


                              echo "<div id=\"tear\" class=\"item margin\" style=\"width:".$sizing[0]."px;\">\n";


                              echo "<div id=\"imgContainer\" class=\"scrollContainer_".htmlentities($row_items['ID'], ENT_QUOTES)."\" style=\"width:".$sizing[0]."px; height:".$sizing[1]."px;\">\n";



                              echo "<div id=\"carousel\" style=\"width:".$sizing[0]."px;\">\n";


                              $sql_img_single = "SELECT

                              ID,
                              ID_t,
                              content_img,
                              date
                              FROM
                              img

                              WHERE	id_t = '".$row_items['ID']."'

                              ORDER BY ID DESC

                              ";

                              $result_img_single = mysql_query($sql_img_single) OR die("<pre>".$sql_img_single."</pre>".mysql_error());
                              $row_img_single = mysql_fetch_assoc($result_img_single);

                              $sql_img_count = "SELECT

                              ID,
                              ID_t,
                              COUNT(content_img)
                              FROM
                              img

                              WHERE	id_t = '".$row_items['ID']."' AND ID != '".$row_img_single['ID']."'


                              ";

                              $result_img_count = mysql_query($sql_img_count) OR die("<pre>".$sql_img_count."</pre>".mysql_error());
                              $row_img_count = mysql_fetch_assoc($result_img_count);


                              $sql_img_array = "SELECT

                              ID,
                              ID_t,
                              content_img,
                              date
                              FROM
                              img

                              WHERE	id_t = '".$row_items['ID']."' AND ID != '".$row_img_single['ID']."'

                              ORDER BY ID ASC

                              ";

                              $result_img_array = mysql_query($sql_img_array) OR die("<pre>".$sql_img_array."</pre>".mysql_error());
                              while($row_img_array = mysql_fetch_assoc($result_img_array)) {

                                /*
                                echo "<div id=\"pages\"  class=\"opac_".htmlentities($row_items['pager'], ENT_QUOTES)."\" style=\"width:".$sizing[0]."px; height:".$sizing[1]."px;\"><img src=\"/img/No/1_".($row_img_count['COUNT(content_img)']+1)."_".htmlentities($row_items['pager'], ENT_QUOTES).".svg\" style=\"width: 115px; float: none; margin-top: ".(($sizing[1]/2)-20)."px;\" /></div>";
                                */

                                echo "<div id=\"pages\" style=\"width:".$sizing[0]."px; height:".$sizing[1]."px;\"><h2 class=\"".htmlentities($row_items['pager'], ENT_QUOTES)."\" style=\"width:".$sizing[0]."px; bottom: ".(($sizing[1]/2)-35)."px;\">1/".($row_img_count['COUNT(content_img)']+1)."</h2></div>";


                                echo "<img class=\"sub\" src=\"/cms/images/".htmlentities($row_img_array['content_img'], ENT_QUOTES)."\" width=\"".$sizing[0]."\" height=\"".$sizing[1]."\" alt=\"Sabrina Theissen | &rsaquo;".htmlentities($row_items['caption'], ENT_QUOTES)."&lsaquo; ".$postTxt."\" />\n";

                              }

                              echo "<img class=\"last-tear\" src=\"/cms/images/".htmlentities($row_img_single['content_img'], ENT_QUOTES)."\" width=\"".$sizing[0]."\" height=\"".$sizing[1]."\" alt=\"Sabrina Theissen | &rsaquo;".htmlentities($row_items['caption'], ENT_QUOTES)."&lsaquo; ".$postTxt."\" />\n";


                              echo "<script type=\"text/javascript\">\n";
                              echo "$(\".scrollContainer_".htmlentities($row_items['ID'], ENT_QUOTES)." #carousel .sub, .scrollContainer_".htmlentities($row_items['ID'], ENT_QUOTES)." #carousel #pages\").click(function(){\n";
                                echo "$(\"#carousel\").find(\"img\").last().css({'cursor' : 'default'});\n";
                                echo "$(this).parent(\"#carousel\").animate({\"marginTop\": \"-=".$sizing[1]."px\"}, 300);\n";
                                echo "});\n";

                                echo "$(\".scrollContainer_".htmlentities($row_items['ID'], ENT_QUOTES)." #carousel .last-tear\").click(function(){\n";
                                  echo "$(this).parent(\"#carousel\").animate({\"marginTop\": \"0px\"}, 500);\n";
                                  echo "});\n";

                                  echo "</script>\n";


                                  echo "</div>\n";
                                  echo "</div>\n";

                                  echo "<a href=\"/cuts/".htmlentities($row_items['ID'], ENT_QUOTES)."/\"><h2>".htmlentities($row_items['caption'], ENT_QUOTES)."</h2></a><p>".$row_items['text']."</p><h3>N&deg;".$tearDisplayId."</h3>\n";
                                  echo "</div>\n";
                                }

                              }
                            } else {

                              ?>

                              <script>

                              $(document).ready(function(){$("#list-items-paste").scrollPagination({nop:7,offset:0,error:"",delay:500,scroll:true})})

                              </script>

                              <?php

                            }


                            ?>

                            <div id="list-items-paste"></div>



                            <!-- Start Items -->



                            <?php

                            if(isset($_GET['cat']))	{

                              echo "<p class=\"reg_notes top-100\"><a href=\"/cuts/\">Show all Posts</a></p>";

                            }	else 	{

                              echo "<br /><br />";

                            }


                            ?>


                            <div id="footer"><a class="bb_credits hidden" href="http://www.buero-buero.org" target="_blank" title="Buero Buero. Inter things.">A Buero Buero Interweb</a></div>


                          </div>



                        </div>



                        <?php } ?>



                      </div>
