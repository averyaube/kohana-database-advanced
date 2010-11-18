<?php defined('SYSPATH') or die('No direct script access.');

interface Kohana_Database_Transaction {

    public function begin_transaction();

    public function commit_transaction();

    public function rollback_transaction();
    
} // End Kohana_Database_Transaction