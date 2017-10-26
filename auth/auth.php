<?php
	error_reporting(0);
	session_start();

	if(isset($_GET["event"])) $event = $_GET["event"];
	else $event = null;
?>

<?php if($event == 'check') { ?>

<?php 
	include "../data/config.php";
	
	$mysqli = mysqli_connect($SERVER, $ROOT_USER_NAME, $ROOT_USER_PASS, $DATABASE_USER);
	if (mysqli_connect_errno()) {
		header("Location: ../view/error/error.php?message=".mysqli_connect_error());
		exit();
	}
	mysqli_query($mysqli, "SET NAMES 'UTF8'");
	$queryText = "SELECT * FROM ".$TABLE_USER." WHERE (name = '".$_POST['login']."' AND pass = '".$_POST['pass']."')";
	$result = mysqli_query($mysqli, $queryText);
	if(mysqli_fetch_assoc($result)){
		$_SESSION['login'] = $USER_NAME;
		$_SESSION['password'] = $USER_PASS;

		header("Location: ../index.php");
	}else{
		header("Location: ../view/error/error.php?message=Incorrect username or password");
		exit();
	}
?>

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