<?php


$query = rtrim($_SERVER['QUERY_STRING'], '/');

require "../vendor/libs/functions.php";
require "../vendor/core/Router.php";


Router::add('posts/add', ['controller' => 'Posts', 'action' => 'add']);

Router::add('posts', ['controller' => 'Posts', 'action' => 'index']);

Router::add('', ['controller' => 'Main', 'action' => 'index']);


print_arr(Router::getRoutes());

if (Router::matchRoute($query)) {
  print_arr(Router::getRoute());
} else {
  echo "404";
}
