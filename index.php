<?php
	include "data/const.php";
	include "data/config.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="SHORTCUT ICON" href="_images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="./style/body.css" media="screen">
<link rel="stylesheet" type="text/css" href="./style/auth.css" media="screen">
<title><?=$PROJECT_NAME?></title>
</head>
<body>
	<div id="wrapper">
		<div id="content">
			<?php
				include "auth/auth.php";
			?>
		</div>
		<div class="Clear"></div>
	</div>
</body>
</html>
