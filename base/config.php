<?php
include 'lib.php';

define('ENV_SERVER', 'Windows'); // macOS or Windows or Linux

// Database Connection
if (ENV_SERVER == 'macOS') {
    define('DB_SERVER', '127.0.0.1');
} else if (ENV_SERVER == 'Windows') {
    define('DB_SERVER', 'localhost');
} else if (ENV_SERVER == 'Linux') {
    define('DB_SERVER', 'localhost');
}
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'elearning');

$con = mysqli_connect(DB_SERVER, DB_USERNAME,
    DB_PASSWORD, DB_NAME);

if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>