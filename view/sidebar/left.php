<?php
	class SidebarLeft
	{
		
		private $content = "";

		function __construct()
		{
			$this->content = "<div id='sidebar_left'>";
		}

		public function addTitle($title)
		{
			$this->content .= "<div class='SidebarTitleLeft'>".$title."</div>";
		}

		public function addButton($value, $action)
		{
			$this->content .= "<form action='".$action."' method='post'>";
			$this->content .= "<input type='submit' value='".$value."' class='ButtonSidebar'>";
			$this->content .= "</form>";
		}

		public function render()
		{
			$this->content .= "</div>";
			echo $this->content;
		}
	}
?>


