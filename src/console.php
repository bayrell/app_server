#!/usr/bin/php
<?php

use \Runtime\Map;
use \Runtime\rtl;

ini_set('display_errors', 'on');
ini_set('html_errors', 'on');
set_time_limit(-1);

/* Init context */
$init = require_once __DIR__ . "/init.php";

$init["modules"][] = "App.Console";

/* Run console app */
$exit_code = rtl::runApp(
    
    /* Entry point */
    'App.Console.Main',
    
    /* Modules */
    $init["modules"],
    
    /* Context parameters */
    new Map([
        'cli_args' => $argv,
    ])
);
exit($exit_code);
