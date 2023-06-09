<?php

namespace App\Services\Article\Show;

class ArticleRequest
{
    private int $articleId;
    public function __construct(int $articleId)
    {
        $this->articleId = $articleId;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

}