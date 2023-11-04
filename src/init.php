<?php

ini_set('display_errors', 1);

define( "BASE_PATH", __DIR__ );
$loader = require_once BASE_PATH . "/vendor/autoload.php";

/* Get plugins */
$plugins = [];
if (file_exists(BASE_PATH . "/plugins/plugins.php"))
{
    $plugins = require_once BASE_PATH . "/plugins/plugins.php";
}

/* Add autoloader */
$loader->addPsr4("Runtime\\",  __DIR__ . "/lib/Runtime/php");
$loader->addPsr4("Runtime\\Console\\",  __DIR__ . "/lib/Runtime.Console/php");
$loader->addPsr4("Runtime\\Crypt\\",  __DIR__ . "/lib/Runtime.Crypt/php");
$loader->addPsr4("Runtime\\ORM\\",  __DIR__ . "/lib/Runtime.ORM/php");
$loader->addPsr4("Runtime\\Unit\\",  __DIR__ . "/lib/Runtime.Unit/php");
$loader->addPsr4("Runtime\\Web\\",  __DIR__ . "/lib/Runtime.Web/php");
$loader->addPsr4("Runtime\\XML\\",  __DIR__ . "/lib/Runtime.XML/php");

/* Setup default handler */
\Runtime\rtl::set_default_exception_handler();

/* Modules */
$modules = [
    "Runtime",
    "Runtime.Crypt",
    "Runtime.ORM",
    "Runtime.Unit",
    "Runtime.Web",
    "Runtime.XML",
];

$obj = [
    "env" => [],
    "modules" => $modules,
    "loader" => $loader,
];

/* Load plugins */
foreach ($plugins as $plugin_class_name)
{
    call_user_func_array([$plugin_class_name, "loadPlugin"], $obj);
}

return $obj;