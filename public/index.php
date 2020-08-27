<?php


$query = rtrim($_SERVER['QUERY_STRING'], '/');

//echo $query;

require "../vendor/libs/functions.php";
require "../vendor/core/Router.php";



Router::add('^$', ['controller' => 'Main', 'action' => 'index']);

Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


print_arr(Router::getRoutes());

Router::dispatch($query);


