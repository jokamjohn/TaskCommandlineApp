<?php
/**
 * Created by PhpStorm.
 * User: jokamjohn
 * Date: 2/18/2016
 * Time: 2:53 AM
 */

namespace Kagga;


use PDO;

class DatabaseAdapter
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * DatabaseAdapter constructor.
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**Get all tasks from the database.
     *
     * @param $tableName
     * @return array
     */
    public function fetchAll($tableName)
    {
        return $this->connection->query("select * from " . $tableName)->fetchAll();
    }

    /**Query the database.
     *
     * @param $sql
     * @param $parameters
     * @return bool
     */
    public function query($sql, $parameters)
    {
        return $this->connection->prepare($sql)->execute($parameters);
    }
}