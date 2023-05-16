<?php declare(strict_types=1);

namespace App\Controllers;

use App\ApiRequest;
use App\Core\View;

class Controller
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

    public function users(): View
    {
        $users = $this->client->fetchUsers();

        return new View('users.twig', ['users' => $users]);
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

    public function user(array $vars): View
    {
        $userId = (int)implode('', $vars);
        $user = $this->client->fetchUser($userId);

        if (!$user) {
            return new View('notFound.twig', []);
        }

        $articles = $this->client->fetchArticlesByUser($userId);

        return new View('singleUser.twig', ['user' => $user, 'articles' => $articles]);
    }
}