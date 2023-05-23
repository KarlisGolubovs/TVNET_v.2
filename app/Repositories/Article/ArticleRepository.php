<?php declare(strict_types=1);

namespace App\Repositories\Article;

use App\Models\Article;

interface ArticleRepository
{
    public function fetchAll(): array;

    public function fetchById(int $id): ?Article;

    public function fetchByUserId(int $userId): array;
}
