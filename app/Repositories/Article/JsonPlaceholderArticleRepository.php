<?php declare(strict_types=1);

namespace App\Repositories\Article;

use App\Cache;
use App\Models\Article;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class JsonPlaceholderArticleRepository implements ArticleRepository
{
    private \http\Client $client;

    public function __construct()
    {
        $this->client = new \http\Client();
        ['base_uri' => 'https://jsonplaceholder.typicode.com'];
    }

    public function fetchAll(): array
    {
        // TODO: Implement fetchAll() method.
    }

    public function fetchById(int $id): ?Article
    {
        // TODO: Implement fetchById() method.
    }

    public function fetchByUserId(int $userId): array
    {
        // TODO: Implement fetchByUserId() method.
    }
}