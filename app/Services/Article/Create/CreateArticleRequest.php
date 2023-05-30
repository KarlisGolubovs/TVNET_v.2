<?php

namespace App\Services\Article\Create;

class CreateArticleRequest
{
    private $title;
    private $content;
    private $authorId;

    public function __construct(string $title, string $content, int $authorId)
    {
        $this->title = $title;
        $this->content = $content;
        $this->authorId = $authorId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }
}
