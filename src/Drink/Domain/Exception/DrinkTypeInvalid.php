<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Drink\Domain\Exception;

use Exception;
use Throwable;

final class DrinkTypeInvalid extends Exception
{
    public function __construct(string $value, $code = 0, Throwable $previous = null)
    {
        parent::__construct(
            sprintf('The drink type should be tea, coffee or chocolate.', $value),
            $code,
            $previous
        );
    }
}