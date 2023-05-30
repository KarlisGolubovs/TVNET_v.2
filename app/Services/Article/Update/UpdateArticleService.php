<?php

namespace App\Services\Article\Update;

use App\Models\Article;

class UpdateArticleService
{
    public function updateArticle(UpdateArticleRequest $request): UpdateArticleResponse
    {
        // Extract information from the request object
        $articleId = $request->getArticleId();
        $title = $request->getTitle();
        $content = $request->getContent();

        // Retrieve the existing article from the database or any other data source
        $article = Article::find($articleId);

        if (!$article) {
            // Handle the case where the article is not found, such as throwing an exception
        }

        // Update the article properties
        $article->setTitle($title);
        $article->setContent($content);

        // Save the updated article to the database or perform any necessary operations
        $article->save();

        // Return the response with the updated article ID
        return new UpdateArticleResponse($articleId);
    }
}
