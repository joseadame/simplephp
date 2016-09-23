<?php
namespace Example;

$dir = dirname(_FILE_);
require $dir .'/../vendor/autoload.php';

error_reporting(E_ALL);

$enviroment = 'development';

/**
* Registramos el error handler
*/

$whoops = new \Whoops\Run;
if ($environment !== 'production') {
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
} else {
    $whoops->pushHandler(function($e){
        echo 'Friendly error page and send an email to the developer';
    });
}

$whoops->register();

throw new \Exception;