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

$app->add(function ($req, $res, $next) {
  $response = $next($req, $res);
  return $response
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Headers', '*')
    ->withHeader('Access-Control-Allow-Methods', '*');
});

$app->get('/random-prefecture', function (Request $request, Response $response) {
  $sql = 'select * from kvs1';
  $sth = pdo()->prepare($sql);
  $sth->execute();

  // [{"_key":"三重県","_value":"津市"},{"_key":"京都府","_value":"京都市"},...]
  $beans = $sth->fetchAll(PDO::FETCH_ASSOC);

  $prefectures = [];
  foreach ($beans as $bean) {
    $prefectures[] = $bean["_key"];
  }
  shuffle($prefectures);

  $randomPrefecture = $prefectures[0];
  $data = ['prefecture' => $randomPrefecture];
  return $response->withJson($data, 200, JSON_UNESCAPED_UNICODE);
});

$app->run();
