<?php declare(strict_types=1);

namespace App\Models;

class Article
{
    private User $user;
    private int $id;
    private string $title;
    private string $body;
    private string $imageUrl;

    public function __construct(User $user, int $id, string $title, string $body, string $imageUrl)
    {
        $this->user = $user;
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->imageUrl = $imageUrl;
    }

    public static function find(int $articleId)
    {
        // Todo: Write function body
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }
}
