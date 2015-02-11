<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class PlayerLink extends AbstractHelper
{
    public function __invoke($id, $name)
    {
        echo '<a style="cursor:pointer" data-toggle="modal" data-target="#playermodal" class="playerpopup" data-playerId="' . $id . '" data-playerName="' . $name . '">' . $name . '</a>';
    }
}
