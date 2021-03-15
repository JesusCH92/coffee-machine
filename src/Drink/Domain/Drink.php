<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Drink\Domain;

use GetWith\CoffeeMachine\Drink\Domain\ValueObject\DrinkType;
use GetWith\CoffeeMachine\Drink\Domain\ValueObject\ExtraHot;
use GetWith\CoffeeMachine\Drink\Domain\ValueObject\Money;
use GetWith\CoffeeMachine\Drink\Domain\ValueObject\Sugar;

final class Drink
{
    private DrinkType $drinkType;

    private Money $money;

    private Sugar $sugar;

    private ExtraHot $extraHot;

    public function __construct(DrinkType $drinkType, Money $money, Sugar $sugar, ExtraHot $extraHot)
    {
        $this->drinkType = $drinkType;
        $this->money = $money;
        $this->sugar = $sugar;
        $this->extraHot = $extraHot;
    }

    public function drinkType(): DrinkType
    {
        return $this->drinkType;
    }

    public function money(): Money
    {
        return $this->money;
    }

    public function sugar(): Sugar
    {
        return $this->sugar;
    }

    public function extraHot(): ExtraHot
    {
        return $this->extraHot;
    }
}