<?php
declare(strict_types=1);

require 'Loader/ProductLoader.php';
require 'Loader/CustomerLoader.php';
require 'Loader/GroupLoader.php';

require 'Model/Calculator.php';
require 'Model/Connection.php';
require 'Model/Customer.php';
require 'Model/Group.php';
require 'Model/Product.php';

require 'Controller/Controller.php';

$controller = new Controller();
$controller->render();