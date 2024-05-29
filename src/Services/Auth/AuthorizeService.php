<?php

namespace MarioDevLab\OAuth2\Services\Auth;

use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Exception\OAuthServerException;
use Psr\Container\ContainerInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// HTTP Exceptions
use Slim\Exception\HttpUnauthorizedException;

// Entities
use MarioDevLab\OAuth2\Entities\UserEntity;

class AuthorizeService {
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
            $authRequest = $server->validateAuthorizationRequest($request);
            $authRequest->setUser(new UserEntity());
            $authRequest->setAuthorizationApproved(true);
            return $server->completeAuthorizationRequest($authRequest, $response);
        } catch (OAuthServerException $e) {
            throw new HttpUnauthorizedException($request, $e->getMessage());
        }
    }
}
