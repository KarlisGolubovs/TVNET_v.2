<?php declare(strict_types=1);

namespace App\Console;

use App\Core\Container;
use App\Console\ArticleResponse;
use App\Console\UserResponse;

class Console
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function route(array $argv)
    {
        $commands = [
            'articles' => ArticleResponse::class,
            'users' => UserResponse::class
        ];

        $command = $argv[1] ?? null;
        $id = isset($argv[2]) ? (int)$argv[2] : null;

        if (array_key_exists($command, $commands)) {
            $response = $this->resolveCommand($commands[$command]);
            return $response->execute($id);
        }

        return null;
    }

    private function resolveCommand(string $commandClass)
    {
        return $this->container->get($commandClass);
    }
}
