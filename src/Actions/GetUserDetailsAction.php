<?php

namespace App\Actions;

use App\Domain\ApiHandlers\GetUserDetailsHandler;
use App\Responders\JsonViewResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class GetUserDetailsAction
 * @Route(path="/api/clients/{client_id<\d+>}/users/{id<\d+>}", name="get_user_details", methods={"GET"})
 */
class GetUserDetailsAction
{
    /** @var GetUserDetailsHandler */
    private $handler;

//    /** @var TokenStorageInterface */
//    private $token;

    /**
     * GetUserDetailsAction constructor.
     * @param GetUserDetailsHandler $handler
//     * @param TokenStorageInterface $token
     */
    public function __construct(GetUserDetailsHandler $handler)
    {
        $this->handler = $handler;
//        $this->token = $token;
    }

    public function __invoke(Request $request, JsonViewResponder $jsonResponder, UserInterface $client)
    {
        $user = $this->handler->handle($request, $client);
        return $jsonResponder($user, Response::HTTP_OK, ['Content-Type' => 'application/json'], true);
    }
}
