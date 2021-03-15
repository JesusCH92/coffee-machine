<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Drink\Domain\ValueObject;

use GetWith\CoffeeMachine\Drink\Domain\Exception\PriceIsNotEnough;

final class Money
{
    public const TEA_PRICE       = 0.4;
    public const COFFEE_PRICE    = 0.5;
    public const CHOCOLATE_PRICE = 0.6;

    public static $drinkByPrice = [
        DrinkType::TEA       => self::TEA_PRICE,
        DrinkType::COFFEE    => self::COFFEE_PRICE,
        DrinkType::CHOCOLATE => self::CHOCOLATE_PRICE
    ];

    private float $price;

    public function __construct(float $price)
    {
        $this->price = $price;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function failIfIsNotPriceEnough(DrinkType $type)
    {
        $necessaryPrice = static::$drinkByPrice[$type->type()];
        if ($this->price < $necessaryPrice) {
            throw new PriceIsNotEnough($type->type(), (string)$necessaryPrice);
        }
    }

}