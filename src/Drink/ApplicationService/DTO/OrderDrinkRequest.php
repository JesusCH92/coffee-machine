<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Drink\ApplicationService\DTO;

final class OrderDrinkRequest
{
    private string $drinkType;
    private float $money;
    private int $sugars;
    private bool $extraHot;

    public function __construct(
        string $drinkType,
        float $money,
        int $sugars,
        bool $extraHot
    ) {
        $this->drinkType = $drinkType;
        $this->money     = $money;
        $this->sugars    = $sugars;
        $this->extraHot  = $extraHot;
    }

    public function drinkType(): string
    {
        return $this->drinkType;
    }

    public function money(): float
    {
        return $this->money;
    }

    public function sugars(): int
    {
        return $this->sugars;
    }

    public function extraHot(): bool
    {
        return $this->extraHot;
    }
}