<?php

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates/');

$loader->addPath(__DIR__ . '/templates/shared', 'shared');
$loader->addPath(__DIR__ . '/templates/administration', 'admin');
$loader->addPath(__DIR__ . '/templates/user', 'user');
$loader->addPath(__DIR__ . '/templates/krugman', 'krugman');
$loader->addPath(__DIR__ . '/templates/brilius', 'brilius');

$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__. '/cache',
]);
