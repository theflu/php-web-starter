<?php
require_once __DIR__ . '/../lib/app.php';

use APIRouter\Router;

$router = new Router();

$router->loadRoutes(_LIB_ . '/routes');
$router->debug(_DEBUG_);

$router->dispatch();