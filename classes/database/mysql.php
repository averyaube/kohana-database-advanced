<?php defined('SYSPATH') or die('No direct script access.');

class Database_MySQL extends Kohana_Database_MySQL implements Database_Transaction {

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

}