<?php defined('SYSPATH') or die('No direct script access.');


class DB extends Kohana_DB {

    public static function transaction(Database_Transaction $db, array $statements)
    {
        if(count($statements) == 0)
            return TRUE;

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

    public static function lock(Database_Lock $db, array $tables, array $statements)
    {
        if(count($statements) == 0)
            return TRUE;
        
        $db->lock($tables);

        try
        {
            foreach($statements as $statement)
            {
                $statement->execute($db);
            }
        }
        catch (Exception $e)
        {
            // Make sure the db unlocks before throwing an error
            $db->unlock();
            throw $e;
        }

        $db->unlock();
        return TRUE;
    }

} // End DB