<?php

use DI\Container;
use League\OAuth2\Server\ResourceServer;

// Repositories
use MarioDevLab\OAuth2\Repositories\AccessTokenRepository;

return function (Container $container) {
    $container->set(ResourceServer::class, function () {
        return new ResourceServer(
            new AccessTokenRepository(),
            __DIR__ . '/../secrets/public.key',
        );
    });
};
