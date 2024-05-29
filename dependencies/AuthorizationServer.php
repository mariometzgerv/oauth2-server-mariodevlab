<?php

use DI\Container;
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Grant\AuthCodeGrant;

// Repositories
use MarioDevLab\OAuth2\Repositories\AccessTokenRepository;
use MarioDevLab\OAuth2\Repositories\AuthCodeRepository;
use MarioDevLab\OAuth2\Repositories\ClientRepository;
use MarioDevLab\OAuth2\Repositories\RefreshTokenRepository;
use MarioDevLab\OAuth2\Repositories\ScopeRepository;

return function (Container $container) {
    $container->set(AuthorizationServer::class, function () {
        $server = new AuthorizationServer(
            new ClientRepository(),
            new AccessTokenRepository(),
            new ScopeRepository(),
            __DIR__ . '/../secrets/private.key',
            $_ENV['ENCRYPTION_KEY'],
        );

        $server->enableGrantType(
            new AuthCodeGrant(
                new AuthCodeRepository(),
                new RefreshTokenRepository(),
                new DateInterval('PT10M'),
            ),
            new DateInterval('PT1H')
        );

        return $server;
    });
};
