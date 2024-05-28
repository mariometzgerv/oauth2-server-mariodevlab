<?php

use DI\Container;
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Grant\PasswordGrant;

// Repositories
use MarioDevLab\OAuth2\Repositories\AccessTokenRepository;
use MarioDevLab\OAuth2\Repositories\ClientRepository;
use MarioDevLab\OAuth2\Repositories\RefreshTokenRepository;
use MarioDevLab\OAuth2\Repositories\ScopeRepository;
use MarioDevLab\OAuth2\Repositories\UserRepository;

return function (Container $container) {
    $container->set(AuthorizationServer::class, function () {
        $server = new AuthorizationServer(
            new ClientRepository(),
            new AccessTokenRepository(),
            new ScopeRepository(),
            __DIR__ . '/../secrets/private.key',
            $_ENV['ENCRYPTION_KEY'],
        );

        $grant = new PasswordGrant(new UserRepository(), new RefreshTokenRepository());
        $grant->setRefreshTokenTTL(new DateInterval('P1M'));
        $server->enableGrantType($grant, new DateInterval('PT12H'));
        return $server;
    });
};
