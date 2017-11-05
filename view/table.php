<?php
class Table
{
    private $content = '';
    private $columns = '';
    private $width = 0;
    private $height = 0;
    
    function __construct($title, $height, $x, $y)
    {
        $this->height = $height;
        $this->content = "<div id='table' style='height:".$height."px; left:".$x."px; top:".$y."px'>".$title."<dr>";
        $this->content .= "<div id='table_content'>";
    }
    
    public function addColunm($title, $size)
    {
        $this->width += $size;
        $this->columns .= "<th style='width: ".$size."px'>".$title."</th>";
    }
    
    public function setData($data)
    {
        $this->content .= "<table style='width: ".$this->width."px;'>";
        $this->content .= "<thead>";
        $this->content .= "<tr>";
        $this->content .= $this->columns;
        $this->content .= "</tr>";
        $this->content .= "</thead>";
        $this->content .= "<tbody style='height: ".($this->height - 80)."px;'>";
        
        //$this->content .= "<tr>";
        //$this->content .= "<td></td>";
        //$this->content .= "</tr>";

        
        $this->content .= "</tbody>";
        $this->content .= "</table>";
    }
    
    public function render()
    {
        $this->content .= "</div>";
        $this->content .= "</div>";
        echo $this->content;
    }
}