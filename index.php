<?php
    session_start();
    define('BASE_PATH', __DIR__);
    define('APP_PATH', BASE_PATH.'/app/frontend');
    define('BASE_URL', 'http://localhost/DO_AN');

    require BASE_PATH . '/config/constant.php';
    require_once BASE_PATH . '/core/Common.php';

    load_app();