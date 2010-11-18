<?php defined('SYSPATH') or die('No direct script access.');

class Database_MySQL extends Kohana_Database_MySQL implements Database_Transaction, Database_Lock {

    function begin_transaction()
    {
        $this->query(Database::TRANSACTION, DB::expr('BEGIN'));
    }

    function commit_transaction()
    {
        $this->query(Database::TRANSACTION, DB::expr('COMMIT'));
    }

    function rollback_transaction()
    {
        $this->query(Database::TRANSACTION, DB::expr('ROLLBACK'));
    }

    function lock(array $tables)
    {
        $table_list = array();
        foreach($tables as $table => $type)
        {
            $table_list[] = "{$table} {$type}";
        }

        $this->query(Database::LOCK, DB::expr('LOCK TABLES '.implode(', ', $table_list)));
    }

    function unlock()
    {
        $this->query(Database::LOCK, DB::expr('UNLOCK TABLES'));
    }

}