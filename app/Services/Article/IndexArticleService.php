<?php declare(strict_types=1);

namespace App\Services\Article;

use App\ApiRequest;

class IndexArticleService
{
    private ApiRequest $client;

    public function __construct()
    {
        $this->client = new ApiRequest();
    }
    public function execute(): array
    {
        return $this->client->fetchArticles();
    }
}


