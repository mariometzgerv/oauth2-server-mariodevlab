<?php

namespace MarioDevLab\OAuth2\Entities;

use League\OAuth2\Server\Entities\UserEntityInterface;

class UserEntity implements UserEntityInterface {
    private string $identifier;

    public function __construct(string $identifier) {
        $this->identifier = $identifier;
    }
    public function getIdentifier(): string {
        return $this->identifier;
    }
}
