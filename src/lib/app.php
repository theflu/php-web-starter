<?php
require 'config.php';
require '../vendor/autoload.php';

const _LIB_ = __DIR__;

// Configure twig
$loader = new \Twig\Loader\FilesystemLoader(_LIB_ . '/views');
$twig = new \Twig\Environment($loader, [
    'debug' => _DEBUG_,
    'cache' => '/tmp/twig_cache',
]);

// Add globals to twig
$twig->addGlobal('APP_NAME', _APP_NAME_);
$twig->addGlobal('CSS', _CSS_);
$twig->addGlobal('JS', _JS_);