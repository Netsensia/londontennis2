<?php
namespace LondonTennis\V1\Rest\Forumthread;

class ForumthreadResourceFactory
{
    public function __invoke($services)
    {
        return new ForumthreadResource();
    }
}
