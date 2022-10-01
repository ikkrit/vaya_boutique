<?php

require_once 'database/DBController.php';

require_once 'database/Product.php';

require_once 'database/Cart.php';

//DBController
$db = new DBController();

//Product
$product = new Product($db);
$product_shuffle = $product->getData();

//Cart
$cart = new Cart($db);


