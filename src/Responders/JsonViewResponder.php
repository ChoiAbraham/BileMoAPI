<?php

namespace App\Responders;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ViewResponder.
 */
final class JsonViewResponder
{
    public function __invoke()
    {
        return new JsonResponse();
    }
}
