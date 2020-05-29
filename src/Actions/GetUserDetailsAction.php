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
 * @Route(path="/api/clients/{client_id<\d+>}/users/{id<\d+>}", name="get_user_details", methods={"GET"}, condition="request.headers.get('Accept') matches '#(version=1)?#i'")
 */
class GetUserDetailsAction
{
    /** @var GetUserDetailsHandler */
    private $handler;

    /**
     * GetUserDetailsAction constructor.
     * @param GetUserDetailsHandler $handler
     */
    public function __construct(GetUserDetailsHandler $handler)
    {
        $this->handler = $handler;
    }

    public function __invoke(Request $request, JsonViewResponder $jsonResponder, UserInterface $client)
    {
        $user = $this->handler->handle($request, $client);
        $user["_links"] = [
            "_self" => $request->getSchemeAndHttpHost() . "/api/clients/" . $client->getId() . "users/" . $request->attributes->get('id'),
            "all" => $request->getSchemeAndHttpHost() . "/api/clients/" . $client->getId() . "users",
        ];
        return $jsonResponder($user, Response::HTTP_OK, ['Content-Type' => 'application/json;version=1'], true);
    }
}
