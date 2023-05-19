<?php

namespace App\Services\Article\Show\Article\Show;

class ShowArticleRequest
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