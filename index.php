<?php

namespace Rafaelscouto\DesafioRevvo;

if(file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

use Rafaelscouto\DesafioRevvo\Core\Config;
use Rafaelscouto\DesafioRevvo\Core\Router;

session_start();

define('BASE_URL', Config::get('app.base_url'));

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/404', 'HomeController@notfound');

$router->get('/cursos/search', 'CursoController@search');

$router->get('/cursos', 'CursoController@index');
$router->get('/cursos/create', 'CursoController@create');
$router->post('/cursos/store', 'CursoController@store');
$router->get('/cursos/{id}', 'CursoController@show');
$router->get('/cursos/{id}/edit', 'CursoController@edit');
$router->post('/cursos/{id}/update', 'CursoController@update');
$router->post('/cursos/{id}/delete', 'CursoController@delete');

$router->run();

