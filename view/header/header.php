<div id="header">
	<img id="header_logo" src="../../img/logo.png" alt="logo image">
	<div id="header_title"><h2><?=Constants::$PROJECT_NAME?></h2></div>
	<div id="header_info">
		USER INFORMATION:
		<br><label>Login: <?=$_SESSION['login']?></label>
		<br><label>Date: <?=date('l jS \of F Y h:i:s A')?></label>
	</div>
</div>