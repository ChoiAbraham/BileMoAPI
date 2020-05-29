<?php

namespace App\Actions;

use App\Domain\ApiHandlers\DeleteUserHandler;
use App\Responders\JsonViewResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class DeleteUserAction
 * @Route(
 *     path="/api/clients/{client_id<\d+>}/users/{id<\d+>}",
 *     name="delete_user",
 *     methods={"DELETE"},
 *     condition="request.headers.get('Accept') matches '#(version=1)?#'"
 *     )
 */
final class DeleteUserAction
{
    /** @var DeleteUserHandler */
    private $deleteUserHandler;

    /**
     * DeleteUserAction constructor.
     * @param DeleteUserHandler $deleteUserHandler
     */
    public function __construct(DeleteUserHandler $deleteUserHandler)
    {
        $this->deleteUserHandler = $deleteUserHandler;
    }

    public function __invoke(Request $request, JsonViewResponder $jsonViewResponder, UserInterface $client)
    {
        $this->deleteUserHandler->handle($request, $client);
        return $jsonViewResponder(null, Response::HTTP_NO_CONTENT, ['Content-Type' => 'application/json']);
    }
}
