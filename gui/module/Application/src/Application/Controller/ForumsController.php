<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\View\Model\ViewModel;

class ForumsController extends ApiAwareController
{
    public function listAction()
    {
        $forumList = $this->api()->getForumList();
        return new ViewModel([
            'forums' => $forumList['_embedded']['forum']]
        );
    }
    
    public function viewForumAction()
    {
        return new ViewModel();
    }
    
    public function newThreadAction()
    {
        return new ViewModel();
    }
    
    public function viewThreadAction()
    {
        return new ViewModel();
    }
    
    public function replyAction()
    {
        return new ViewModel();
    }
}
