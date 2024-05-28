<?php

namespace MarioDevLab\OAuth2\Repositories;

use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Repositories\AccessTokenRepositoryInterface;

// Entities
use MarioDevLab\OAuth2\Entities\AccessTokenEntity;

class AccessTokenRepository implements AccessTokenRepositoryInterface {
    public function getNewToken(
        ClientEntityInterface $clientEntity,
        array $scopes,
        ?string $userIdentifier = null
    ): AccessTokenEntityInterface {
        $accessToken = new AccessTokenEntity();
        $accessToken->setClient($clientEntity);
        foreach ($scopes as $scope) $accessToken->addScope($scope);
        if (!is_null($userIdentifier)) $accessToken->setUserIdentifier($userIdentifier);
        return $accessToken;
    }

    public function persistNewAccessToken(AccessTokenEntityInterface $accessTokenEntity): void {
    }

    public function revokeAccessToken(string $tokenId): void {
    }

    public function isAccessTokenRevoked(string $tokenId): bool {
        return false;
    }
}
