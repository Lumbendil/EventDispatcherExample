<?php


namespace Lumbendil\EventDispatcherExample;

use Symfony\Component\EventDispatcher\GenericEvent;

class AliceEmailListener
{
    public function changeAliceMessage(GenericEvent $event)
    {
        if ($event['email'] == 'alice@example.com') {
            $event['message'] = 'Hi Alice.';
        }
    }
}