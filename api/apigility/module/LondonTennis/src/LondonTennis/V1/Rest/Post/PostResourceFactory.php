<?php
namespace LondonTennis\V1\Rest\Post;

class PostResourceFactory
{
    public function __invoke($services)
    {
        return new PostResource(
            $services->get('DatabaseAdapter')
        );
    }
}
