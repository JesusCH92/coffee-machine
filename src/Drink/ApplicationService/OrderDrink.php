<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Drink\ApplicationService;

use GetWith\CoffeeMachine\Drink\ApplicationService\DTO\OrderDrinkRequest;
use GetWith\CoffeeMachine\Drink\ApplicationService\DTO\OrderDrinkResponse;
use GetWith\CoffeeMachine\Drink\Domain\Drink;
use GetWith\CoffeeMachine\Drink\Domain\ValueObject\DrinkType;
use GetWith\CoffeeMachine\Drink\Domain\ValueObject\ExtraHot;
use GetWith\CoffeeMachine\Drink\Domain\ValueObject\Money;
use GetWith\CoffeeMachine\Drink\Domain\ValueObject\Sugar;

final class OrderDrink
{
    public function __invoke(OrderDrinkRequest $orderDrinkRequest): OrderDrinkResponse
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

        return new OrderDrinkResponse(
            $this->orderDrinkMsg(
                $drink->drinkType()->type(),
                $drink->sugar()->stickMessage(),
                $drink->extraHot(
                )->extraHotMsg()
            )
        );
    }

    private function orderDrinkMsg (string $drinkType, string $sugarMsg, string $extraHotMsg): string
    {
        return 'You have ordered a ' . $drinkType . $extraHotMsg . $sugarMsg;
    }
}
