<?php

// Uncomment this line if you must temporarily take down your site for maintenance.
// require '.maintenance.php';

// Let bootstrap create Dependency Injection container.
$container = require __DIR__ . '/../app/bootstrap.php';

// absolute filesystem path to this web root
define('WWW_DIR', __DIR__);

// path to application folder
define('APP_DIR', __DIR__ . '/../app');

// Run application.
$container->application->run();
