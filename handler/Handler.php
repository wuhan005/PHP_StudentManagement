<?php
/**
 * Handler.php
 *
 * Created in 2020/4/3 4:16 下午
 * Created by johnwu
 */

class Handler
{
    protected $DB;
    protected $check;

    public function __construct()
    {
        $this->DB = new Database();
        $this->check = new Check();
    }

    public function show(string $path, $var = array())
    {
        if (!file_exists('../views/' . $path)) {
            return;
        }

        extract($var);
        require_once('../core/function.php');
        include('../views/' . $path);
    }

    public function redirect(string $dist)
    {
        header('Location: ' . $dist);
        exit;
    }

    public function GET(string $key)
    {
        if (isset($_GET[$key])) {
            return $_GET[$key];
        }
        return '';
    }

    public function POST(string $key)
    {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        }
        return '';
    }

}