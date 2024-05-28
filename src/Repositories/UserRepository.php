<?php

namespace MarioDevLab\OAuth2\Repositories;

use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\UserEntityInterface;
use League\OAuth2\Server\Repositories\UserRepositoryInterface;

// Entities
use MarioDevLab\OAuth2\Entities\UserEntity;

class UserRepository implements UserRepositoryInterface {
    public function getUserEntityByUserCredentials(
        string $username,
        string $password,
        string $grantType,
        ClientEntityInterface $clientEntity
    ): ?UserEntityInterface {
        return $username == 'admin' && $password == 'test1234'
            ? new UserEntity($username)
            : null;
    }
}
