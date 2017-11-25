<?php

class Board
{
	private $content = '';
    
	function __construct($title, $x, $y)
	{
		$this->content = "<div id='board'>" . $title . "<dr>";
        $this->content .= "<div id='board_content'>";
	}

	public function addLabel($title, $link, $description)
	{
		$this->content .= "<div class='BoardLabel'>";
		$this->content .= "<a href='" . $link . "'>" . $title . "</a>";
		$this->content .= "<p>" . $description . "</p>";
		$this->content .= "</div>";
	}

	public function render() {
        $this->content .= "</div>";
        $this->content .= "</div>";
        echo $this->content;
    }
}