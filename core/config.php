<?php
/**
 * config.php
 *
 * Created in 2020/4/3 3:22 下午
 * Created by johnwu
 */

class Config
{
    private static $config = array(
        'DB_HOST' => 'localhost',
        'DB_USER' => 'root',
        'DB_PASSWORD' => 'root',
        'DB_NAME' => 'web_dev_class',
    );

    public static function Get(string $key)
    {
        return self::$config[$key];
    }
}