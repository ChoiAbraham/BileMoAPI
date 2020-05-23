<?php

namespace App\Responders;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class JsonViewResponder.
 */
final class JsonViewResponder
{
    public function __invoke($data, $status = Response::HTTP_OK, $header = ['Content-Type' => 'application/json'], $cachable = null)
    {
        $response = new JsonResponse($data, $status, $header);
        if ($cachable == true) {
            $response->setPublic()->setSharedMaxAge(300)->setMaxAge(300);
        }

        return $response;
    }
}