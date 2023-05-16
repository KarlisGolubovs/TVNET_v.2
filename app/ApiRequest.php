<?php declare(strict_types=1);

namespace App;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

class ApiRequest
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function fetchArticles(): array
    {
        try {
            $articleCollection = [];

            if (Cache::has('articles')) {
                $responseContent = Cache::get('articles');
            } else {
                $response = $this->client->get('https://jsonplaceholder.typicode.com/posts');
                $responseContent = $response->getBody()->getContents();
                Cache::save('articles', $responseContent);
            }

            foreach (json_decode($responseContent) as $article) {
                $articleCollection[] = $this->buildArticle($article);
            }

            return $articleCollection;
        } catch (GuzzleException $e) {
            return [];
        }
    }
    public function fetchUsers(): array
    {
        try {
            $userCollection = [];

            if (Cache::has('users')) {
                $responseContent = Cache::get('users');
            } else {
                $response = $this->client->get('https://jsonplaceholder.typicode.com/users');
                $responseContent = $response->getBody()->getContents();
                Cache::save('users', $responseContent);
            }

            foreach (json_decode($responseContent) as $user) {
                $userCollection[] = $this->buildUser($user);
            }

            return $userCollection;
        } catch (GuzzleException $e) {
            return [];
        }
    }
    public function fetchArticlesByUser(int $id): array
    {
        try {
            $cacheKey = 'articles_user_' . $id;
            $articleCollection = [];

            if (Cache::has($cacheKey)) {
                $responseContent = Cache::get($cacheKey);
            } else {
                $response = $this->client->get('https://jsonplaceholder.typicode.com/posts?userId=' . $id);
                $responseContent = $response->getBody()->getContents();
                Cache::save($cacheKey, $responseContent);
            }

            foreach (json_decode($responseContent) as $article) {
                $articleCollection[] = $this->buildArticle($article);
            }

            return $articleCollection;
        } catch (GuzzleException $e) {
            return [];
        }
    }

    public function fetchCommentsByArticle(int $id): array
    {
        try {
            $cacheKey = 'comments_' . $id;
            $commentCollection = [];

            if (Cache::has($cacheKey)) {
                $responseContent = Cache::get($cacheKey);
            } else {
                $response = $this->client->get('https://jsonplaceholder.typicode.com/comments?postId=' . $id);
                $responseContent = $response->getBody()->getContents();
                Cache::save($cacheKey, $responseContent);
            }

            foreach (json_decode($responseContent) as $comment) {
                $commentCollection[] = $this->buildComment($comment);
            }

            return $commentCollection;
        } catch (GuzzleException $e) {
            return [];
        }
    }

    public function fetchUser(int $id): ?User
    {
        try {
            $cacheKey = 'user_' . $id;

            if (Cache::has($cacheKey)) {
                $responseContent = Cache::get($cacheKey);
            } else {
                $response = $this->client->get('https://jsonplaceholder.typicode.com/users/' . $id);
                $responseContent = $response->getBody()->getContents();
                Cache::save($cacheKey, $responseContent);
            }

            return $this->buildUser(json_decode($responseContent));
        } catch (GuzzleException $e) {
            return null;
        }
    }

    public function fetchSingleArticle(int $id): ?Article
    {
        try {
            $cacheKey = 'article_' . $id;

            if (Cache::has($cacheKey)) {
                $responseContent = Cache::get($cacheKey);
            } else {
                $response = $this->client->get('https://jsonplaceholder.typicode.com/posts/' . $id);
                $responseContent = $response->getBody()->getContents();
                Cache::save($cacheKey, $responseContent);
            }

            return $this->buildArticle(json_decode($responseContent));
        } catch (GuzzleException $e) {
        return null;
        }
    }

    private function buildArticle(stdClass $article): Article
    {
        return new Article(
            $this->fetchUser($article->userId),
            $article->id,
            $article->title,
            $article->body,
            'https://placehold.co/600x400/gray/white?text=FaKe+News'
        );
    }



    private function buildUser(stdClass $user): User
    {
        return new User(
            $user->id,
            $user->name,
            $user->username,
            $user->email
        );
    }

    private function buildComment(stdClass $comment): Comment
    {
        return new Comment(
            $comment->postId,
            $comment->id,
            $comment->name,
            $comment->email,
            $comment->body
        );
    }
}