<?php

require __DIR__ . '/vendor/autoload.php';
require_once 'functions.php';

require_once 'db_config.php';


define('LIB_PATH', './');

error_reporting(E_ALL);
ini_set('display_errors', 1);

setTimezone();
//Epi::setPath('base', LIB_PATH);
Epi::setSetting('exceptions', true);
Epi::init('route', 'api');
//initApi(getApi());
//initRoute(getRoute());

getRoute()->get('/', 'home');
getRoute()->get('/lotto', 'lotto', EpiApi::external);


getRoute()->run();

function home() {
    echo "home";
}

function lotto() {
    $db_config = getDBConfig();

    $db = 'mysql:host='.$db_config['db_host'].';dbname='.$db_config['db_database'].';charset=utf8';
    try {
    $pdo = new \Slim\PDO\Database($db, $db_config['db_user'], $db_config['db_password']);

    $state = $pdo->select()->from('lotto');

    $stmt = $state->execute();
    $data = $stmt->fetchAll();
    return $data;
    } catch (\PDOException $e) {
        return null;
    }
    
}




?>
