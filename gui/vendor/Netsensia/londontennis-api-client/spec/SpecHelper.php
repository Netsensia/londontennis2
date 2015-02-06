<?php
include 'vendor/autoload.php';

use LondonTennis\Api\Client\Client;

date_default_timezone_set('UTC');

const TEST_AUTH_EMAIL = 'chris@netsensia.com';
const TEST_AUTH_PASSWORD = 'r0b0twar';

function destroyAndRecreateTestUser()
{
    $apiClient = new Client();
    
    $authResponse = $apiClient->authenticate(
        TEST_AUTH_EMAIL,
        TEST_AUTH_PASSWORD
    );
    
    if ($authResponse->isAuthenticated()) {
        $apiClient->deleteUserAndAllTheirLpas($authResponse->getToken());
    }
    
    $activationToken = $apiClient->registerAccount(TEST_AUTH_EMAIL, TEST_AUTH_PASSWORD);
    $apiClient->activateAccount($activationToken);
    
    $authResponse = $apiClient->authenticate(
        TEST_AUTH_EMAIL,
        TEST_AUTH_PASSWORD
    ); 
}

function getTestUserToken()
{
    $apiClient = new Client();
    
    $authResponse = $apiClient->authenticate(
        TEST_AUTH_EMAIL,
        TEST_AUTH_PASSWORD
    );
    
    return $authResponse->getToken();
}
