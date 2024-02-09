<?php
require 'vendor/autoload.php';
$f3 = \Base::instance();
$f3->config("./app/configs/config.ini");

try {
    $f3->set('DB', new \DB\SQL('mysql:host=localhost;dbname=board','root', ''));
} catch (\PDOException $e) {
    if ($e->getCode() == 1049) {
        echo ("Vytvořte databázi s názvem board");
    }
    throw $e;
}

$f3->set('ONERROR', function($f3, $params) {
    if ($f3->get('ERROR.code') == 404) {
        echo ("Stránka nenalezena");
    }
});

$f3->run();
