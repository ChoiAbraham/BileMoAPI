<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiExceptionSubscriber implements EventSubscriberInterface
{
    public function onKernelException(ExceptionEvent $event)
    {
        if ($event->getThrowable()->getCode() and $event->getThrowable()->getCode() > 200) {
            $code = $event->getThrowable()->getCode();
        } elseif (method_exists($event->getThrowable(), 'getStatusCode') == true) {
            $code = $event->getThrowable()->getStatusCode();
        } else {
            $code = 404;
        }

        $message = [
            'message' => $event->getThrowable()->getMessage(),
            'code' => $code
        ];

        $response = new JsonResponse($message
        );
        $response->headers->set('Content-Type', 'application/problem+json');

        $event->setResponse($response);
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::EXCEPTION => 'onKernelException'
        );
    }
}
