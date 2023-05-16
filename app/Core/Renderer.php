<?php declare(strict_types=1);

namespace App\Core;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class Renderer
{
    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader('../app/Views');
        $this->twig = new Environment($loader);
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function render(View $view): string
    {
        return $this->twig->render($view->getTemplatePath(), $view->getParameters());
    }
}