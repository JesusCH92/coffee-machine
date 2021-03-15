<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Drink\Domain\ValueObject;

use GetWith\CoffeeMachine\Drink\Domain\Exception\DrinkTypeInvalid;

final class DrinkType
{
    public const COFFEE    = 'coffee';
    public const TEA       = 'tea';
    public const CHOCOLATE = 'chocolate';

    public static $allowedValues = [
        self::COFFEE,
        self::TEA,
        self::CHOCOLATE
    ];

    private string $type;

    public function __construct(string $type)
    {
        $this->guardIsAllowed(strtolower($type));
        $this->type = strtolower($type);
    }

    private function guardIsAllowed(string $type): void
    {
        if (!in_array($type, static::$allowedValues, true)) {
            throw new DrinkTypeInvalid($type);
        }
    }

    public function type(): string
    {
        return $this->type;
    }
}