<?php defined('SYSPATH') or die('No direct script access.');

interface Kohana_Database_Lock {

    public function lock(array $tables);

    public function unlock();
    
} // End Kohana_Database_Lock