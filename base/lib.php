<?php

define('PROJECT_NAME', 'E-Learning Platform');
define('AUTHOR', 'Dev Fullstack Team');
define('URL_AUTHOR', 'https://15kdevfullstack.com');

define("CURRENT_DIR", dirname(__FILE__));
define('UPLOAD_DIR', '../../public/uploads/');

function redirect($url)
{
    header("Location: $url");
    exit();
}

function getUserLogin()
{
    if (isset($_SESSION['user'])) {
        return $_SESSION['user'];
    }

    return null;
}
