<?php
    function load_css($str = ''){
        $css_path = "public/stylesheets/{$str}.css";
        return $css_path;
    }

    function load_img($str = ''){
        $img_path = "public/images/$str";
        return $img_path;
    }

    function load_js($str = ''){
        $js_path = "public/js/{$str}.js";
        return $js_path;
    }