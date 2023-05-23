<?php declare(strict_types=1);

namespace App\Core;

use DI\Container;
use DI\ContainerBuilder;
use App\Repositories\User\UserRepository;
use App\Repositories\Article\ArticleRepository;
use App\Repositories\Comments\CommentRepository;
use App\Services\Article\Show\ArticleService;

class Container
{
private static ?Container $container = null;

    /**
     * @throws Exception
     */
    public static function getContainer(): Container
{
if (self::$container === null) {
$builder = new ContainerBuilder();


$builder->addDefinitions([

UserRepository::class => DI\autowire(UserRepository::class),
ArticleRepository::class => DI\autowire(ArticleRepository::class),
CommentRepository::class => DI\autowire(CommentRepository::class),


ArticleService::class => DI\autowire(ArticleService::class),
]);

self::$container = $builder->build();
}

return self::$container;
}
}
