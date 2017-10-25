<?php
	error_reporting(0);
	session_start();

	if(isset($_GET["event"])) $event = $_GET["event"];
	else $event = null;
?>

<?php if($event == 'check') { ?>

<?php header("Location: ../index.php"); ?>

<?php } elseif($event == null) {?>

<div id="authorization"><p><?=$PROJECT_NAME?></p>
	<form action="./auth/auth.php?event=check" method="post">
	<br>
	<label for="login">Login:</label>
	<br>
	<input type="text" name="login" id="login" placeholder="Enter your login">
	<br><br>
	<label for="pass">Password:</label>
	<br>
	<input type="password" name="pass" id="pass" placeholder="Enter your password">
	<br><br>
	<input type="submit" value="OK" id="bottonOk">
	</form>
</div>

<?php } ?>