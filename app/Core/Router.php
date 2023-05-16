<?php declare(strict_types=1);

namespace App\Core;

use FastRoute;
use FastRoute\Dispatcher;

class Router
{
    public static function route()
    {
        $dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
            $r->addRoute('GET', '/', ['App\Controllers\Controller', 'articles']);
            $r->addRoute('GET', '/articles', ['App\Controllers\Controller', 'articles']);
            $r->addRoute('GET', '/users', ['App\Controllers\Controller', 'users']);
            $r->addRoute('GET', '/article/{id:\d+}', ['App\Controllers\Controller', 'singleArticle']);
            $r->addRoute('GET', '/user/{id:\d+}', ['App\Controllers\Controller', 'user']);
        });
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);

        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
            case Dispatcher::METHOD_NOT_ALLOWED:
                return new View('notFound.twig', []);
            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                [$controllerClass, $action] = $handler;

                if (class_exists($controllerClass)) {
                    $controller = new $controllerClass();

                    if (method_exists($controller, $action)) {
                        return $controller->$action($vars);
                    } else {
                        return new View('notFound.twig', []);
                    }
                } else {
                    return new View('notFound.twig', []);
                }
        }
        return null;
    }
}
