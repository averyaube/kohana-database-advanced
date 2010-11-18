<?php defined('SYSPATH') or die('No direct script access.');

abstract class Database extends Kohana_Database {

    // Extra query types
    const TRANSACTION  =  5;
    const LOCK         =  6;

} // End Database