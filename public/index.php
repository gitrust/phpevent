<?php

ob_start();

// include config data
require('../config/config.php');

// autoload third libs
require Conf::PROJECTROOT . '/vendor/autoload.php';

function autoloadsystem($class) {
   $filename = Conf::SRCROOT . "/core/" . strtolower($class) . ".php";
   if (file_exists($filename)) {
      require $filename;
   }

   $filename = Conf::SRCROOT . "/helpers/" . strtolower($class) . ".php";
   if (file_exists($filename)) {
      require $filename;
   }
}
spl_autoload_register("autoloadsystem");

set_exception_handler('logger::exception_handler');
set_error_handler('logger::error_handler');

$app = new Bootstrap();
$app->setController('page');
$app->init();

ob_flush();
