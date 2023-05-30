<?php

namespace App\Services\Article\Create;

use App\Models\Article;

class CreateArticleService
{
    public function createArticle(CreateArticleRequest $request): CreateArticleResponse
    {
        $title = $request->getTitle();
        $content = $request->getContent();
        $authorId = $request->getAuthorId();

        $article = new Article();
        $article->setTitle($title);
        $article->setContent($content);
        $article->setAuthorId($authorId);

        $article->save();


        return new CreateArticleResponse($article->getId());
    }
}
