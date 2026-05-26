<?php

use APIRouter\ServerRequest;
use APIRouter\Response;

global $router;
global $twig;

$router->get('/hello', function (ServerRequest $req) use ($twig) {
    $body = $twig->render('index.twig');
    
    return new Response(200, [], $body);
});