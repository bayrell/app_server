<?php

ini_set('display_errors', 1);

define( "BASE_PATH", __DIR__ );
$loader = require_once BASE_PATH . "/vendor/autoload.php";

/* Add autoloader */
$loader->addPsr4("Runtime\\",  __DIR__ . "/lib/plugins/app-server-core");
$loader->addPsr4("Runtime\\",  __DIR__ . "/lib/plugins/bay-lang-core");

/* Setup default handler */
\Runtime\rtl::set_default_exception_handler();