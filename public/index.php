<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Core\Application();

/**
 * Here are two methods to define a new route:
 * 1. Use /controller/action/args patterns. It should work automatically
 * 2. Define a route manually like it was done down below
 */

$app->getRouter()->get('/', 'post@list');
$app->getRouter()->get('/page/{int:page}', 'post@list');
$app->getRouter()->get('/post/{int:id}', 'post@view');
$app->getRouter()->any('/post/{int:id}/edit', 'post@edit');
$app->getRouter()->get('/post/add', 'post@add');

$app->run();
