<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Drink\ApplicationService\DTO;

final class OrderDrinkResponse
{
    private string $orderMessage;

    public function __construct(string $orderMessage)
    {
        $this->orderMessage = $orderMessage;
    }

    public function orderMessage(): string
    {
        return $this->orderMessage;
    }
}