<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class ClubLink extends AbstractHelper
{
    public function __invoke($id, $name)
    {
        echo '<a href="' . $this->view->url('courts/profile', ['id' => $id]) . '">' . $name . '</a>';
    }
}
