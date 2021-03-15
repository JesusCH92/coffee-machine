#!/usr/bin/env php
<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use GetWith\CoffeeMachine\Console\MakeDrinkCommand;
use GetWith\CoffeeMachine\Drink\ApplicationService\OrderDrink;
use Symfony\Component\Console\Application;

$application = new Application();

$application->add(new MakeDrinkCommand(new OrderDrink()));

$application->run();
