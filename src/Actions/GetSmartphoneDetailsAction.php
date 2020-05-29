<?php

namespace App\Actions;

use App\Domain\ApiHandlers\GetPhoneDetailsHandler;
use App\Responders\JsonViewResponder;
use Symfony\Component\HttpFoundation\AcceptHeader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GetSmartphoneDetailsAction.
 * @Route(
 *     name="get_phone",
 *     path="/api/phones/{id<\d+>}",
 *     methods={"GET"},
 *     condition="request.headers.get('Accept') matches '#(version=1)?#'"
 * )
 */
final class GetSmartphoneDetailsAction
{
    /** @var GetPhoneDetailsHandler */
    private $handler;

    /**
     * GetSmartphoneDetailsAction constructor.
     * @param GetPhoneDetailsHandler $handler
     */
    public function __construct(GetPhoneDetailsHandler $handler)
    {
        $this->handler = $handler;
    }

    public function __invoke(Request $request, JsonViewResponder $jsonResponder)
    {
        $phone = $this->handler->handle($request);
        $phone["_links"] = [
            "_self" => $request->getSchemeAndHttpHost() . "/api/phones/" . $request->attributes->get('id'),
            "all" => $request->getSchemeAndHttpHost() . "/api/phones",
        ];
        return $jsonResponder($phone, Response::HTTP_OK, ['Content-Type' => 'application/json;version=1'], true);
    }
}
