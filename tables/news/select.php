<?php
//error_reporting(0);
session_start();
require_once '../../data/const.php';
require_once '../../data/config.php';
require_once '../../data/db.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="SHORTCUT ICON" href="../../img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../../style/body.css" media="screen">
<link rel="stylesheet" type="text/css" href="../../style/view.css" media="screen">
<link rel="stylesheet" type="text/css" href="../../style/default.css" media="screen">
<title><?=Constants::PROJECT_NAME?></title>
</head>
<body>
	<div id="wrapper">
		<?php if($_SESSION['authorization'] == false) header("Location: ../../pages/error.php?message=You are not authorized"); ?>

		<!-- HEADER -->
		<?php require_once '../../view/header.php'; ?>
		
		<!-- SIDEBAR LEFT -->
		<?php 
		require_once '../../view/sidebar.php';
		$sidebarLeft = new Sidebar(Sidebar::SIDE_LEFT);
		$sidebarLeft->addTitle("Main sections:");
		$sidebarLeft->addButton("News", "../../tables/news/select.php");
		$sidebarLeft->addButton("Contents", "../../tables/content/select.php");
		$sidebarLeft->render();
		?>
		
		<!-- SIDEBAR RIGHT -->
		<?php
		require_once '../../view/sidebar.php';
		$sidebarRight = new Sidebar(Sidebar::SIDE_RIGHT);
		$sidebarRight->addTitle("Relative sections:");
		$sidebarRight->addButton("Contents of News", "../../tables/content/select.php");
		$sidebarRight->render();
		?>
	
        <!-- CONTENT -->	
		<div id="content">
		
			<!-- BUTTON ADD -->
			<?php 
			require_once '../../view/button.php';
			$buttonAdd = new Button('./select.php', 'Add', 30, 50, 5, 5);
			$buttonAdd->render();
			?>
			
			<!-- SEARCH -->
			<?php 
			require_once '../../view/search.php';
			$searchPanel = new Search('./select.php', 'Enter value to search', 'Search', 65, 5);
			$searchPanel->render();
			?>

			<!-- TABLE -->
			<?php 
			$dataTable = DB::select('SELECT * FROM news', Config::$Server, Config::$DatabaseMain, Config::$RootUserName, Config::$RootUserPass);
			
			require_once '../../view/table.php';
			$table = new Table('News', 350, 5, 40);
			$table->addColunm('news_id', 'ID', 50);
			$table->addButtonEdit('update.php', ['news_id']);
			$table->addButtonDelete('delete.php', ['news_id']);
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