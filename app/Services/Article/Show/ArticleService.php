<?php declare(strict_types=1);

namespace App\Services\Article\Show;

use App\Models\Article;

class ArticleService
{
    public function showArticle(ArticleRequest $request): ArticleResponse
    {
        $articleId = $request->getArticleId();

        $article = $this->fetchArticle($articleId);
        $comments = $this->fetchComments($articleId);

        return new ArticleResponse($article, $comments);
    }

    private function fetchArticle(int $articleId): ?Article
    {
        return null;
    }

    private function fetchComments(int $articleId): array
    {
        return $comments ?? [];
    }
}
