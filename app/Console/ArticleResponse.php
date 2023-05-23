<?php

namespace App\Console;

use App\Models\Article;
use App\Models\Comment;
use App\Services\Article\IndexArticleService;
use App\Services\Article\Show\ArticleRequest;
use App\Services\Article\Show\ArticleService;

class ArticleResponse
{
    private IndexArticleService $indexArticleService;
    private ArticleService $showArticleService;

    public function __construct(IndexArticleService $indexArticleService, ArticleService $showArticleService)
    {
        $this->showArticleService = $showArticleService;
        $this->indexArticleService = $indexArticleService;
    }

    public function execute($id = null): void
    {
        if ($id === null) {
            $this->index();
        } else {
            $this->show($id);
        }
    }

    public function index(): void
    {
        $articles = $this->indexArticleService->execute();
        $this->renderIndex($articles);
    }

    public function show($id): void
    {
        $request = new ArticleRequest($id);
        $response = $this->showArticleService->execute($request);
        $this->renderArticle($response->getArticle());
        $this->renderComments($response->getComments());
    }

    private function renderIndex(array $articles): void
    {
        foreach ($articles as $article) {
            $this->renderArticle($article);
        }
    }

    private function renderArticle(Article $article): void
    {
        echo '[ Article title ] ' . $article->getTitle() . PHP_EOL;
        echo '[ body ] ' . $article->getBody() . PHP_EOL;
        echo '[ author: ] ' . $article->getAuthor()->getName() . PHP_EOL;
        echo '__________________________________________________' . PHP_EOL;
    }

    private function renderComments(array $comments): void
    {
        echo 'Comments: ' . PHP_EOL;
        foreach ($comments as $comment) {
            $this->renderComment($comment);
        }
    }

    private function renderComment(Comment $comment): void
    {
        echo '[ Comment title ]: ' . $comment->getName() . PHP_EOL;
        echo '[ body ]: ' . $comment->getBody() . PHP_EOL;
        echo '[ author ]: ' . $comment->getEmail() . PHP_EOL;
        echo '__________________________________________________' . PHP_EOL;
    }
}
