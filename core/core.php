<?php
/**
 * core.php
 *
 * Created in 2020/4/3 3:22 下午
 * Created by johnwu
 */

// Init whoops error handler
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// Load config
require_once('config.php');

// Init database
require_once('database.php');

// Init router
require_once('router.php');

// Checker router
require_once('checker.php');

// Router table
Router::GET('/', 'Main/index');
Router::GET('/add', 'Main/add');
Router::POST('/add', 'Main/addAction');

// Link start!
new Router();