<?php declare(strict_types=1);

use App\Core\Renderer;
use App\Core\Router;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

require_once '../vendor/autoload.php';

$path = Router::route();

$renderer = new Renderer();

try {
    echo $renderer->render($path);
} catch (LoaderError|SyntaxError|RuntimeError $e) {
}