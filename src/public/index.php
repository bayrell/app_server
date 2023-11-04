<?php

ini_set('display_errors', 'on');
ini_set('html_errors', 'on');
set_time_limit(30);

/* Init context */
$init = require_once dirname(__DIR__) . "/init.php";

$init["modules"][] = "Admin.Backend";
$init["modules"][] = "Admin.Frontend";

/* Run web app */
\Runtime\rtl::runApp(
	
	/* Entry point */
	"App.Backend.Main",
	
	/* Modules */
	$init["modules"]
);
