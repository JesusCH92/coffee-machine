<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Drink\Domain\Exception;

use Exception;
use Throwable;

final class AmountSugarIsNotBetweenZeroAndTwo extends Exception
{
    public function __construct(string $value, $code = 0, Throwable $previous = null)
    {
        parent::__construct(
            sprintf('The number of sugars should be between 0 and 2.', $value),
            $code,
            $previous
        );
    }
}