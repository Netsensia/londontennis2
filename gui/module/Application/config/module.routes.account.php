<?php
use Zend\Authentication\AuthenticationService;
use Application\Adapter\AuthAdapter;
use LondonTennis\Api\Client\Client;
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'myaccount' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/myaccount',
                    'defaults' => array(
                        'controller' => 'Application\Controller\MyAccount',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
);
