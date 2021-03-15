<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Drink\Domain\Exception;

use Exception;
use Throwable;

final class PriceIsNotEnough extends Exception
{
    public function __construct(string $drink, string $price, $code = 0, Throwable $previous = null)
    {
        parent::__construct(
            sprintf('The "%s" costs "%s".', $drink, $price),
            $code,
            $previous
        );
    }
}