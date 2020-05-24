<?php

namespace App\Domain\ApiHandlers;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class DeleteUserHandler
{
    /** @var TokenStorageInterface */
    private $storage;

    /** @var EntityManagerInterface */
    private $manager;

    /** @var UserRepository */
    private $userRepository;

    /**
     * DeleteUserHandler constructor.
     * @param TokenStorageInterface $storage
     * @param EntityManagerInterface $manager
     * @param UserRepository $userRepository
     */
    public function __construct(TokenStorageInterface $storage, EntityManagerInterface $manager, UserRepository $userRepository)
    {
        $this->storage = $storage;
        $this->manager = $manager;
        $this->userRepository = $userRepository;
    }

    public function handle(Request $request, UserInterface $client)
    {
        $user = $this->userRepository->find($request->get('id'));

        if ($user == null) {
            throw new Exception('This User does not exist', Response::HTTP_NOT_FOUND);
        } elseif ($this->storage->getToken()->getUser() == null || (int)$request->get('client_id') != $client->getId()) {
            throw new AccessDeniedHttpException('Delete impossible', null, Response::HTTP_UNAUTHORIZED);
        } else {
            $this->manager->remove($user);
            $this->manager->flush();
        }
    }
}
