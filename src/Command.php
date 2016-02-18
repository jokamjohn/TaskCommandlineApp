<?php


namespace Kagga;


use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SymfonyCommand
{

    /**
     * @var DatabaseAdapter
     */
    public $database;

    /**
     * ShowCommand constructor.
     * @param DatabaseAdapter $database
     */
    public function __construct(DatabaseAdapter $database)
    {
        $this->database = $database;

        parent::__construct();
    }

    /**Show the tasks from the database.
     *
     * @param $output
     */
    protected function showTasks(OutputInterface $output)
    {
        $tasks = $this->database->fetchAll('tasks');

        if (!$tasks) {
            return $output->writeln("<info>No tasks yet</info>");
        }

        $table = new Table($output);

        $table->setHeaders(['id', 'Description'])
            ->setRows($tasks)
            ->render();
    }

}