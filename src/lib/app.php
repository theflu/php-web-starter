<?php
require 'config.php';
require '../vendor/autoload.php';

const _LIB_ = __DIR__;

// Configure twig
$loader = new \Twig\Loader\FilesystemLoader(_LIB_ . '/views');
$twig = new \Twig\Environment($loader, []);

// Add globals to twig
$twig->addGlobal('APP_NAME', _APP_NAME_);
$twig->addGlobal('CSS', _CSS_);