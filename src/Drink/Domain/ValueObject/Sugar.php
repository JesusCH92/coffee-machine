<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Drink\Domain\ValueObject;

use GetWith\CoffeeMachine\Drink\Domain\Exception\AmountSugarIsNotBetweenZeroAndTwo;

final class Sugar
{
    private int $amountSugar;

    public function __construct(int $amountSugar)
    {
        $this->guardIfAmountIsBetweenZeroAndTwo($amountSugar);
        $this->amountSugar = $amountSugar;
    }

    public function amountSugar(): int
    {
        return $this->amountSugar;
    }

    private function guardIfAmountIsBetweenZeroAndTwo(int $amountSugar)
    {
        if ($amountSugar < 0 || $amountSugar > 2) {
            throw new AmountSugarIsNotBetweenZeroAndTwo((string)$amountSugar);
        }
    }

    private function amountSugarIsGreaterThanZero(): bool
    {
        return $this->amountSugar > 0 ? true : false;
    }

    public function stickMessage(): string
    {
        $stickMsg = ' with ' . $this->amountSugar . ' sugars (stick included)';
        return $this->amountSugarIsGreaterThanZero() ? $stickMsg : '';
    }
}