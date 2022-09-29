<?php

require_once 'database/DBController.php';

require_once 'database/Product.php';

//DBController
$db = new DBController();

//Product
$product = new Product($db);

