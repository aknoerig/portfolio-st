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

		?>

<script>

	$(document).ready(function() {
	
		$(".confirm").click(function() {
			$('.getBtn').empty();
			$('.getBtn').append('<input type="button" name="submit" id="submit" value="Set Up" onclick="createKey()" class="reg_btn"/>');
		});
	
		$(".second").animate({'opacity' : '0'},0).hide();
		
			$(".do").click(function() {
					$(".first").animate({'opacity' : '0'},0).hide();
					$(".second").show().animate({'opacity' : '1'},300);			
			});

			$(".back").click(function() {
					$(".second").animate({'opacity' : '0'},0).hide();
					$(".first").show().animate({'opacity' : '1'},300);			
			});
		
	});

	</script>

		<p class="default">
			Access the whole archive and create your personal selection.
		</p>
		

		<h3 class="first">Enter Lightroom</h3>
		<h3 class="second">Set Up Account</h3>

			<div class="first">
				<form action="" method="post" accept-charset="ISO-8859-1">
					<input type="text" name="access" id="access" class="ltrm_inpt" value="Type in your key" onfocus="if(value == 'Type in your key') value = '';" onblur="if(value == '') value = 'Type in your key';" /><br />
					<input type="button" name="submit" id="submit" value="Enter" onclick="accessltrm()" class="reg_btn"/>
				</form>
			</div>
			<div class="second">
				<form action="" method="post" accept-charset="ISO-8859-1">
					<input type="text" name="name" id="name" class="ltrm_inpt" value="Your name" onfocus="if(value == 'Your name') value = '';" onblur="if(value == '') value = 'Your name';" /><br />
					<input type="text" name="agency" id="agency" class="ltrm_inpt" value="Your business" onfocus="if(value == 'Your business') value = '';" onblur="if(value == '') value = 'Your business';" /><br />
					<input type="text" name="mail" id="mail" class="ltrm_inpt" value="Your email address" onfocus="if(value == 'Your email address') value = '';" onblur="if(value == '') value = 'Your email address';" /><br />
					<?php echo "<p class=\"reg_notes\"><br />Please <a href=\"/cms/docs/".htmlentities($row_info['terms'], ENT_QUOTES)."\" target=\"_blank\" class=\"confirm active-less\">confirm</a> that you have carefully read the Terms of use.<br /><br /></p>\n"; ?>
					<div class="getBtn">
						<input type="button" value="Set Up" class="reg_btn_off"/>
					</div>
				</form>
			</div>
		
		<div id="response"></p></div>
		
		<p class="default create do first">( <span>Set up an account here</span> )</p>
		<p class="default create back second">( <span>Back</span> )</p>


