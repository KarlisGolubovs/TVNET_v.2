<?php declare(strict_types=1);

namespace App\Services\Article\Show\Article\Show;

use App\Models\Article;

class ArticleResponse
{
    private Article $article;
    private array $comments;
    public function __construct(Article $article, array $comments)
    {
        $this->article = $article;
        $this->comments = $comments;
    }
    public function getComments(): array
    {
        return $this->comments;
    }

    public function getArticle(): Article
    {
        return $this->article;
    }
}


