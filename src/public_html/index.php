<?php
require '../lib/app.php';

use APIRouter\Router;

$router = new Router();

$router->loadRoutes(_LIB_ . '/routes');

$router->dispatch();