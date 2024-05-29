<?php

use Slim\App;
use Slim\Routing\RouteCollectorProxy;

// Services
use MarioDevLab\OAuth2\Services\Auth\AccessTokenService;
use MarioDevLab\OAuth2\Services\Auth\AuthorizeService;

return function (App $app) {
    $app->group('/auth', function (RouteCollectorProxy $group) {
        $group->get('/authorize', AuthorizeService::class);
        $group->post('/access-token', AccessTokenService::class);
    });
};
