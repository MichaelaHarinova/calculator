<?php
declare(strict_types=1);

//include all your model files here
require 'Model/Customer.php';
//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/GroupController.php';

//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!

$controller = new HomepageController();
if(isset($_GET['page']) && $_GET['page'] === 'info') {
    $controller = new GroupController();
}


$controller->render($_GET, $_POST);