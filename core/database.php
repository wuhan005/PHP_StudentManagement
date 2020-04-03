<?php
/**
 * database.php
 *
 * Created in 2020/4/3 3:22 下午
 * Created by johnwu
 */

class DB
{
    private function __construct()
    {
    }

    private static $DB;

    public static function getInstance()
    {
        if (self::$DB == NULL) {
            $db = new mysqli();
            self::$DB = $db;
        }
        return self::$DB;
    }
}