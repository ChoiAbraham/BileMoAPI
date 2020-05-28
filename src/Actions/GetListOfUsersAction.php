<?php

namespace App\Actions;

use App\Domain\ApiHandlers\UserListHandler;
use App\Entity\User;
use App\Responders\JsonViewResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class GetListOfUsersAction
 * @package App\Actions
 * @Route(path="/api/clients/{client_id<\d+>}/users", name="get_users_list", methods={"GET"}, condition="request.headers.get('Accept') matches '#version=1#i'")
 */
final class GetListOfUsersAction
{
    /** @var UserListHandler */
    private $userListHandler;

    /**
     * GetListOfUsersAction constructor.
     * @param UserListHandler $userListHandler
     */
    public function __construct(UserListHandler $userListHandler)
    {
        $this->userListHandler = $userListHandler;
    }

    public function __invoke(JsonViewResponder $jsonViewResponder, Request $request, UserInterface $client)
    {
        $user = $this->userListHandler->handle($request, $client);
        $user["_links"] = [
            "_self" => $request->getSchemeAndHttpHost() ."/api/" . $client->getId() . "/users",
            "one user" => $request->getSchemeAndHttpHost() . "/api/clients/" . $client->getId() . "/USER_ID",
        ];

        $user["_links"] = [
            "_self" => $request->getSchemeAndHttpHost() . "/api/client/" . $client->getId() . "/users",
        ];

        for($i = 0; $i < User::API_ITEMS_LIST; $i++) {
            $userNumber = $user["users"][$i]['id'];
            $user["_links"]["user detail number " . $userNumber] = $request->getSchemeAndHttpHost() . "/api/clients/" . $client->getId() . "/users/" . $userNumber;
        }

        return $jsonViewResponder($user, Response::HTTP_OK, ['Content-Type' => 'application/json;version=1'], true);
    }
}