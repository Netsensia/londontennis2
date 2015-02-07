<?php
namespace Application\Event;

use Zend\EventManager\EventInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;

use Opg\Core\Model\Entity\User\User as UserEntity;
use Zend\Mvc\MvcEvent;

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
            'london-tennis.rest.forum',
        ];
        
        $authRequired = false;
        foreach ($authRequiredFor as $for) {
            if ($routeName == $for) {
                $authRequired = true;
                break;
            }
        }
        
        if (!$authRequired) {
            return;
        }
        
        $response = $e->getResponse();

        try {
            if ($e->getRequest()->getHeaders()->get('Authorization')) {
                
                $token = $e->getRequest()->getHeaders()->get('Authorization')->getFieldValue();
                $zendCache = $e->getApplication()->getServiceManager()->get('ZendCache');
                
                $cacheSuccess = false;
                $cachedEmail = $zendCache->getItem($token, $cacheSuccess);
                
                if ($cacheSuccess) {
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
