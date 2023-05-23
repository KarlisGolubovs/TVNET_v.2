<?php declare(strict_types=1);

namespace App\Repositories\Comments;

interface CommentRepository
{
    public function fetchByArticleId(int $articleId): array;

}