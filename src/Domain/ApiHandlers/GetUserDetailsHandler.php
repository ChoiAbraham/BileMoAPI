<?php

namespace App\Domain\ApiHandlers;

use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @IsGranted("ROLE_USER")
 */
class GetUserDetailsHandler
{
    /** @var UserRepository */
    private $userRepository;

    /** @var SerializerInterface */
    private $serialize;

    /**
     * GetUserDetailsHandler constructor.
     * @param UserRepository $userRepository
     * @param SerializerInterface $serialize
     */
    public function __construct(UserRepository $userRepository, SerializerInterface $serialize)
    {
        $this->userRepository = $userRepository;
        $this->serialize = $serialize;
    }

    public function handle(Request $request, UserInterface $client)
    {
        if ($client == null) {
            throw new AccessDeniedHttpException('You can\'t add an user');
        } elseif ($client->getId() != $request->attributes->get('client_id')) {
            throw new AccessDeniedHttpException('wrong id');
        }

        $user = $this->userRepository->find(['id' => $request->attributes->get('id')]);

        //Exception NO USER
        if ($user == null) {
            throw new NotFoundHttpException('No users', null, Response::HTTP_NOT_FOUND, ['Content-Type' => 'application/json']);
        }

        //Exception NO CLIENT
        $resourceOfClient = $this->userRepository->findOneBy(['id' => $request->attributes->get('id'), 'client' => $request->attributes->get('client_id')]);

        if ($resourceOfClient == false || $client->getId() != (int)$request->attributes->get('client_id')) {
            throw new AccessDeniedHttpException('No permissions.', null, Response::HTTP_UNAUTHORIZED);
        }

        $users = $this->serialize->normalize($user, 'json', ['groups' => 'user_details']);
        return $users;
    }
}
