<?php 
error_reporting(0);
session_start();
include_once "../data/const.php"; 
include_once '../view/sidebar.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="SHORTCUT ICON" href="../img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../style/body.css" media="screen">
<link rel="stylesheet" type="text/css" href="../style/view.css" media="screen">
<link rel="stylesheet" type="text/css" href="../style/default.css" media="screen">
<title><?php echo Constants::PROJECT_NAME?></title>
</head>
<body>
	<div id="wrapper">
		<?php if($_SESSION['authorization'] == false) header("Location: ./error.php?message=You are not authorized"); ?>

		<!-- HEADER -->
		<?php require_once "../view/header.php"; ?>

		<!-- SIDEBAR LEFT -->
		<?php 
		$sidebarLeft = new Sidebar(Sidebar::SIDE_LEFT);
		$sidebarLeft->addTitle("Main sections:");
		$sidebarLeft->addButton("Home", "./main.php");
		$sidebarLeft->render();
		?>

		<!-- SIDEBAR RIGHT -->
		<?php
		$sidebarRight = new Sidebar(Sidebar::SIDE_RIGHT);
		$sidebarRight->addTitle("Relative sections:");
		$sidebarRight->addButton("News", "../tables/news/select.php");
		$sidebarRight->addButton("Articles", "../tables/articles/select.php");
		$sidebarRight->render();
		?>

		<!-- CONTENT -->	
		<div id="content">
			<h1>Welcome to administration database.</h1>
		</div>

		<!-- FOOTER -->
		<?php require_once "../view/footer.php";?>
	</div>
</body>
</html>