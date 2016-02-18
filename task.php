#! /usr/bin/env php

<?php

require 'vendor/autoload.php';

use Kagga\AddCommand;
use Kagga\DatabaseAdapter;
use Kagga\ShowCommand;
use Symfony\Component\Console\Application;

$app = new Application('Tasks', '1.0');

try {

    $pdo = new PDO('sqlite:db.sqlite');

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $exception) {

    echo 'could not connect to the database: error ' . $exception->getMessage();

    exit(1);
}

$database = new DatabaseAdapter($pdo);

$app->add(new ShowCommand($database));

$app->add(new AddCommand($database));

$app->run();