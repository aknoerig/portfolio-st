<?php

    include("../mysql.php"); 

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

		?>

		<p class="default">
			<?php echo "".htmlentities($row_info['about_txt'], ENT_QUOTES)."\n"; ?>	
		</p>
		
		<h3>Among her clients are</h3>
		<p class="default">
			<?php
			
			while($row_clients = mysql_fetch_assoc($result_clients)) {

			echo "".htmlentities($row_clients['name'], ENT_QUOTES)."<br />\n";
			
			}
			
			?>
				
		</p>

		<h3>Contact</h3>
		<p class="default">
		<?php
		echo "".htmlentities($row_info['name'], ENT_QUOTES)."<br />\n";
		echo "".htmlentities($row_info['street'], ENT_QUOTES)." ".htmlentities($row_info['no'], ENT_QUOTES)."<br />\n";
		echo "".htmlentities($row_info['zip'], ENT_QUOTES)." ".htmlentities($row_info['city'], ENT_QUOTES)."<br />\n";
		echo "<a href=\"mailto:".htmlentities($row_info['mail'], ENT_QUOTES)."&#064;&#115;&#097;&#098;&#114;&#105;&#110;&#097;&#116;&#104;&#101;&#105;&#115;&#115;&#101;&#110;&#046;&#099;&#111;&#109;\">".htmlentities($row_info['mail'], ENT_QUOTES)."&#064;&#115;&#097;&#098;&#114;&#105;&#110;&#097;&#116;&#104;&#101;&#105;&#115;&#115;&#101;&#110;&#046;&#099;&#111;&#109;</a>\n";
		?>
		</p>
		
		<h3>Represent</h3>
		<p class="default">
		<?php
		echo "".htmlentities($row_info['agency'], ENT_QUOTES)."<br />\n";
		if($row_info['name_r'] !="") {
		echo "".htmlentities($row_info['name_r'], ENT_QUOTES)."<br />\n";
		} else { ""; }
		echo "".htmlentities($row_info['phone_r'], ENT_QUOTES)."<br />\n";
		echo "<a href=\"http://".htmlentities($row_info['web_r'], ENT_QUOTES)."\" target=\"_blank\">".htmlentities($row_info['web_r'], ENT_QUOTES)."</a>\n";		
		?>	
		</p>

		<h3>Mailing list</h3>
		<form action="" method="post">
				<input type="text" name="mail" id="mail" class="reg_inpt" placeholder="your e-mail address" /><br />
				<input type="button" name="submit" id="submit" value="Subscribe" onclick="register()" class="reg_btn"/>
		</form>

		<div id="response"></div>
		
		<h3>Imprint</h3>
		<p class="default imprint">
		<?php
		echo "Copyright © Sabrina Theissen, ".date("Y").". ".htmlentities($row_info['imprint'], ENT_QUOTES)."\n";
		?>
		</p>

		<p class="default imprint">
		<?php
		echo "<br />VAT ID: ".htmlentities($row_info['ustnr'], ENT_QUOTES)."\n";
		?>
		</p>
		
		<p>UNSUB</p>
	
	<br /><br /><div id="footer"></div>

