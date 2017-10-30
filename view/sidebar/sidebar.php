<?php
class Sidebar
{
    const SIDE_LEFT = 'side_left';
    const SIDE_RIGHT = 'side_right';
    
    private $content = '';
    private $select_side = '';
    
    function __construct($side = self::SIDE_LEFT)
    {
        $this->select_side = $side;
        if ($this->select_side === self::SIDE_LEFT){
            $this->content = "<div id='sidebar_left'>";
        }elseif ($this->select_side === self::SIDE_RIGHT){
            $this->content = "<div id='sidebar_right'>";
        }else{
            $this->select_side = self::SIDE_LEFT;
            $this->content = "<div id='sidebar_left'>";
        }
    }
    
    public function addTitle($title)
    {
        if ($this->select_side === self::SIDE_LEFT){
            $this->content .= "<div class='SidebarTitleLeft'>".$title."</div>";
        }else{
            $this->content .= "<div class='SidebarTitleRight'>".$title."</div>";
        }
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