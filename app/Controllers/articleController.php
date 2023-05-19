<?php declare(strict_types=1);

namespace App\Controllers;

use App\ApiRequest;
use App\Core\View;

class articleController
{
    private ApiRequest $client;

    public function __construct()
    {
        $this->client = new ApiRequest();
    }

    public function articles(): View
    {
        $articles = $this->client->fetchArticles();

        return new View('articles.twig', ['articles' => $articles]);
    }

    public function singleArticle(array $vars): View
    {
        $articleId = (int)implode('', $vars);
        $article = $this->client->fetchSingleArticle($articleId);

        if (!$article) {
            return new View('notFound.twig', []);
        }

        $comments = $this->client->fetchCommentsByArticle($articleId);

        return new View('singleArticle.twig', ['article' => $article, 'comments' => $comments]);
    }
}
