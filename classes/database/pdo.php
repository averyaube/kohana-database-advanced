<?php defined('SYSPATH') or die('No direct script access.');

class Database_PDO extends Kohana_Database_PDO implements Database_Transaction {

    function begin_transaction()
    {
        $this->_connection or $this->connect();
        $this->_connection->beginTransaction();
    }

    function commit_transaction()
    {
        $this->_connection or $this->connect();
        $this->_connection->commit();
    }

    function rollback_transaction()
    {
        $this->_connection or $this->connect();
        $this->_connection->rollBack();
    }

} // End Database_PDO