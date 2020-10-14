<?php 

require ("./autoload.php");

use Pool\Pool;


$cube = Pool::getObject();
$oval = Pool::getObject();
$rect = Pool::getObject();
$circle = Pool::getObject();

$cube->setData("i'm a cube");
$oval->setData("i'm a Oval");
$rect->setData("i'm a rect");
$circle->setData("i'm a circle");

echo $cube->getData() ."\n";
echo $oval->getData() ."\n";
echo $rect->getData() ."\n";
echo $circle->getData() ."\n";

echo json_encode(Pool::getDataCounts()) ."\n";

Pool::releaseObject($oval);
Pool::releaseObject($rect);

echo json_encode(Pool::getDataCounts()) ."\n";


$triangle = Pool::getObject();

$triangle->setData("I'm a triangle");

echo $triangle->getData() ."\n";

echo json_encode(Pool::getDataCounts()) ."\n";

Pool::releaseObject($triangle);
Pool::releaseObject($circle);
Pool::releaseObject($cube);
echo "after full release :\n";
echo json_encode(Pool::getDataCounts()) ."\n";
