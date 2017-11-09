<?php
class Table
{
    private $content = '';
    private $columns = '';
    private $width = 0;
    private $height = 0;
    private $columnArray;
    
    const TYPE_COLUMN = 'type_column';
    const TYPE_BUTTON_EDIT = 'type_button_edit';
    const TYPE_BUTTON_DELETE = 'type_button_delete';
    
    function __construct($title, $height, $x, $y)
    {
        $this->height = $height;
        $this->content = "<div id='table' style='height:".$height."px; left:".$x."px; top:".$y."px'>".$title."<dr>";
        $this->content .= "<div id='table_content'>";
    }
    
    private function getPath($parameters, $row)
    {
        $path = "";
        foreach ($parameters as $key => $value)
        {
            if($path !== "") $path .= "&";
            $path .= $value."=".$row[$value];
        }
        return $path;
    }
    
    public function addColunm($name, $title, $size)
    {
        $this->width += $size;
        $this->columns .= "<th style='width: ".$size."px'>".$title."</th>";
        $this->columnArray[$name] = array('type'=>self::TYPE_COLUMN, 'title'=>$title, 'size'=>$size);
    }
    
    public function addButtonEdit($action, $parameters = [])
    {
        $this->width += 50;
        $this->columns .= "<th class='TableColumnEdit'>...</th>";
        $this->columnArray['button_edit'] = array('type'=>self::TYPE_BUTTON_EDIT, 'action'=>$action, 'parameters'=>$parameters, 'size'=>50);
    }
    
    public function addButtonDelete($action, $parameters = [])
    {
        $this->width += 50;
        $this->columns .= "<th class='TableColumnDelete'>...</th>";
        $this->columnArray['button_delete'] = array('type'=>self::TYPE_BUTTON_DELETE, 'action'=>$action, 'parameters'=>$parameters, 'size'=>50);
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
                if($value['type'] == self::TYPE_COLUMN)
                {
                    $this->content .= "<td style='width: ".$value['size']."px;'>".$row[$key]."</td>";
                }
                elseif ($value['type'] == self::TYPE_BUTTON_EDIT)
                {
                    $this->content .= "<td style='width: ".$value['size']."px; text-align:center'>";
                    $this->content .= "<form action='".$value['action']."?".$this->getPath($value['parameters'], $row)."' method='post'>";
                    $this->content .= "<input type='submit' value='' class='TableButtonEdit'>";
                    $this->content .= "</form>";
                    $this->content .= "</td>";
                }
                elseif ($value['type'] == self::TYPE_BUTTON_DELETE)
                {
                    $this->content .= "<td style='width: ".$value['size']."px; text-align:center'>";
                    $this->content .= "<form action='".$value['action']."?".$this->getPath($value['parameters'], $row)."' method='post'>";
                    $this->content .= "<input type='submit' value='' class='TableButtonDelete'>";
                    $this->content .= "</form>";
                    $this->content .= "</td>";
                }
                
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