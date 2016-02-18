<?php


namespace Kagga;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CompleteCommand extends Command
{

    /**
     * Set up the Command
     */
    protected function configure()
    {
        $this->setName('complete')
            ->setDescription('Add id of completed task')
            ->addArgument('id', InputArgument::REQUIRED, 'Add id of completed task');
    }

    /**Execute the Command
     * Delete task from database.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $this->database->query("delete from tasks WHERE id = :id", compact('id'));

        $output->writeln('<info>Task Deleted!!</info>');

        $this->showTasks($output);
    }

}