<?php

namespace MarioDevLab\OAuth2\Repositories;

use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Repositories\ClientRepositoryInterface;

// Entities
use MarioDevLab\OAuth2\Entities\ClientEntity;

class ClientRepository implements ClientRepositoryInterface {
    public function getClientEntity(string $clientIdentifier): ?ClientEntityInterface {
        $client = new ClientEntity();
        $client->setIdentifier($clientIdentifier);
        $client->setName('Accounts');
        $client->setRedirectUri('http://localhost/');
        $client->setConfidential();
        return $client;
    }

    public function validateClient(string $clientIdentifier, ?string $clientSecret, ?string $grantType): bool {
        return $clientIdentifier == 'accounts';
    }
}
