<?php

require 'vendor/autoload.php';
require 'app/routes.php';

$handler = $routeInfo[1];
[$class, $method] = $handler;
(new $class)->$method();