<?php
declare(strict_types=1);

require 'Model/Calculator.php';
require 'Model/Customer.php';
require 'Model/Group.php';
require 'Model/Product.php';

require 'Controller/Controller.php';

$controller = new Controller();
$controller->render();

