<?php

namespace GetWith\CoffeeMachine\Console;

use Exception;
use GetWith\CoffeeMachine\Drink\ApplicationService\DTO\OrderDrinkRequest;
use GetWith\CoffeeMachine\Drink\ApplicationService\OrderDrink;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MakeDrinkCommand extends Command
{
    protected static $defaultName = 'app:order-drink';

    private OrderDrink $orderDrink;

    public function __construct(OrderDrink $orderDrink)
    {
        parent::__construct(MakeDrinkCommand::$defaultName);
        $this->orderDrink = $orderDrink;
    }


    protected function configure(): void
    {
        $this->addArgument(
            'drink-type',
            InputArgument::REQUIRED,
            'The type of the drink. (Tea, Coffee or Chocolate)'
        );

        $this->addArgument(
            'money',
            InputArgument::REQUIRED,
            'The amount of money given by the user'
        );

        $this->addArgument(
            'sugars',
            InputArgument::OPTIONAL,
            'The number of sugars you want. (0, 1, 2)',
            0
        );

        $this->addOption(
            'extra-hot',
            'e',
            InputOption::VALUE_NONE,
            $description = 'If the user wants to make the drink extra hot'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $orderMsg = ($this->orderDrink)(
                new OrderDrinkRequest(
                    $input->getArgument('drink-type'),
                    $input->getArgument('money'),
                    $input->getArgument('sugars'),
                    $input->getOption('extra-hot')
                )
            );

            $output->writeln($orderMsg);
        } catch (Exception $e) {
            $output->writeln($e->getMessage());
        }

        return 0;
    }
}
