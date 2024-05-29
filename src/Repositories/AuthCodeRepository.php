<?php

namespace MarioDevLab\OAuth2\Repositories;

use League\OAuth2\Server\Entities\AuthCodeEntityInterface;
use League\OAuth2\Server\Repositories\AuthCodeRepositoryInterface;

// Entities
use MarioDevLab\OAuth2\Entities\AuthCodeEntity;

class AuthCodeRepository implements AuthCodeRepositoryInterface {
    public function getNewAuthCode(): AuthCodeEntityInterface {
        return new AuthCodeEntity();
    }

    public function persistNewAuthCode(AuthCodeEntityInterface $authCodeEntity): void {
    }

    public function revokeAuthCode(string $codeId): void {
    }

    public function isAuthCodeRevoked(string $codeId): bool {
        return false;
    }
}
