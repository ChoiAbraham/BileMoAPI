<?php

namespace App\Actions;

use App\Domain\ApiHandlers\GetUserDetailsHandler;
use App\Responders\JsonViewResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class GetUserDetailsAction
 * @Route(path="/api/clients/{client_id<\d+>}/users/{id<\d+>}", name="get_user_details", methods={"GET"})
 */
class GetUserDetailsAction
{
    /** @var GetUserDetailsHandler */
    private $handler;
//
//    /** @var UserInterface */
//    private $client;

    /**
     * GetUserDetailsAction constructor.
     * @param GetUserDetailsHandler $handler
//     * @param UserInterface $client
     */
    public function __construct(GetUserDetailsHandler $handler)
    {
        $this->handler = $handler;
//        $this->client = $client;
    }

    public function __invoke(Request $request, JsonViewResponder $jsonResponder)
    {
//        $user = $this->handler->handle($request, $this->client);
//        return $jsonResponder($user, Response::HTTP_OK, ['Content-Type' => 'application/json'], true);
    }
}
