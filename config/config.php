<?php

//set timezone
date_default_timezone_set('Europe/Berlin');

# Error Reporting
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', '1');

define('DOCROOT', dirname(__FILE__) . "/../public");

class Conf
{
    const DOCROOT = DOCROOT;
    const ENV = 'development';
    const PROJECTROOT = DOCROOT . "/..";
    const SRCROOT = DOCROOT . "/../src";
    const SITE_DOMAIN = '.localhost';
    const DIR = 'http://localhost:8080/';
    const DB_TYPE = 'mysql';
    const DB_HOST = 'db';
    const DB_NAME = 'phpevent';
    const DB_USER = 'phpevent';
    const DB_PASS = 'phpevent';
    const SESSION_PREFIX = 'rplan_';
    const SITE_TITLE = 'Events';
    const APPVERSION = '1.1';
    const SITE_LANG = 'en-us';
    // session timeout in minutes
    const SESSION_TIMEOUT = 10;
}
