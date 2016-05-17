<?php

    include("../mysql.php"); 

?>
		<h3 class="un-top">Leave mailing list</h3>
		<form action="" method="post">
				<input type="text" name="mail" id="mail" class="reg_inpt" value="Your email address" onfocus="if(value == 'Your email address') value = '';" onblur="if(value == '') value = 'Your email address';" /><br />
				<input type="button" name="submit" id="submit" value="Unsubscribe" onclick="unsub()" class="reg_btn"/>
		</form>

		<div id="response"></div>

