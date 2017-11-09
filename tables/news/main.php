<?php
error_reporting(0);
session_start();
include_once '../../data/const.php';
include_once '../../data/config.php';
include_once '../../data/db.php';
include_once '../../view/sidebar.php';
include_once '../../view/button.php';
include_once '../../view/search.php';
include_once '../../view/table.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="SHORTCUT ICON" href="../../img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../../style/body.css" media="screen">
<link rel="stylesheet" type="text/css" href="../../style/view.css" media="screen">
<link rel="stylesheet" type="text/css" href="../../style/default.css" media="screen">
<title><?php echo Constants::PROJECT_NAME?></title>
</head>
<body>
	<div id="wrapper">
		<?php if($_SESSION['authorization'] == false) header("Location: ../../pages/error.php?message=You are not authorized"); ?>

		<!-- HEADER -->
		<?php require_once '../../view/header.php'; ?>
		
		<!-- SIDEBAR LEFT -->
		<?php 
		$sidebarLeft = new Sidebar(Sidebar::SIDE_LEFT);
		$sidebarLeft->addTitle("Main sections:");
		$sidebarLeft->addButton("News", "../../tables/news/main.php");
		$sidebarLeft->addButton("Contents", "../../tables/content/main.php");
		$sidebarLeft->render();
		?>
		
		<!-- SIDEBAR RIGHT -->
		<?php
		$sidebarRight = new Sidebar(Sidebar::SIDE_RIGHT);
		$sidebarRight->addTitle("Relative sections:");
		$sidebarRight->addButton("Contents of News", "../../tables/content/main.php");
		$sidebarRight->render();
		?>
	
        <!-- CONTENT -->	
		<div id="content">
		
			<!-- BUTTON ADD -->
			<?php 
			$buttonAdd = new Button('./main.php', 'Add', 30, 50, 5, 5);
			$buttonAdd->render();
			?>
			
			<!-- SEARCH -->
			<?php 
			$searchPanel = new Search('./main.php', 'Enter value to search', 'Search', 65, 5);
			$searchPanel->render();
			?>

			<!-- TABLE -->
			<?php 
			$dataTable = DB::select('SELECT * FROM news', Config::$Server, Config::$DatabaseMain, Config::$RootUserName, Config::$RootUserPass);
			
			$table = new Table('News', 350, 5, 40);
			$table->addColunm('news_id', 'ID', 50);
			$table->addButtonEdit('edit.php', ['news_id']);
			$table->addButtonDelete('remove.php', ['news_id']);
			$table->addColunm('news_date','Date', 100);
			$table->addColunm('news_name','Name', 150);
			$table->addColunm('news_description','Description', 400);
			$table->setData($dataTable);
			$table->render();
			?>

		</div>

		<!-- FOOTER -->
		<?php require_once "../../view/footer.php";?>
	</div>
</body>
</html>