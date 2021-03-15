<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Drink\ApplicationService;

use GetWith\CoffeeMachine\Drink\ApplicationService\DTO\OrderDrinkRequest;
use GetWith\CoffeeMachine\Drink\Domain\Drink;
use GetWith\CoffeeMachine\Drink\Domain\ValueObject\DrinkType;
use GetWith\CoffeeMachine\Drink\Domain\ValueObject\ExtraHot;
use GetWith\CoffeeMachine\Drink\Domain\ValueObject\Money;
use GetWith\CoffeeMachine\Drink\Domain\ValueObject\Sugar;

final class OrderDrink
{
    public function __invoke(OrderDrinkRequest $orderDrinkRequest): string
    {
        $drink = new Drink(
            new DrinkType($orderDrinkRequest->drinkType()),
            new Money($orderDrinkRequest->money()),
            new Sugar($orderDrinkRequest->sugars()),
            new ExtraHot($orderDrinkRequest->extraHot())
        );

        $drink->money()->failIfIsNotPriceEnough(
            $drink->drinkType()
        );

        return 'You have ordered a ' . $drink->drinkType()->type() .  $drink->sugar()->stickMessage() . $drink->extraHot()->extraHotMsg();
    }
}
