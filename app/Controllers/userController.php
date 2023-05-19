<?php declare(strict_types=1);

namespace App\Controllers;

use App\ApiRequest;
use App\Core\View;

class userController
{
    private ApiRequest $client;

    public function __construct()
    {
        $this->client = new ApiRequest();
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
