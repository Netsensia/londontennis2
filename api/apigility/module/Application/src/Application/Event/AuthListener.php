<?php
namespace Application\Event;

use Zend\EventManager\EventInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;

use Zend\Mvc\MvcEvent;
use LondonTennis\V1\Rest\Token\TokenEntity;
use Zend\Session\Container;

class AuthListener implements ListenerAggregateInterface
{
    protected $listeners = array();

    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_ROUTE,
            array($this, 'checkAuth'),
            -100
        );
    }
    
    public function checkAuth(EventInterface $e)
    {
        $routeName = $e->getRouteMatch()->getMatchedRouteName();
        
        $authRequiredFor = [
            'london-tennis.rest.forum' => ['post', 'put'],
        ];
        
        $request = $e->getRequest();
        if (method_exists($request, 'getMethod')) {
            $method = strtolower($request->getMethod());
        } else {
            return;
        }
        
        $authRequired = false;
        foreach ($authRequiredFor as $resource => $verbs) {
            foreach ($verbs as $verb) {
                if ($routeName == $resource && $verb == $method) {
                    $authRequired = true;
                    break;
                }
            }
        }
        
        if (!$authRequired) {
            return;
        }
        
        $response = $e->getResponse();

        try {
            if ($e->getRequest()->getHeaders()->get('Authorization')) {
                
                $token = $request->getHeaders()->get('Authorization')->getFieldValue();
                $zendCache = $e->getApplication()->getServiceManager()->get('ZendCache');
                
                $cacheSuccess = false;

                $tokenEntity = $zendCache->getItem($token, $cacheSuccess);
                
                if ($cacheSuccess && $tokenEntity instanceof TokenEntity) {
                    $container = new Container('TokenIdentity');
                    $container->tokenEntity = $tokenEntity;
                    return;
                }
                
                $response->setStatusCode(401);

            } else {
                
                $response->setStatusCode(401);
            }
            
        } catch (\Exception $exception) {
             $response->setStatusCode(500);
        }

        return $response;
    }

    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }
}
