<?php
namespace LondonTennis\V1\Rest\Token;

class TokenResourceFactory
{
    public function __invoke($services)
    {
        return new TokenResource(
            $services->get('DatabaseAdapter'),
            $services->get('config')['passwordSalt']
        );
    }
}
