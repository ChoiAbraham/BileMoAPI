<?php

namespace App\Actions;

use App\Domain\ApiHandlers\GetPhonesListHandler;
use App\Responders\JsonViewResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GetListOfSmartphonesAction.
 *
 * @Route("/api/phones", name="phone_list", methods={"GET"})
 */
final class GetListOfSmartphonesAction
{
    /** @var GetPhonesListHandler */
    private $phoneListHandler;

    /**
     * GetListOfSmartphonesAction constructor.
     * @param GetPhonesListHandler $phoneListHandler
     */
    public function __construct(GetPhonesListHandler $phoneListHandler)
    {
        $this->phoneListHandler = $phoneListHandler;
    }

    public function __invoke(Request $request, JsonViewResponder $jsonResponder)
    {
        $phone = $this->phoneListHandler->handle($request);
        return $jsonResponder($phone, Response::HTTP_OK, ['Content-Type' => 'application/json'], true);
    }
}
