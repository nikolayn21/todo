<?php

require './objects.php';

$mercedessC200 = new Car();
$mercedessC200->setBrand('Mercedess');
$mercedessC200->setModel('C200');
$mercedessC200->setBreaksType('Disc');
$mercedessC200->setCarType('Sedan');
$mercedessC200->setColor('silver'); 

$dacia = new Car();
$dacia->setBrand('Dacia');
$dacia->setModel('Logan');

echo 'Car 1: <br />';
echo 'Brand: ' . $mercedessC200->getBrand() . '<br />';
echo 'Model: ' . $mercedessC200->getModel() . '<br />';

$obj = new stdClass();
$obj->name = 'Test';