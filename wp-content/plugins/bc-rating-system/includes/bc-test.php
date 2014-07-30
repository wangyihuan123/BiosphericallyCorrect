<?php

require_once "common.php";

function testMain($attributes) {
	global $array_category;
	echo $array_category;

	$output = '<hr />';
	echo "<br><br>";
	echo $_SERVER['REQUEST_URI'];
	echo "<br><br>";

	$output .= '
	<br />
	hello
	<br />
	';
		
	return $output;

}

function display_registration_form() {
?>
 <form method="post" action="user_register_handle.php">
 <table bgcolor="#cccccc">
   <tr>
     <td>Email address:</td>
     <td><input type="text" name="email" size="30" maxlength="100"/></td></tr>
   <tr>
     <td>Preferred username <br />(max 16 chars):</td>
     <td valign="top"><input type="text" name="username"
         size="16" maxlength="16"/></td></tr>
   <tr>
     <td>Password <br />(between 6 and 16 chars):</td>
     <td valign="top"><input type="password" name="passwd"
         size="16" maxlength="16"/></td></tr>
   <tr>
     <td>Confirm password:</td>
     <td><input type="password" name="passwd2" size="16" maxlength="16"/></td></tr>
   <tr>
     <td colspan=2 align="center">
     <input type="submit" value="Register"></td></tr>
 </table></form>
<?php

}

add_shortcode('bc_test', 'testMain');
add_shortcode('bc_test', 'display_registration_form');

?>