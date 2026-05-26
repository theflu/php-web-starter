<?php
require '../vendor/autoload.php';

const _LIB_ = __DIR__;

// Configure twig
$loader = new \Twig\Loader\FilesystemLoader(_LIB_ . '/views');
$twig = new \Twig\Environment($loader, []);