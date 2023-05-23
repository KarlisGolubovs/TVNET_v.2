<?php declare(strict_types=1);

namespace App\Services\user;

use App\ApiRequest;

class IndexUserService
{
    private ApiRequest $client;

    public function __construct()
    {
        $this->client = new ApiRequest();
    }

    public function execute(): array
    {
        return $this->client->fetchUsers();
    }
}
