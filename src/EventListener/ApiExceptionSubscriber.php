<?php

namespace App\EventListener;

use App\Api\ApiProblem;
use App\Api\ApiProblemException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
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

        $e = $event->getThrowable();

        if ($e instanceof ApiProblemException) {
            $apiProblem = $e->getApiProblem();
        } else {
            $apiProblem = new ApiProblem(
                $code
            );

            if ($e instanceof HttpExceptionInterface) {
                $apiProblem->set('detail', $e->getMessage());
            }
        }

        if ($e instanceof HttpExceptionInterface) {

            $data = $apiProblem->toArray();

            $response = new JsonResponse(
                $data,
                $apiProblem->getStatusCode()
            );

            $response->headers->set('Content-Type', 'application/problem+json');

            $event->setResponse($response);
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::EXCEPTION => 'onKernelException'
        );
    }
}
