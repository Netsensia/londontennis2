<?php
namespace LondonTennis\V1\Rest\Thread;

class ThreadResourceFactory
{
    public function __invoke($services)
    {
        return new ThreadResource(
            $services->get('DatabaseAdapter')
        );
    }
}
