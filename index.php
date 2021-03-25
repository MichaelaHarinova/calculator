<?php
declare(strict_types=1);

require 'View/includes/header.php';

require 'Model/Calculator.php';
require 'Model/Connection.php';
require 'Model/Customer.php';
require 'Model/Group.php';
require 'Model/Product.php';

require 'Controller/Controller.php';

$controller = new Controller();
$controller->render();

if(isset($_POST['calculate'])){
    $controller-> renderPrice((int)$_POST['customerID'],(int)$_POST['productID']);
}

require 'View/includes/footer.php';

