<?php

use App\Shop\Cart;
use App\Shop\Table;
use App\Shop\WoodType;

require __DIR__ . '/../vendor/autoload.php';


$cart = new Cart();

$cart->addToCart(new Table(WoodType::BASIQUE, 40, 10));
$cart->addToCart(new Table(WoodType::OAK, 90, 6));
$cart->removeFromCart(new Table(WoodType::OAK, 90, 6));


var_dump($cart->getTotalPrice());
