<?php

use League\Config\Configuration;
use Nette\Schema\Expect;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

// Define your eniacuration schema
$eniac = new Configuration([
    'database' => Expect::structure([
        'driver' => Expect::anyOf('pdo_mysql', 'postgresql', 'sqlite')->required(),
        'host' => Expect::string()->default('localhost'),
        'port' => Expect::int()->min(1)->max(65535),
        'database' => Expect::string()->required(),
        'username' => Expect::string()->required(),
        'password' => Expect::string()->nullable(),
    ]),
    'logging' => Expect::structure([
        'enabled' => Expect::bool()->default((bool) $_ENV['DEBUG'] == true),
        'path' => Expect::string()->assert(function ($path) { return \is_writeable($path); })->required(),
        'file' => Expect::string()->required(),
    ]),
    'doctrine' => Expect::structure([
      'proxy' => Expect::string()->assert(function ($path) { return \is_writable($path); })->required(),
    ]),
    'api' => Expect::structure([
      'version' => Expect::int()->min(1)->max(256),
    ]),
    'app' => Expect::structure([
      'label' => Expect::string()->required(),
    ]),
    'twig' => Expect::structure([
      'cache' => Expect::string()->required(),
    ]),
    'roles' => Expect::structure([
      'labels' => Expect::array()->required(),
    ]),
    'attributes' => Expect::structure([
      'labels' => Expect::array()->required(),
    ]),
    'analytics' => Expect::structure([
      'host' => Expect::string()->nullable()->default((string) $_ENV['ELASTIC_HOST']),
      'port' => Expect::int()->min(1)->max(65535)->nullable()->default((int) $_ENV['ELASTIC_PORT']),
      'index' => Expect::string()->nullable()->default((string) $_ENV['ELASTIC_INDEX']),
      'username' => Expect::string()->required()->default((string) $_ENV['ELASTIC_USER']),
      'password' => Expect::string()->required()->default((string) $_ENV['ELASTIC_PASS']),
    ]),
]);

// Set the values somewhere
$userProvidedValues = [
    'database' => [
        'driver' => 'pdo_mysql',
        'port' => 3306,
        'host' => 'localhost',
        'database' => $_SERVER['DATABASE'],
        'username' => $_SERVER['DB_USERNAME'],
        'password' => $_SERVER['PASSWORD'],
    ],
    'logging' => [
        'path' => __DIR__ . '/../log/',
        'file' => 'app.log',
        'enabled' => (bool) $_SERVER['DEBUG'],
    ],
    'doctrine' => [
      'proxy' => __DIR__ . '/../' .  $_ENV['PROXY'],
    ],
    'api' => [
      'version' => (int) $_SERVER['VERSION'],
    ],
    'app' => [
      'label' => $_SERVER['LABEL'],
    ],
    'twig' => [
      'cache' => $_SERVER['TWIG_CACHE'],
    ],
    'roles' => [
      'labels' => explode(',', $_SERVER['ROLES']),
    ],
    'attributes' => [
      'labels' => explode(',', $_SERVER['ATTRIBUTES']),
    ],
    'analytics' => [
      'host' => (string) $_SERVER['ELASTIC_HOST'],
      'port' => (int) $_SERVER['ELASTIC_PORT'],
      'index' => (string) $_SERVER['ELASTIC_INDEX'],
      'username' => (string) $_SERVER['ELASTIC_USER'],
      'password' => (string) $_SERVER['ELASTIC_PASS'],
    ],
];

// Merge those values into your eniacuration schema:
$eniac->merge($userProvidedValues);

// Read the values and do stuff with them
if ($eniac->get('logging.enabled')) {
    file_put_contents($eniac->get('logging.path') . $eniac->get('logging.file'),
     'Connecting to the database on ' . $eniac->get('database.host') . "\n", FILE_APPEND);
}
