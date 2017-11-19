<?php

class Search {

    private $content = '';

    function __construct($form_action, $input_placeholder, $submit_value, $x, $y) {
        $this->content = "<div id='search_panel' style='left:" . $x . "px; top:" . $y . "px'>";
        $this->content .= "<form action='" . $form_action . "' method='post'>";
        $this->content .= "<input type='text' name='search' id='search' placeholder='" . $input_placeholder . "'>";
        $this->content .= "<input type='submit' value='" . $submit_value . "' class='ButtonSearch'>";
        $this->content .= "</form>";
        $this->content .= "</div>";
    }

    public function render() {
        echo $this->content;
    }

}
