<?php
class Layout_Loader
{
    protected $layout = 'default';

    function setLayout($_layout){
        $this->layout = $_layout;
    }

    function load($data = []){
        extract($data);

        if ($this->layout === null) {
            echo $content;
            exit;
        }

        $layout_path = APP_PATH . "/views/layout/{$this->layout}.php";

        if(!file_exists($layout_path)){
            exit("$layout_path not found !");
        }

        require_once($layout_path);

    }
}