<?php defined('SYSPATH') or die('No direct script access.');


class DB extends Kohana_DB {

    public static function transaction(/*polymorphic*/)
    {
        $statements = func_get_args();

        if(count($statements) == 0)
            return TRUE;

        if ( ! $statements[0] instanceof Database_Transaction )
            throw new Database_Transaction_Exception('No database implementing Database_Transaction found');

        $db = array_shift($statements);

        $db->begin_transaction();

        try
        {
            foreach($statements as $statement)
            {
                $statement->execute($db);
            }
        }
        catch (Exception $e)
        {
            $db->rollback_transaction();
            return FALSE;
        }

        $db->commit_transaction();
        return TRUE;

    }

} // End DB