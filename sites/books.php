<div id="content">

  <?php

  if( !isset($_GET['cat']) ) {
    $_GET['cat'] = "all";
  }

  if ($detect->isMobile() && !$detect->isTablet()) {
    ?>
    <div id="welcome" class="handheld <?php echo $_set_intro; ?>">
      <img src="/img/loader.gif">
      <br /><br />
      <img src="/img/welcome.png">
    </div>
    <?php
  } else {

    if( !isset($_GET['cat']) ) {
      $_GET['cat'] = "all";
    }

    $sql_rand = "SELECT

      content_img,
      intro

      FROM img

      WHERE intro = 'yes'

      ORDER BY RAND()
      LIMIT 3
    ";

    $result_rand = mysql_query($sql_rand) OR die("<pre>".$sql_rand."</pre>".mysql_error());

    while($row_rand = mysql_fetch_assoc($result_rand)) {

      echo "<div id=\"intro\" class=\"introCol".$_set_intro."\" style=\"
            background-image: url('/cms/images/".htmlentities($row_rand['content_img'], ENT_QUOTES)."');
            -webkit-background-image: url('/cms/images/".htmlentities($row_rand['content_img'], ENT_QUOTES)."');
            -moz-background-image: url('/cms/images/".htmlentities($row_rand['content_img'], ENT_QUOTES)."');
            -o-background-image: url('/cms/images/".htmlentities($row_rand['content_img'], ENT_QUOTES)."');
            -ms-background-image: url('/cms/images/".htmlentities($row_rand['content_img'], ENT_QUOTES)."');\"></div>";

    }
    ?>

    <div id="welcome" class="<?php echo $_set_intro; ?>">
      <img src="/img/welcome.png">
    </div>


  <?php
  }
  ?>


  <a href="/books/">
    <!--<div id="sign"<?php echo "$_set_hider"; ?>></div>-->
    <div id="mark-books"<?php echo "$_set_hider"; ?>><img src="/img/sabrina_theissen.svg" /></div>
  </a>

  <div id="overview"<?php echo "$_set_overview"; ?>>

    <?php

    if ( isset($_GET['cat']) AND $_GET['cat'] == "all" ) {

      $sql_items = "SELECT

      ID,
      recordListingID,
      ID_cat,
      ID_2ndcat,
      ID_client,
      name,
      hair,
      makeup,
      styling,
      setdesign

      FROM project

      ORDER BY recordListingID DESC

      ";

    } else {

      $sql_cat_state = "SELECT ID, category from cat WHERE category = '".$_GET['cat']."' ";
      $result_cat_state = mysql_query($sql_cat_state) OR die("<pre>".$sql_cat_state."</pre>".mysql_error());
      $row_cat_state = mysql_fetch_assoc($result_cat_state);

      $sql_items = "SELECT

      ID,
      recordListingID,
      ID_cat,
      ID_2ndcat,
      ID_client,
      name,
      hair,
      makeup,
      styling,
      setdesign

      FROM project

      WHERE  ID_cat ='".$row_cat_state['ID']."'

      ORDER BY recordListingID DESC

      ";
    }

    $result_items = mysql_query($sql_items) OR die("<pre>".$sql_items."</pre>".mysql_error());
    $row_items = mysql_fetch_assoc($result_items);



    if ( !isset($_GET['book']) ) {

      if(isset($_GET['cat']) AND $_GET['cat'] != "") {
        $pushCat ="".$_GET['cat']."";
      }	else {
        $pushCat ="";
      }

    } else {

      echo "<div id=\"opener\">";

      if ($detect->isMobile() && !$detect->isTablet()) {
        echo "<div style=\"height:50px;\"></div>\n";
      }

      $sql_img = "SELECT
        ID,
        ID_p,
        content_img,
        date

        FROM img
        WHERE	ID_p = '".$_GET['book']."'
        ORDER BY ID ASC
      ";

      $result_img = mysql_query($sql_img) OR die("<pre>".$sql_img."</pre>".mysql_error());

      echo "<div class=\"openergrid\">\n";

      $count = 0;

      while ($row_img = mysql_fetch_assoc($result_img)) {

        $isPortrait = isPortrait($row_img['content_img']);
        $isNewRow = $count % 2 == 0;
        $isSmall = round($count / 2) % 2 == 1;

        if (!$isPortrait || $isNewRow) {
          echo "  <div class=\"openergrid-row\">\n";
        }

        if ($isPortrait && $isSmall) {
          echo "    <div class=\"openergrid-item openergrid-item-pt1\">";
          $count++;
        } elseif ($isPortrait) {
          echo "    <div class=\"openergrid-item openergrid-item-pt2\">";
          $count++;
        } elseif (!$isPortrait) {
          echo "    <div class=\"openergrid-item openergrid-item-la\">";
        }
        echo "      <img
                      src=\"/cms/images/".htmlentities($row_img['content_img'], ENT_QUOTES)."\"
                      alt=\"Sabrina Theissen | N&deg;".htmlentities($row_title_item['recordListingID'], ENT_QUOTES)." &rsaquo;".htmlentities($row_title_item['name'], ENT_QUOTES).
                        "&lsaquo; for ".htmlentities($row_title_client['name'], ENT_QUOTES)."\" />\n";
        echo "    </div>";

        if (!$isPortrait || !$isNewRow) {
          echo "  </div>";
        }
      }

      echo "</div>";

      $sql_pushRank = "SELECT
        ID,
        recordListingID

        FROM project
        WHERE	ID = '".$_GET['book']."'
      ";

      $result_pushRank = mysql_query($sql_pushRank) OR die("<pre>".$sql_pushRank."</pre>".mysql_error());
      $row_pushRank = mysql_fetch_assoc($result_pushRank);

      $sql_client_state = "SELECT
        ID,
        ID_client,
        hair,
        makeup,
        styling,
        setdesign

        FROM project
        WHERE ID = '".$_GET['book']."'
      ";
      $result_client_state = mysql_query($sql_client_state) OR die("<pre>".$sql_client_state."</pre>".mysql_error());
      $row_client_state = mysql_fetch_assoc($result_client_state);

      $sql_client = "SELECT
        ID,
        name

        FROM clients
        WHERE ID = '".$row_client_state['ID_client']."'
      ";

      $result_client = mysql_query($sql_client) OR die("<pre>".$sql_client."</pre>".mysql_error());
      $row_client = mysql_fetch_assoc($result_client);

      if($row_pushRank['recordListingID'] == "") {
        echo "<meta http-equiv=\"refresh\" content=\"0; URL=/books/\">\n";
      }

      if($row_client_state['hair'] != $row_client_state['makeup'] AND $row_client_state['setdesign'] != ""){

        echo "<div id=\"credits-four\">
              <p>STYLING &nbsp;".htmlentities($row_client_state['styling'], ENT_QUOTES)."</p>
              <p>HAIR &nbsp;".htmlentities($row_client_state['hair'], ENT_QUOTES)."</p>
              <p>MAKE-UP &nbsp;".htmlentities($row_client_state['makeup'], ENT_QUOTES)."</p>
              <p>SET DESIGN&nbsp;".htmlentities($row_client_state['setdesign'], ENT_QUOTES)."</p></div>\n";

      }  elseif($row_client_state['hair'] != $row_client_state['makeup'] AND $row_client_state['setdesign'] == ""){

        echo "<div id=\"credits-three\">
              <p>STYLING &nbsp;".htmlentities($row_client_state['styling'], ENT_QUOTES)."</p>
              <p>HAIR &nbsp;".htmlentities($row_client_state['hair'], ENT_QUOTES)."</p>
              <p>MAKE-UP &nbsp;".htmlentities($row_client_state['makeup'], ENT_QUOTES)."</p></div>\n";

      }  elseif($row_client_state['hair'] == $row_client_state['makeup'] AND $row_client_state['setdesign'] != ""){

        echo "<div id=\"credits-three\">
              <p>STYLING &nbsp;".htmlentities($row_client_state['styling'], ENT_QUOTES)."</p>
              <p>HAIR &amp; MAKE-UP &nbsp;".htmlentities($row_client_state['makeup'], ENT_QUOTES)."</p>
              <p>SET DESIGN&nbsp;".htmlentities($row_client_state['setdesign'], ENT_QUOTES)."</p></div>\n";

      }  elseif($row_client_state['hair'] == $row_client_state['makeup'] AND $row_client_state['setdesign'] == ""){

        echo "<div id=\"credits-two\"><p>STYLING &nbsp;".htmlentities($row_client_state['styling'], ENT_QUOTES)."</p>
              <p>HAIR &amp; MAKE-UP &nbsp;".htmlentities($row_client_state['makeup'], ENT_QUOTES)."</p></div>\n";

      }

      if ($detect->isMobile() && !$detect->isTablet()) {
        echo "<div class=\"creditsBreak\"><p class=\"showHide\">Show Credits</p></div>\n";
      }



      echo "<div id=\"client\">
              <h4>N&deg;".htmlentities($row_pushRank['recordListingID'], ENT_QUOTES)."</h4><br />
              <h3>".htmlentities($row_client['name'], ENT_QUOTES)."</h3>
            </div></div>\n";

    }

    ?>

    <div id="list" class="listgrid">
      <div class="listgrid-sizer"/>

      <?php

      if ( isset($_GET['cat']) AND $_GET['cat'] == "all" ) {

        $sql_items_list = "SELECT

          ID,
          recordListingID,
          ID_cat,
          ID_client,
          name,
          hair,
          makeup,
          styling,
          setdesign

          FROM project
          ORDER BY recordListingID DESC

        ";

      }	else {

        $sql_items_list = "SELECT

          ID,
          recordListingID,
          ID_cat,
          ID_client,
          name,
          hair,
          makeup,
          styling,
          setdesign

          FROM project
          WHERE ID_cat ='".$row_cat_state['ID']."'
                OR ID_2ndcat ='".$row_cat_state['ID']."'
          ORDER BY recordListingID DESC
      ";
    }

    $result_items_list = mysql_query($sql_items_list) OR die("<pre>".$sql_items_list."</pre>".mysql_error());

    while ( $row_items_list = mysql_fetch_assoc($result_items_list) ) {

      if ( ! (isset($_GET['book']) AND ($row_items_list['ID'] == $_GET['book'])) ) {

        $sql_client_list = "SELECT
          ID,
          name

          FROM clients
          WHERE ID = '".$row_items_list['ID_client']."'
        ";

        $result_client_list = mysql_query($sql_client_list) OR die("<pre>".$sql_client_list."</pre>".mysql_error());
        $row_client_list = mysql_fetch_assoc($result_client_list);

        $sql_img = "SELECT
          ID,
          ID_p,
          content_img,
          date

          FROM img
          WHERE	id_p = '".$row_items_list['ID']."'
          ORDER BY ID ASC
        ";

        $result_img = mysql_query($sql_img) OR die("<pre>".$sql_img."</pre>".mysql_error());
        $row_img = mysql_fetch_assoc($result_img);

        if(isset($_GET['cat']) AND $_GET['cat'] != "") {

          $pushCat ="".$_GET['cat']."";

        }	else 	{

          $pushCat ="";

        }

        echo "<div id=\"project\" class=\"listgrid-item\">";
        echo "  <a href=\"/books/".$pushCat."/".$row_items_list['ID']."/\"
                   title=\"&nbsp;&rsaquo;".htmlentities($row_items_list['name'], ENT_QUOTES)."&lsaquo; for ".htmlentities($row_client_list['name'], ENT_QUOTES)."&nbsp;\">";

        if ($detect->isMobile() && !$detect->isTablet()) {
          echo "    <img src=\"".getThumb($row_items_list['ID'], true)."\"";
        } else {
          echo "    <img src=\"".getThumb($row_items_list['ID'])."\"";
        }
        echo "         alt=\"Sabrina Theissen | N&deg;".htmlentities($row_items_list['recordListingID'], ENT_QUOTES)." &rsaquo;".htmlentities($row_items_list['name'], ENT_QUOTES)
                            ."&lsaquo; for ".htmlentities($row_client_list['name'], ENT_QUOTES)."\" />";

        echo "    <div class=\"caption\">";
        if ($detect->isMobile() && !$detect->isTablet()) {
          echo "      <h4>N&deg;".htmlentities($row_items_list['recordListingID'], ENT_QUOTES)."</h4><br/>";
        }	else {
          echo "      <h2>N&deg;".htmlentities($row_items_list['recordListingID'], ENT_QUOTES)."</h2>";
        }
        echo "      <h3>".htmlentities($row_client_list['name'], ENT_QUOTES)."</h3>";
        echo "    </div>";

        echo"  </a>";
        echo "</div>\n";

      }

    }

    ?>

  </div>

</div>

<script type="text/javascript" src="/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="/js/packery-mode.pkgd.min.js"></script>
<script type="text/javascript" src="/js/imagesloaded.pkgd.min.js"></script>
