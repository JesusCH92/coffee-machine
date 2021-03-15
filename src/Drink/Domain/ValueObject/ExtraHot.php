<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Drink\Domain\ValueObject;

final class ExtraHot
{
    private bool $flag;

    public function __construct(bool $flag)
    {
        $this->flag = $flag;
    }

    public function flag(): bool
    {
        return $this->flag;
    }

    public function extraHotMsg(): string
    {
        return $this->flag ? ' extra hot' : '';
    }
}