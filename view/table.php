<?php
class Table
{
    private $content = '';
    private $columns;
    
    function __construct($title, $height, $x, $y)
    {
        $this->content = "<div id='table' style='height:".$height."px; left:".$x."px; top:".$y."px'>".$title."<dr>";
        $this->content .= "<div id='table_content'>";
        $this->content .= "<table>";
        $this->content .= "<thead>";
        $this->content .= "<tr>";
    }
    
    public function addColunm($name, $size)
    {
        $this->columns[$name] = array('name'=>$name, 'size'=>$size);
        $this->content .= "<th style=''>".$name."</th>";
    }
    
    public function setData()
    {
        $this->content .= "</tr>";
        $this->content .= "</thead>";
        $this->content .= "<tbody>";
        
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