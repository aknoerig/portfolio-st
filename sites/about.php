<?php

include("../mysql.php");

$sql_info = "SELECT

  ID,
  about_txt,
  ustnr,
  name,
  street,
  no,
  additional,
  zip,
  city,
  country,
  phone,
  mobile,
  mail,
  imprint,
  terms,
  agency,
  name_r,
  web_r,
  phone_r

  FROM	about

";

$result_info = mysqli_query($conn, $sql_info) OR die("<pre>".$sql_info."</pre>".mysqli_error($conn));
$row_info = mysqli_fetch_assoc($result_info);

$sql_clients = "SELECT
  ID,
  name,
  public

  FROM	clients

  WHERE	public = 'public'

  ORDER BY name ASC
";

$result_clients = mysqli_query($conn, $sql_clients) OR die("<pre>".$sql_clients."</pre>".mysqli_error($conn));

?>

<div id="info-content">

  <div id="about" class ="info-block">
    <p class="default">
      <?php echo "".htmlentities($row_info['about_txt'], ENT_QUOTES)."\n"; ?>
    </p>
  </div>

  <div id="info-columns">
    <div id="contact" class ="info-block">
      <h3>Contact</h3>
      <p class="default">
        <?php
        echo "".htmlentities($row_info['name'], ENT_QUOTES)."<br />\n";
        echo "".htmlentities($row_info['mobile'], ENT_QUOTES)."<br />\n";
        echo "<a href=\"mailto:".htmlentities($row_info['mail'], ENT_QUOTES)."&#064;&#115;&#097;&#098;&#114;&#105;&#110;&#097;&#116;&#104;&#101;&#105;&#115;&#115;&#101;&#110;&#046;&#099;&#111;&#109;\">".htmlentities($row_info['mail'], ENT_QUOTES)."&#064;&#115;&#097;&#098;&#114;&#105;&#110;&#097;&#116;&#104;&#101;&#105;&#115;&#115;&#101;&#110;&#046;&#099;&#111;&#109;</a>\n";
        ?>
        <br />
        <br />
        <a href="https://www.instagram.com/sabrinatheissen/" target="_blank">Instagram</a>
      </p>
    </div>

    <div id="clients" class ="info-block">
      <h3>Among her clients are</h3>
      <p class="default">
        <?php
        while($row_clients = mysqli_fetch_assoc($result_clients)) {
          echo "".htmlentities($row_clients['name'], ENT_QUOTES)."<br />\n";
        }
        ?>
      </p>
    </div>

    <div id="represent" class ="info-block">
      <h3>Represented by</h3>
      <p class="default">
        AK/KRUSE<br/>
        <a href="tel:+494042326810">+49 40-42 32 68 10</a><br/>
        <a href="http://www.akkruse.com" target="_blank">www.akkruse.com</a>
        
        <!--
        <?php
          echo "".htmlentities($row_info['agency'], ENT_QUOTES)."<br />\n";
          if($row_info['name_r'] !="") {
            echo "".htmlentities($row_info['name_r'], ENT_QUOTES)."<br />\n";
          } else { ""; }
          echo "".htmlentities($row_info['phone_r'], ENT_QUOTES)."<br />\n";
          echo "<a href=\"http://".htmlentities($row_info['web_r'], ENT_QUOTES)."\" target=\"_blank\">".htmlentities($row_info['web_r'], ENT_QUOTES)."</a>\n";
          ?>
        -->
      </p>
    </div>
  </div>

  <div id="mailing" class ="info-block">
    <h3>Mailing list</h3>
    <form action="" method="post">
      <input type="text" name="mail" id="mail" class="reg_inpt" value="Your email address" onfocus="if(value == 'Your email address') value = '';" onblur="if(value == '') value = 'Your email address';" /><br />
      <input type="button" name="submit" id="submit" value="Subscribe" onclick="register()" class="reg_btn"/>
    </form>
  </div>

  <div id="response"></div>

  <div id="imprint" class ="info-block">
    <h3>Imprint</h3>
    <p class="default imprint">
      <?php
      echo "Copyright © Sabrina Theissen, ".date("Y").". ".htmlentities($row_info['imprint'], ENT_QUOTES)."\n";
      ?>
      <br/>
      <br/>
      Owner of and responsible for this internet presence:<br />Sabrina Theissen, <?php echo "".htmlentities($row_info['street'], ENT_QUOTES)." ".htmlentities($row_info['no'], ENT_QUOTES).", ".htmlentities($row_info['zip'], ENT_QUOTES)." ".htmlentities($row_info['city'], ENT_QUOTES)."\n"; ?>

    </p>

    <p class="default imprint">
      <?php
      echo "VAT ID: ".htmlentities($row_info['ustnr'], ENT_QUOTES)."\n";
      ?>
    </p>
  </div>

  <div id="footer" class ="info-block" class="height-35 top-65">
    <a class="bb_credits" href="http://www.buero-buero.org" target="_blank" title="Buero Buero. Inter things.">A Buero Buero Interweb</a>
  </div>

</div>
