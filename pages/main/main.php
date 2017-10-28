<?php 
error_reporting(0);
session_start();
include "../../data/const.php"; 
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="SHORTCUT ICON" href="../../img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../../style/body.css" media="screen">
<link rel="stylesheet" type="text/css" href="../../style/view.css" media="screen">
<link rel="stylesheet" type="text/css" href="../../style/default.css" media="screen">
<title><?=$PROJECT_NAME?></title>
</head>
<body>
	<div id="wrapper">
		<!-- HEADER -->
		<?php include "../../view/header/header.php"; ?>

		<!-- SIDEBAR LEFT -->
		<?php include "../../view/sidebar/left.php"; ?>

		<!-- SIDEBAR RIGHT -->
		<?php include "../../view/sidebar/right.php"; ?>

		<!-- CONTENT -->	
		<div id="content">
			<h1>Main</h1>
		</div>

		<!-- FOOTER -->
		<?php include "../../view/footer/footer.php";?>
	</div>
</body>
</html>