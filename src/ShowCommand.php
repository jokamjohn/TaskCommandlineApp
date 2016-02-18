<?php


namespace Kagga;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShowCommand extends Command
{

    /**
     * Set up the Command
     */
    protected function configure()
    {
        $this->setName('show')
            ->setDescription('Show all tasks');
    }

    /**Execute the Command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->showTasks($output);
    }

}