<?php

namespace App\Actions;

use App\Domain\ApiHandlers\UserListHandler;
use App\Responders\JsonViewResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class GetListOfUsersAction
 * @package App\Actions
 * @Route(path="/api/clients/{client_id<\d+>}/users", name="get_users_list", methods={"GET"})
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
        return $jsonViewResponder($user, Response::HTTP_OK, ['Content-Type' => 'application/json'], true);
    }

}