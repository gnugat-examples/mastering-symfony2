<?php
// File: src\Fortune\ApplicationBundle\EventListener;

namespace Fortune\ApplicationBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class SubmitJsonListener
{
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $content = $request->getContent();
        $data = json_decode($content, true);
        $request->request->add($data ?: array());
    }
}
