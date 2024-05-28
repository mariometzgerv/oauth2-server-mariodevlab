<?php

use Slim\App;
use Slim\Routing\RouteCollectorProxy;

// Services
use MarioDevLab\OAuth2\Services\AuthAccessTokenService;

return function (App $app) {
    $app->group('/auth', function (RouteCollectorProxy $group) {
        $group->post('/access-token', AuthAccessTokenService::class);
    });
};
