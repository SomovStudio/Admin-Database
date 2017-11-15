<?php
class Form
{
    private $content = '';
    
    function __construct($title, $action, $height, $x, $y) {
        $this->content = "<div id='form' style='height:".$height."px; left:".$x."px; top:".$y."px'>".$title."<dr>";
        $this->content .= "<div id='form_content'>";
        $this->content .= "<form action='".$action."' method='post'>";
    }

    public function addTextBox($name, $label, $placeholder, $value, $readonly = true) {
        $this->content .= "<br><label for='".$name."' class='Label'>".$label."</label>";
        if($readonly)
        {
            $this->content .= "<br><input type='text' name='".$name."' id='".$name."' placeholder='".$placeholder."' class='TextBox' value='".$value."'><br>";
        }else{
            $this->content .= "<br><input type='text' name='".$name."' id='".$name."' placeholder='".$placeholder."' class='TextBox' disabled value='".$value."'><br>";
        }
    }
    
    public function addComboBox($name, $label, $placeholder, $data_values, $value_default){
        $this->content .= "<br><label for='".$name."' class='Label'>".$label."</label>";
        $this->content .= "<br><select name='".$name."' id='".$name."' placeholder='".$placeholder."' class='ComboBox'>";
        foreach ($data_values as $key => $value)
        {
            if($value == $value_default){
                $this->content .= "<option value='".$value."' selected>".$value."</option>";
            }else{
                $this->content .= "<option value='".$value."'>".$value."</option>";
            }
        }
        $this->content .= "</select><br>";
    }

    public function addButtonSave($value = 'Save'){
        $this->content .= "<br><input type='submit' value='".$value."' class='ButtonSave'>";
    }

    public function render(){
        $this->content .= "</form>";
        $this->content .= "</div>";
        $this->content .= "</div>";
        echo $this->content;
    }
}

