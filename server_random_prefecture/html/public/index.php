<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../vendor/autoload.php';

function pdo()
{
  $dsn = 'mysql:dbname=docker_db;host=mysql';
  $user = 'docker_db_user';
  $password = 'docker_db_user_pass';
  $pdo = new PDO($dsn, $user, $password);
  return $pdo;
}

$app = new \Slim\App;

$app->get('/random-prefecture', function (Request $request, Response $response) {
  $data = ['data' => 'ランダムな都道府県の漢字'];
  return $response->withJson($data, 200, JSON_UNESCAPED_UNICODE);
});

$app->run();
