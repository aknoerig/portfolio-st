<?php

ini_set('display_errors',true);
ini_set("session.use_trans_sid", 0);
session_start();


if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {

	session_unset();
	session_destroy();
}

$_SESSION['LAST_ACTIVITY'] = time();

include("makepdf.php");
include("config.php");
include("mysql.php");
include("functions.php");
include("mobile_detect.php");

$detect = new Mobile_Detect();

/*
if ($detect->isMobile() && !$detect->isTablet()) {

}
*/

if ($detect->isMobile() && !$detect->isTablet()) {

	/* ----------- MOBILE ------------ */


	if(isset($_GET['s']) AND $_GET['s'] == "books" AND !isset($_GET['book'])) {

		$title = "SABRINA THEISSEN &nbsp;|&nbsp; Books";
		$description = "Online portfolio of Berlin-based fashion photographer Sabrina Theissen. Among her clients are: Achtung, Bon, Feld, Hugo Boss, I love you, Interview (Russia), L'Officiel Hommes, Sleek, Under Current, Vogue (Germany)";

	}

	elseif(isset($_GET['s']) AND $_GET['s'] == "cuts" AND isset($_GET['cat']) AND $_GET['cat'] == "0") {

		$title = "SABRINA THEISSEN &nbsp;|&nbsp; Cuts";
		$description = "Places, thoughts and experiments of Berlin-based fashion photographer Sabrina Theissen. Between here and there.";

	}

	elseif(isset($_GET['s']) AND $_GET['s'] == "lightroom") {

		$title = "SABRINA THEISSEN &nbsp;|&nbsp; Lightroom";
		$description = "Access the whole archive and create your personal selection.";

	}

	elseif(isset($_GET['s']) AND $_GET['s'] == "cuts" AND isset($_GET['cat'])  AND $_GET['cat'] != "0")	{


		$sql_title_cut = "SELECT

		ID,
		caption,
		text,
		date

		FROM

		tears

		WHERE 	ID = '".$_GET['cat']."'

		";

		$result_title_cut = mysql_query($sql_title_cut) OR die("<pre>".$sql_title_cut."</pre>".mysql_error());
		$row_title_cut = mysql_fetch_assoc($result_title_cut);

		$title = "SABRINA THEISSEN &nbsp;|&nbsp; &rsaquo;".htmlentities($row_title_cut['caption'], ENT_QUOTES)."&lsaquo;&nbsp; ".htmlentities($row_title_cut['date'], ENT_QUOTES)."";
		$description = "".htmlentities($row_title_cut['text'], ENT_QUOTES)."";

	}

	elseif(isset($_GET['s']) AND $_GET['s'] == "books" AND isset($_GET['book'])) {

		$sql_title_item = "SELECT

		ID,
		ID_client,
		name,
		hair,
		makeup,
		styling,
		setdesign,
		recordListingID

		FROM
		project

		WHERE ID = '".$_GET['book']."'

		";

		$result_title_item = mysql_query($sql_title_item) OR die("<pre>".$sql_title_item."</pre>".mysql_error());
		$row_title_item = mysql_fetch_assoc($result_title_item);

		$sql_title_client = "SELECT

		ID,
		name
		FROM
		clients

		WHERE ID = '".$row_title_item['ID_client']."'

		";

		$result_title_client = mysql_query($sql_title_client) OR die("<pre>".$sql_title_client."</pre>".mysql_error());
		$row_title_client = mysql_fetch_assoc($result_title_client);

		if($row_title_item['hair'] != "") { $hair = "".htmlentities($row_title_item['hair'], ENT_QUOTES).""; } else { $hair = ""; }
		if($row_title_item['makeup'] != "") { $makeup = "".htmlentities($row_title_item['makeup'], ENT_QUOTES).""; } else { $makeup = ""; }
		if($row_title_item['styling'] != "") { $styling = " &bull; Styling: ".htmlentities($row_title_item['styling'], ENT_QUOTES).""; } else { $styling = ""; }
		if($row_title_item['setdesign'] != "") { $setdesign = " &bull; Setdesign: ".htmlentities($row_title_item['setdesign'], ENT_QUOTES).""; } else { $setdesign = ""; }

		if($hair == $makeup) { $head = "Hair & Make-up: ".htmlentities($row_title_item['hair'], ENT_QUOTES).""; }
		else { $head = "Hair: ".htmlentities($row_title_item['hair'], ENT_QUOTES)." &bull; Make-up: ".htmlentities($row_title_item['makeup'], ENT_QUOTES).""; }

		$title = "SABRINA THEISSEN &nbsp;|&nbsp; N&deg;".htmlentities($row_title_item['recordListingID'], ENT_QUOTES)."&nbsp; &rsaquo;".htmlentities($row_title_item['name'], ENT_QUOTES)."&lsaquo;&nbsp; for ".htmlentities($row_title_client['name'], ENT_QUOTES)."";
		$description = "Sabrina Theissen for ".htmlentities($row_title_client['name'], ENT_QUOTES)." &bull; ".$head."".$styling."".$setdesign."";

	}

	else {

		$title = "SABRINA THEISSEN &nbsp;Photography";
		$description = "Online portfolio of Berlin-based fashion photographer Sabrina Theissen. Among her clients are: Achtung, Bon, Feld, Hugo Boss, I love you, Interview (Russia), L'Officiel Hommes, Sleek, Under Current, Vogue (Germany)";

	}


}	else 	{

	/* ----------- DESKTOP ------------ */


	if(isset($_GET['s']) AND $_GET['s'] == "books" AND !isset($_GET['book'])) {

		$title = "SABRINA THEISSEN &nbsp;|&nbsp; Books";
		$description = "Online portfolio of Berlin-based fashion photographer Sabrina Theissen. Among her clients are: Achtung, Bon, Feld, Hugo Boss, I love you, Interview (Russia), L'Officiel Hommes, Sleek, Under Current, Vogue (Germany)";

	}

	elseif(isset($_GET['s']) AND $_GET['s'] == "cuts" AND !isset($_GET['cat'])) {

		$title = "SABRINA THEISSEN &nbsp;|&nbsp; Cuts";
		$description = "Places, thoughts and experiments of Berlin-based fashion photographer Sabrina Theissen. Between here and there.";

	}

	elseif(isset($_GET['s']) AND $_GET['s'] == "lightroom") {

		$title = "SABRINA THEISSEN &nbsp;|&nbsp; Lightroom";
		$description = "Access the whole archive and create your personal selection.";

	}

	elseif(isset($_GET['s']) AND $_GET['s'] == "cuts" AND isset($_GET['cat'])  AND $_GET['cat'] != "0")	{


		$sql_title_cut = "SELECT

		ID,
		caption,
		text,
		date

		FROM

		tears

		WHERE 	ID = '".$_GET['cat']."'

		";

		$result_title_cut = mysql_query($sql_title_cut) OR die("<pre>".$sql_title_cut."</pre>".mysql_error());
		$row_title_cut = mysql_fetch_assoc($result_title_cut);

		$title = "SABRINA THEISSEN &nbsp;|&nbsp; &rsaquo;".htmlentities($row_title_cut['caption'], ENT_QUOTES)."&lsaquo;&nbsp; ".htmlentities($row_title_cut['date'], ENT_QUOTES)."";
		$description = "".htmlentities($row_title_cut['text'], ENT_QUOTES)."";

	}

	elseif(isset($_GET['s']) AND $_GET['s'] == "books" AND isset($_GET['book'])) {

		$sql_title_item = "SELECT

		ID,
		ID_client,
		name,
		hair,
		makeup,
		styling,
		setdesign,
		recordListingID

		FROM
		project

		WHERE ID = '".$_GET['book']."'

		";

		$result_title_item = mysql_query($sql_title_item) OR die("<pre>".$sql_title_item."</pre>".mysql_error());
		$row_title_item = mysql_fetch_assoc($result_title_item);

		$sql_title_client = "SELECT

		ID,
		name
		FROM
		clients

		WHERE ID = '".$row_title_item['ID_client']."'

		";

		$result_title_client = mysql_query($sql_title_client) OR die("<pre>".$sql_title_client."</pre>".mysql_error());
		$row_title_client = mysql_fetch_assoc($result_title_client);

		if($row_title_item['hair'] != "") { $hair = "".htmlentities($row_title_item['hair'], ENT_QUOTES).""; } else { $hair = ""; }
		if($row_title_item['makeup'] != "") { $makeup = "".htmlentities($row_title_item['makeup'], ENT_QUOTES).""; } else { $makeup = ""; }
		if($row_title_item['styling'] != "") { $styling = " &bull; Styling: ".htmlentities($row_title_item['styling'], ENT_QUOTES).""; } else { $styling = ""; }
		if($row_title_item['setdesign'] != "") { $setdesign = " &bull; Setdesign: ".htmlentities($row_title_item['setdesign'], ENT_QUOTES).""; } else { $setdesign = ""; }

		if($hair == $makeup) { $head = "Hair & Make-up: ".htmlentities($row_title_item['hair'], ENT_QUOTES).""; }
		else { $head = "Hair: ".htmlentities($row_title_item['hair'], ENT_QUOTES)." &bull; Make-up: ".htmlentities($row_title_item['makeup'], ENT_QUOTES).""; }

		$title = "SABRINA THEISSEN &nbsp;|&nbsp; N&deg;".htmlentities($row_title_item['recordListingID'], ENT_QUOTES)."&nbsp; &rsaquo;".htmlentities($row_title_item['name'], ENT_QUOTES)."&lsaquo;&nbsp; for ".htmlentities($row_title_client['name'], ENT_QUOTES)."";
		$description = "Sabrina Theissen for ".htmlentities($row_title_client['name'], ENT_QUOTES)." &bull; ".$head."".$styling."".$setdesign."";

	}

	else {

		$title = "SABRINA THEISSEN &nbsp;Photography";
		$description = "Online portfolio of Berlin-based fashion photographer Sabrina Theissen. Among her clients are: Achtung, Bon, Feld, Hugo Boss, I love you, Interview (Russia), L'Officiel Hommes, Sleek, Under Current, Vogue (Germany)";

	}


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php echo $title; ?></title>


	<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

	<meta name="description" content="<?php echo $description; ?>" />
	<meta name="keywords" content="Sabrina Theissen, Photographs, Photography, Photographer, Achtung, Bon, Feld, Hugo Boss, I love you magazine, Interview magazine, Sleek, VOGUE, Under Current, L'Officiel Hommes" />
	<meta name="copyright" content="<? echo date("Y"); ?>, Sabrina Theissen" />
	<meta name="author" content="Sabrina Theissen" />
	<meta name="generator" content="Buero Buero / Stefan Wunderwald" />
	<meta name="robots" content="index, follow">

	<?php	if ($detect->isTablet()) { ?>
		<meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=0.9, user-scalable=no" />
	<?php }  ?>

	<?php	if ($detect->isMobile() && !$detect->isTablet()) { ?>
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<?php }  ?>

	<link rel="icon" href="/img/sabrina_theissen_fav_0c.ico" type="image/x-icon" />

	<?php	if ($detect->isMobile() && !$detect->isTablet()) { ?>
		<link rel="stylesheet" href="/gui/general_mobile.css" media="screen" type="text/css" />
	<?php } else { ?>
		<link rel="stylesheet" href="/gui/general.css" media="screen" type="text/css" />
	<?php }  ?>

	<link rel="stylesheet" href="/gui/fonts.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="/gui/player.css" type="text/css" media="screen" />

	<script type="text/javascript" src="/js/jquerylib.js"></script>
	<script type="text/javascript" src="/js/masonry.pkgd.min.js"></script>
	<script type="text/javascript" src="/js/imagesloaded.pkgd.min.js"></script>
	<?php if(!isset($_GET['cat']))	{ ?>
		<script type="text/javascript" src="/js/post.load.js"></script>
	<?php } ?>

	<?php	if ($detect->isMobile() && !$detect->isTablet()) { ?>
		<script type="text/javascript" src="/js/global_mobile.js"></script>
	<?php } else { ?>
		<script type="text/javascript" src="/js/global.js"></script>
	<?php }  ?>

	<script type="text/javascript" src="/js/player.js"></script>

	<?php	if ($detect->isTablet()) { ?>
		<link rel="stylesheet" href="/gui/tablet.css" media="screen" type="text/css" />
	<?php }  ?>

	<script type="text/javascript">

	<?php if(!isset($_GET['s']) OR isset($_GET['s']) AND $_GET['s'] == "books") { ?>

		var $window=$(window);
		$(window).scroll(
			function(){
				var e=$("#mark-books");
				var t=$("#list");
				var n=e.offset().top;
				var r=t.offset().top;
				var i=n+e.height();
				var s=r+t.height();
				if(i>=r&&n<s){
					function o(){
						var e=$window.width();
						if(e<1300){
							$("#mark-books").css({visibility:"hidden"})
						} else {
							$("#mark-books").css({visibility:"visible"})
						}
					}
					o();
					$(window).resize(o)
				} else {
					$("#mark-books").css({visibility:"visible"})
				}
			}
		)

	<?php } if(!isset($_GET['s']) OR isset($_GET['s']) AND $_GET['s'] == "books") {  } ?>

		function register(){
			$.ajax({
				type:"POST",
				url:"/sites/mailinglist.php",
				data:"mail="+document.getElementById("mail").value,
				beforeSend:function(){
					$("#response").html('<p class="reg_notes">Checking<br /><br /><img src="/img/loader.gif" /></p>')
				},
				success:function(e){
					$("#response").hide().fadeIn(500).html(e)
				}
			})
		}
		function unsub(){
			$.ajax({
				type:"POST",
				url:"/sites/leavelist.php",
				data:"mail="+document.getElementById("mail").value,
				beforeSend:function(){
					$("#response").html('<p class="reg_notes">Checking<br /><br /><img src="/img/loader.gif" /></p>')
				},
				success:function(e){
					$("#response").hide().fadeIn(500).html(e)
				}
			})
		}
		function accessltrm(){
			$.ajax({
				type:"POST",
				url:"/sites/accessltrm.php",
				data:"access="+document.getElementById("access").value,
				beforeSend:function(){
					$("#response").html('<p class="reg_notes">Checking<br /><br /><img src="/img/loader.gif" /></p>')
				},
				success:function(e){
					$("#response").hide().fadeIn(500).html(e)
				}
			})
		}
		function createKey(){
			var e=escape(document.getElementById("name").value);
			var t=document.getElementById("mail").value;
			var n=escape(document.getElementById("agency").value);
			$.ajax({
				type:"POST",
				url:"/sites/createKey.php",
				data:"name="+e+"&mail="+t+"&agency="+n,
				beforeSend:function(){
					$("#response").html('<p class="reg_notes">Checking<br /><br /><img src="/img/loader.gif" /></p>')
				},
				delay:{time:5e3},
				success:function(e){
					$("#response").hide().fadeIn(500).html(e)
				}
			})
		}

		var ua=$.browser;
		if(ua.mozilla){
			$("head").append('<link rel="stylesheet" href="/gui/ff.css" media="screen" type="text/css" />')
		}

		</script>

		</head>

		<body
			<?php
				if (isset($_GET['s']) AND $_GET['s'] == "books") {
					echo "class=\"books\"";
				} elseif (isset($_GET['s']) AND $_GET['s'] == "cuts") {
					echo "class=\"cuts\"";
				} elseif(isset($_GET['s']) AND $_GET['s'] == "lightroom") {
					echo "class=\"lightroom\"";
				}
		 ?>
		>

			<div id="turn-device"></div>

			<a name="top"></a>
			<?php
				$s = array();
				$s['about'] = "sites/about.php";
				$s['books'] = "sites/books.php";
				$s['one'] = "sites/one.php";
				$s['cuts'] = "sites/cuts.php";
				$s['lightroom'] = "sites/lightroom.php";
				$s['login'] = "sites/login.php";

				include("sites/header.php");

				if(isset($_GET['s'])) {
					include $s[$_GET['s']];
				}

				if ($detect->isMobile() && !$detect->isTablet()) {
			?>

			<div id="flipMenuMobile">
				<div id="blender">
				</div>
				<div id="books">
					<a href="/books/"<?php echo "$_set_mobileMenuBooks"; ?>/>Books</a>
				</div>
				<div id="cuts">
					<a href="/cuts/0/1/"<?php echo "$_set_mobileMenuCuts"; ?>/>Cuts</a>
				</div>
				<div id="about">
						<?php

							$sql_info = "

							SELECT

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

							$result_info = mysql_query($sql_info) OR die("<pre>".$sql_info."</pre>".mysql_error());
							$row_info = mysql_fetch_assoc($result_info);

						?>

						<!--
						<p class="text">
						<?php
							echo "".htmlentities($row_info['about_txt'], ENT_QUOTES)."\n";
						?>
						</p>

						<p class="bull">&bull;</p>
						-->

						<p class="caption">Represented by</p>
						<p class="text">
							AK/KRUSE<br/>
							<a href="tel:+494042326810">+49 40-42 32 68 10</a><br/>
							<u><a href="http://www.akkruse.com" target="_blank">www.akkruse.com</a></u><br/>
							<br/>
							HALL&amp;LUNDGREN<br/>
							<a href="tel:+46707556619">+46 707-556 619</a><br/>
							<u><a href="http://hallundgren.com/" target="_blank">www.hallundgren.com</a></u>
							<!--
							<?php
							echo "".htmlentities($row_info['agency'], ENT_QUOTES)."<br />\n";
							if($row_info['name_r'] !="") {
								echo "".htmlentities($row_info['name_r'], ENT_QUOTES)."<br />\n";
							} else { ""; }
							echo "".htmlentities($row_info['phone_r'], ENT_QUOTES)."<br />\n";
							echo "<a href=\"http://".htmlentities($row_info['web_r'], ENT_QUOTES)."\" target=\"_blank\"><u>".htmlentities($row_info['web_r'], ENT_QUOTES)."</u></a>\n";
							?>
							-->
						</p>

						<p class="bull">&bull;</p>

						<p class="caption">Contact</p>
						<p class="text">
							Sabrina Theissen<br/>
							<a href="tel:+491774885817">+49 177 488 58 17</a><br/>
							<!--
							<?php
							echo "".htmlentities($row_info['name'], ENT_QUOTES)."<br />\n";
							echo "".htmlentities($row_info['mobile'], ENT_QUOTES)."<br />\n";
							?>
							-->
							<?php
							echo "<a href=\"mailto:".htmlentities($row_info['mail'], ENT_QUOTES)."&#064;&#115;&#097;&#098;&#114;&#105;&#110;&#097;&#116;&#104;&#101;&#105;&#115;&#115;&#101;&#110;&#046;&#099;&#111;&#109;\"><u>".htmlentities($row_info['mail'], ENT_QUOTES)."&#064;&#115;&#097;&#098;&#114;&#105;&#110;&#097;&#116;&#104;&#101;&#105;&#115;&#115;&#101;&#110;&#046;&#099;&#111;&#109;</u></a>\n";
							?>
							<br/>
							<a href="https://www.instagram.com/sabrinatheissen/" target="_blank">Instagram</a>
						</p>

						<p class="bull">&bull;</p>

						<p class="caption">Among her clients are</p>
						<p class="text">

						<?php
							$sql_clients = "
								SELECT
								ID,
								name,
								public
								FROM	clients
								WHERE	public = 'public'
								ORDER BY name ASC
							";
							$result_clients = mysql_query($sql_clients) OR die("<pre>".$sql_clients."</pre>".mysql_error());
							while($row_clients = mysql_fetch_assoc($result_clients)) {
								echo "".htmlentities($row_clients['name'], ENT_QUOTES)."<br />\n";
							}
						?>
					</p>

				</div>

			</div>

		<?php  }  ?>

		<script type="text/javascript">
			$('video').mediaelementplayer().bind('ended',function () { $(this).parents('.mejs-inner').find('.mejs-poster').show(); });
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
			var pageTracker = _gat._getTracker("UA-316017-3");
			pageTracker._initData();
			pageTracker._trackPageview();
		</script>

	</body>
</html>
