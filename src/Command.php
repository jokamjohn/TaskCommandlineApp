<?php


namespace Kagga;


use Symfony\Component\Console\Command\Command as SymfonyCommand;

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

}