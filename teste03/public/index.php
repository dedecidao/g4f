<?php 

use app\core\Router;
use app\support\RequestType;

//autoload
require_once('../vendor/autoload.php');



session_start();

require_once '../app/database/config.php';
Router::run();

?>