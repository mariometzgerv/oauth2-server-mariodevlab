<?php

namespace MarioDevLab\OAuth2\Services;

use Psr\Container\ContainerInterface;
use Psr\Container\ContainerExceptionInterface;
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Exception\OAuthServerException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// HTTP Exceptions
use Slim\Exception\HttpUnauthorizedException;

class AuthAccessTokenService {
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function __invoke(Request $request, Response $response): Response {
        try {
            /* @var AuthorizationServer $server */
            $server = $this->container->get(AuthorizationServer::class);
        } catch (ContainerExceptionInterface $e) {
            throw new HttpUnauthorizedException($request, $e->getMessage());
        }

        try {
            return $server->respondToAccessTokenRequest($request, $response);
        } catch (OAuthServerException $e) {
            throw new HttpUnauthorizedException($request, $e->getMessage());
        }
    }
}
