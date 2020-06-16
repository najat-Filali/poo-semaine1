<?php

use App\Core\Logger\FileLogger;
use App\Core\Tableau;

require __DIR__ . '/../vendor/autoload.php';


$tab = new Tableau(new FileLogger());
$tab->push(8);
$tab->push(12);
$tab->push(10);
$tab->push(4);
$tab->push(9);
$tab->push(5);
$tab->push(1);
$tab->push(1);

// $tab->sort();



// var_dump(count($tab));
$tab[0] = 'autre chose';
var_dump($tab[0]);


foreach($tab as $item )  {
    echo $item;
}

