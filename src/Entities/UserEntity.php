<?php

namespace MarioDevLab\OAuth2\Entities;

use League\OAuth2\Server\Entities\UserEntityInterface;

class UserEntity implements UserEntityInterface {
    public function getIdentifier(): string {
        return '1';
    }
}
