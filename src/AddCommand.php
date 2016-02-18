<?php


namespace Kagga;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends Command
{

    /**
     * Set up the Command
     */
    protected function configure()
    {
        $this->setName('add')
            ->setDescription('Add task to database')
            ->addArgument('description', InputArgument::REQUIRED, "Task description");
    }

    /**Execute the Command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $description = $input->getArgument('description');

        $this->database->query('insert into tasks(decription) values(:description)',
            compact('description'));

        $output->writeln("<info>Task Added!!</info>");
    }

}