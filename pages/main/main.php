<?php 
error_reporting(0);
session_start();
require_once "../../data/const.php"; 
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="SHORTCUT ICON" href="../../img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../../style/body.css" media="screen">
<link rel="stylesheet" type="text/css" href="../../style/view.css" media="screen">
<link rel="stylesheet" type="text/css" href="../../style/default.css" media="screen">
<title><?=Constants::$PROJECT_NAME?></title>
</head>
<body>
	<div id="wrapper">
		<?php if($_SESSION['authorization'] == false) header("Location: ../error/error.php?message=You do not login"); ?>

		<!-- HEADER -->
		<?php require_once "../../view/header/header.php"; ?>

		<!-- SIDEBAR LEFT -->
		<?php require_once "../../view/sidebar/left.php"; ?>

		<!-- SIDEBAR RIGHT -->
		<?php require_once "../../view/sidebar/right.php"; ?>

		<!-- CONTENT -->	
		<div id="content">
			<h1>Main</h1>
		</div>

		<!-- FOOTER -->
		<?php require_once "../../view/footer/footer.php";?>
	</div>
</body>
</html>