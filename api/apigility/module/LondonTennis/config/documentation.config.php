<?php
return array(
    'LondonTennis\\V1\\Rest\\Token\\Controller' => array(
        'description' => 'Obtain an authentication token using your London Tennis username and password. The token is required for some calls to the API such as updating your details or posting match results.',
    ),
    'LondonTennis\\V1\\Rest\\Forum\\Controller' => array(
        'description' => 'A list of available forums.',
    ),
    'LondonTennis\\V1\\Rest\\Thread\\Controller' => array(
        'description' => 'A list of threads within a given forum.',
    ),
    'LondonTennis\\V1\\Rest\\Post\\Controller' => array(
        'description' => 'A list of posts within a given thread.',
    ),
    'LondonTennis\\V1\\Rest\\Player\\Controller' => array(
        'description' => 'Player details.',
    ),
    'LondonTennis\\V1\\Rest\\Calendar\\Controller' => array(
        'description' => 'Availability calendar. Pass in userId and startDate. Will return one month\'s worth of calendar entries. Leave userId empty in order to retrieve calendar entries for all users.',
    ),
);
