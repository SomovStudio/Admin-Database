<?php
class Table
{
    private $content = '';
    private $columns = '';
    private $width = 0;
    private $height = 0;
    private $columnArray;
    
    function __construct($title, $height, $x, $y)
    {
        $this->height = $height;
        $this->content = "<div id='table' style='height:".$height."px; left:".$x."px; top:".$y."px'>".$title."<dr>";
        $this->content .= "<div id='table_content'>";
    }
    
    public function addColunm($name, $title, $size)
    {
        $this->width += $size;
        $this->columns .= "<th style='width: ".$size."px'>".$title."</th>";
        $this->columnArray[$name] = array('title'=>$title, 'size'=>$size);
    }
    
    public function setData($dataTable)
    {
        $this->content .= "<table style='width: ".$this->width."px;'>";
        $this->content .= "<thead>";
        $this->content .= "<tr>";
        $this->content .= $this->columns;
        $this->content .= "</tr>";
        $this->content .= "</thead>";
        $this->content .= "<tbody style='height: ".($this->height - 80)."px;'>";
        
        while($row = mysqli_fetch_assoc($dataTable))
        {
            $this->content .= "<tr>";
            foreach ($this->columnArray as $key => $value)
            {
                $this->content .= "<td style='width: ".$value['size']."px;'>".$row[$key]."</td>";
            }
            $this->content .= "</tr>";
        }
        
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