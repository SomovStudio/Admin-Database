<?php require_once "../data/const.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="SHORTCUT ICON" href="../img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../style/body.css" media="screen">
<link rel="stylesheet" type="text/css" href="../style/error.css" media="screen">
<title><?=Constants::PROJECT_NAME?></title>
</head>
<body>
	<div id="wrapper">
		<div id="content">
			<div id='message_error'>Connect failed:<br><?=$_GET['message']?></div>
		</div>
		<div class="Clear"></div>
	</div>
</body>
</html>