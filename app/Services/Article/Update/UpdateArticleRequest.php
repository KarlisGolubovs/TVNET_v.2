<?php

namespace App\Services\Article\Update;

class UpdateArticleRequest
{
    private $articleId;
    private $title;
    private $content;

    public function __construct(int $articleId, string $title, string $content)
    {
        $this->articleId = $articleId;
        $this->title = $title;
        $this->content = $content;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}

