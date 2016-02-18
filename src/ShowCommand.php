<?php


namespace Kagga;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShowCommand extends Command
{
    /**
     * @var DatabaseAdapter
     */
    private $database;

    /**
     * ShowCommand constructor.
     * @param DatabaseAdapter $database
     */
    public function __construct(DatabaseAdapter $database)
    {
        $this->database = $database;

        parent::__construct();
    }

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

    /**Show the tasks from the database.
     *
     * @param $output
     */
    private function showTasks($output)
    {
        $tasks = $this->database->fetchAll('tasks');

        $table = new Table($output);

        $table->setHeaders(['id', 'Description'])
            ->setRows($tasks)
            ->render();
    }

}