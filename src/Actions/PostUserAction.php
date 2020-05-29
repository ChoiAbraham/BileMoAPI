<?php

/**
 * Create by maxime
 * Date 2/12/2020
 * Time 11:04 AM
 * Project :  projet7
 * IDE : PhpStorm
 * FileName : PostEnduser.php as PostEnduser
 */

namespace App\Actions;

use App\Domain\ApiHandlers\PostUserHandler;
use App\Responders\JsonViewResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class PostUserAction
 * @Route(path="api/clients/{client_id<\d+>}/users", name="post_user_endpoint", methods={"POST"}, condition="request.headers.get('Accept') matches '#(version=1)?#i'")
 */
class PostUserAction
{
    /** @var PostUserHandler */
    private $postUserHandler;

    /**
     * PostUserAction constructor.
     * @param PostUserHandler $postUserHandler
     */
    public function __construct(PostUserHandler $postUserHandler)
    {
        $this->postUserHandler = $postUserHandler;
    }

    public function __invoke(Request $request, JsonViewResponder $jsonViewResponder, UserInterface $client)
    {
        $inputData = $this->postUserHandler->handle($request, $client);
        return $jsonViewResponder($inputData, Response::HTTP_CREATED, ['Content-Type' => 'application/json;version=1']);
    }
}
