<?php

   		if(isset($_GET['s'])) {

			$_set_hider = "";
			$_set_intro = " hider";
			$_set_logo = "-onstate";
			$_set_overview = "";
 			$_set_cuts_a = "";
			$_set_wNavi = "";
			$_set_lightroom_a = "";
			$_set_book_a = "";
			$_set_enterHeight = " class=\"setContent\"";
 			$_set_cuts_a = "";
			$_set_wNavi = "";
			$_set_lightroom_a = "";

   		}

   		if(!isset($_GET['s'])) {

			$_set_hider = " class=\"hider\"";
			$_set_overview = " class=\"hiderOverview\"";
			$_set_intro = "";
			$_GET['s'] = "books";
 			$_set_cuts_a = "";
			$_set_wNavi = "";
			$_set_lightroom_a = "";
			$_set_book_a = "";
			$_set_expand = "";

		}

   		if(isset($_GET['s']) AND $_GET['s'] == "books") {

			$_set_book_a = " class=\"active\"";
 			$_set_cuts_a = "";
			$_set_wNavi = "";
			$_set_lightroom_a = "";
			$_set_expand = "";
			$_set_mobileMenuCuts = "";
			$_set_mobileMenuBooks = " class=\"flipMenuMobileActive\"";

		}

   		if(isset($_GET['s']) AND $_GET['s'] == "cuts" ) {

			$_set_cuts_a = " class=\"active\"";
			$_set_wNavi = "";
			$_set_lightroom_a = "";
			$_set_book_a = "";
			$_set_expand = "";
			$_set_mobileMenuCuts = " class=\"flipMenuMobileActive\"";
			$_set_mobileMenuBooks = "";

		}

   		if(isset($_GET['s']) AND $_GET['s'] == "project") {

			$_set_dividerStretch = "Content";
 			$_set_cuts_a = "";
			$_set_wNavi = "";
			$_set_lightroom_a = "";
			$_set_book_a = "";
			$_set_expand = "";

		}

   		if(!isset($_GET['s']) OR isset($_GET['list']) AND $_GET['list'] == "all") {

			$_set_toggleSub = " toggleSub";
			$_set_enterHeight = " class=\"toggleContent\"";
 			$_set_cuts_a = "";
			$_set_wNavi = "";
			$_set_lightroom_a = "";
			$_set_book_a = "";
			$_set_expand = "";

		}

   		if(isset($_GET['list']) AND $_GET['list'] == "all") {

			$_set_all_active = " class=\"active\"";
 			$_set_cuts_a = "";
			$_set_wNavi = "";
			$_set_lightroom_a = "";
			$_set_book_a = "";
			$_set_expand = "";

		}

   		if(isset($_GET['s']) AND $_GET['s'] == "lightroom" ) {

			$_set_lightroom_a = " class=\"active\"";
			$_set_wNavi = " class=\"navi-white\"";
			$_set_wSign = "_d";
 			$_set_cuts_a = "";
			$_set_book_a = "";
			$_set_expand = "ltr_expand";

		}

   		if(isset($_GET['s']) AND $_GET['s'] == "login") {

			$_set_login = " class=\"login_mask\"";

		}


	$sql_info = "

			SELECT

				mobile

			FROM	about

		";

    $result_info = mysql_query($sql_info) OR die("<pre>".$sql_info."</pre>".mysql_error());
	$row_info = mysql_fetch_assoc($result_info);


?>


	<?php
		if ($detect->isMobile() && !$detect->isTablet()) {
	?>

		<div id="topBarMobile">
			<div id="topBarLogo">
				<a href="/books/" /><img src="/img/Sabrina_Theissen_MobileLogo.svg" /></a>
			</div>
			<div id="flipCall">
				<img src="/img/flipCaller.svg" />
				<img src="/img/flipCaller_onstate.svg" />
			</div>
		</div>

	<?php
		}	else {
		?>

	<div id="naviContainer"<?php echo "$_set_hider"; ?>>

		<ul<?php echo "$_set_wNavi"; ?>>
			<li><a href="/books/"<?php echo "$_set_book_a"; ?> title="Online portfolio of Berlin-based fashion photographer Sabrina Theissen. Among her clients are: Achtung, Bon, Feld, Hugo Boss, I love you, Interview (Russia), L'Officiel Hommes, Sleek, Under Current, Vogue (Germany)">Books</a></li>
			<li class="books_timeout"><a href="/books/"<?php echo "$_set_book_a"; ?> title="Online portfolio of Berlin-based fashion photographer Sabrina Theissen. Among her clients are: Achtung, Bon, Feld, Hugo Boss, I love you, Interview (Russia), L'Officiel Hommes, Sleek, Under Current, Vogue (Germany)">Books</a></li>
			<li><a href="/cuts/"<?php echo "$_set_cuts_a"; ?> title="Places, thoughts and experiments. Between here and there">Cuts</a></li>
	<?php
	   		if(isset($_GET['s']) AND $_GET['s'] == "lightroom" OR isset($_GET['s']) AND $_GET['s'] == "login" ) {
			?>
			<li class="unwhite set_timeout"><a href="/books/#about" title="Sabrina Theissen is a German photographer. After living in London for a while she is now based in Berlin.">About</a></li>
	<?php
			}	else {
			?>
			<li class="unwhite set_timeout"><a href="#about" title="Sabrina Theissen is a German photographer. After living in London for a while she is now based in Berlin.">About</a></li>
		<?php
			}
	?>

  <!--
			<li class="set_timeout ltr_mobile <?php echo "$_set_expand"; ?>"><a href="/lightroom/"<?php echo "$_set_lightroom_a"; ?> title="Access the whole archive and create your personal selection.">Lightroom</a>
	<?php
	   		if(isset($_GET['s']) AND $_GET['s'] == "lightroom" ) {
			?>
			<span class="crump">(All)</span>
	<?php
			}
	?>
			</li>
  -->

			<li class="hide_unsub"><a href="#unsubscribe">Unsubscribe</a></li>
			<li class="hide_unsub"><a href="#access">Redirect</a></li>
		</ul>

	</div>

	<?php
		}
		?>




	<?php
	   		if(isset($_GET['s']) AND $_GET['s'] == "lightroom" ) {
			?>

	<div id="subNavLtr">
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li>
				<p id="all">All</p><br />
				<p id="women">Women</p><br />
				<p id="men">Men</p><br />
				<p id="studio">Studio</p><br />
				<p id="location">Location</p><br />
				<p id="couples">Couples</p><br />
				<p id="objects">Objects</p>
			</li>
		</ul>
	</div>

		<?php
			}
	?>


	<div id="info"></div>
