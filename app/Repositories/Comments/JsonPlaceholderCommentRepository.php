<?php declare(strict_types=1);

namespace App\Repositories\Comments;

use App\Cache;
use App\Models\Comment;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class JsonPlaceholderCommentRepository implements CommentRepository
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(
            ['base_uri' => 'https://jsonplaceholder.typicode.com',]
        );
    }

    public function fetchByArticleId(int $articleId): array
    {
        // TODO: Implement fetchByArticleId() method.
    }
}