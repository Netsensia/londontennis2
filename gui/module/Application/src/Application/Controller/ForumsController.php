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
            'forums' => $forumList['_embedded']['forum']
        ]);
    }
    
    public function viewForumAction()
    {
        $forumList = $this->api()->getForumList();
        
        $threadList = $this->api()->getThreadList(
            $this->params()->fromRoute('forumid')
        );
        
        return new ViewModel([
            'forums' => $forumList['_embedded']['forum'],
            'threads' => $threadList['_embedded']['thread']
        ]);
    }
    
    public function newThreadAction()
    {
        return new ViewModel([
            'forums' => $this->api()->getForumList()['_embedded']['forum'],
        ]);
    }
    
    public function viewThreadAction()
    {
        $postList = $this->api()->getPostList(
            $this->params()->fromRoute('threadid')
        );
        
        return new ViewModel([
            'currentForum' => $this->api()->getForumDetails(
                $this->params()->fromRoute('forumid')
            ),
            'forums' => $this->api()->getForumList()['_embedded']['forum'],
            'posts' => $postList['_embedded']['post'],
        ]);
    }
    
    public function replyAction()
    {
        return new ViewModel([
            'forums' => $this->api()->getForumList()['_embedded']['forum'],
        ]);
    }
}
