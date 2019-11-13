<div id="content">

<!--
	<script>
			   $(function() {
					$("#sign_d").hide();
			   });
	</script>
-->
	<a href="/books/">
		<div id="mark-books"<?php echo "$_set_hider"; ?>><img src="/img/sabrina_theissen.svg" /></div>
		<!--<div id="sign_d"<?php echo "$_set_hider"; ?>></div>-->
	</a>

<?php

			if(!isset($_SESSION['GO_access']))
			   {

			   echo "<meta http-equiv=\"refresh\" content=\"0; URL=/login/\">";

			   }  else  {

?>

			   <script>
			   $(function() {
					$("html, body").css({ "background-color" : "#1a1b20", "-webkit-transition" : "0.6s linear", "-moz-transition" : "0.6s linear", "-o-transition" : "0.6s linear", "transition" : "0.6s linear" },0);
					$(".navi-white").children("li").addClass("white-points");
					$("#counter p").addClass("white-points");
					$("#mark-books").hide();
					$("#sign").hide();
					/*$("#sign_d").show();*/
					$(".stalled").show();
					$(".crump").show();
					$(".books").hide();
					$(".ltr_expand a").removeAttr("href");
			   });
			   </script>

	<div id="overview"<?php echo "$_set_overview"; ?>>

	<div id="ltb">

	<?php

	$sql_ltr_img = "SELECT

                            ID,
                            ID_a,
                            content_img,
                            recordListingID

                    FROM

                            img

                    WHERE ID_a != 'NULL'

                    ORDER BY recordListingID ASC

           			";

    $result_ltr_img = mysqli_query($conn, $sql_ltr_img) OR die("<pre>".$sql_ltr_img."</pre>".mysqli_error($conn));
	while($row_ltr_img = mysqli_fetch_assoc($result_ltr_img)) {

		$sql_ltr_cat = "SELECT

                            ID,
                            ID_cat,
                            ID_2ndcat

                    FROM

                            lightbox

                    WHERE ID = '".$row_ltr_img['ID_a']."'

           			";

    		$result_ltr_cat = mysqli_query($conn, $sql_ltr_cat) OR die("<pre>".$sql_ltr_cat."</pre>".mysqli_error($conn));
			$row_ltr_cat = mysqli_fetch_assoc($result_ltr_cat);


			echo "<div id=\"container\" class=\"cat".htmlentities($row_ltr_cat['ID_cat'], ENT_QUOTES)." cat".htmlentities($row_ltr_cat['ID_2ndcat'], ENT_QUOTES)."\"><p class=\"add\">ADD</p><p class=\"clear\">DROP</p><div class=\"reset\"></div><div class=\"clicked\"></div><img src=\"/cms/images/ltr_thumbs_sml/".htmlentities($row_ltr_img['content_img'], ENT_QUOTES)."\" /></div>\n";

	}
	?>

			</div>

		<div id="clear"></div>

	</div>

	<div id="counter"><p>Selected: <span>0</span></p></div>
	<div id="topper_ltr"><a href="#top"><p>Top</p></a></div>
	<div id="ltr_note_container"><p><?php if(isset($note)) { echo $note; } ?></p></div>
	<div id="ltr_btn_container">
		 <input type="submit" class="ltr_btn" value="Download" name="Download">
	</div>

<?php } ?>

</div>
