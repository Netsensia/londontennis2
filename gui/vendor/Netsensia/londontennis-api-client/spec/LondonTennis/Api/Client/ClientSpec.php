<?php

namespace spec\LondonTennis\Api\Client;

include "spec/SpecHelper.php";

use PhpSpec\ObjectBehavior;

class ClientSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('LondonTennis\Api\Client\Client');
    }

    function it_will_not_authenticate_if_invalid_credentials()
    {
        $this->authenticate(TEST_AUTH_EMAIL, 'badpassword')->shouldBe(false);
    }

    function it_will_authenticate_if_valid_credentials()
    {
        $this->authenticate(TEST_AUTH_EMAIL, TEST_AUTH_PASSWORD)->shouldBeAValidatedAuthResponse();
    }

    public function getMatchers()
    {
        return [
            'beAValidatedAuthResponse' => function($subject) {
                return strlen($subject['token']) == 64;
            },
        ];
    }
}
