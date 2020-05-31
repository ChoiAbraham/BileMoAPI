<?php

namespace App\Domain\ApiHandlers;

use App\Api\ApiProblem;
use App\Api\ApiProblemException;
use App\Api\UserInputs;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PostUserHandler
{
    /** @var SerializerInterface */
    private $serializer;

    /** @var TokenStorageInterface */
    private $storage;

    /** @var EntityManagerInterface */
    private $manager;

    /** @var UrlGeneratorInterface */
    private $url;

    /** @var ValidatorInterface */
    private $validator;

    /** @var UserRepository */
    private $userRepository;

    /**
     * PostUserHandler constructor.
     * @param SerializerInterface $serializer
     * @param TokenStorageInterface $storage
     * @param EntityManagerInterface $manager
     * @param UrlGeneratorInterface $url
     * @param ValidatorInterface $validator
     * @param UserRepository $userRepository
     */
    public function __construct(SerializerInterface $serializer, TokenStorageInterface $storage, EntityManagerInterface $manager, UrlGeneratorInterface $url, ValidatorInterface $validator, UserRepository $userRepository)
    {
        $this->serializer = $serializer;
        $this->storage = $storage;
        $this->manager = $manager;
        $this->url = $url;
        $this->validator = $validator;
        $this->userRepository = $userRepository;
    }

    public function handle(Request $request, UserInterface $client)
    {
        if ($client->getId() != $request->attributes->get('client_id')) {
            throw new AccessDeniedHttpException('wrong id');
        }

        /** @var UserInputs $input */
        $input = $this->serializer->deserialize($request->getContent(), UserInputs::class, 'json');

        // If the user already exist, throw exception
        $user = $this->userRepository->findOneBy(['email' => $input->getEmail()]);
        if ($user) {
            $apiProblem = new ApiProblem(Response::HTTP_CONFLICT, ApiProblem::TYPE_INVALID_USER_EMAIL);
            throw new ApiProblemException($apiProblem);
        }

        // Errors
        $errors = $this->validator->validate($input);
        if ($errors->count() > 0) {
            $errors = $this->getErrors($errors);

            $apiProblem = new ApiProblem(
                Response::HTTP_BAD_REQUEST,
                ApiProblem::TYPE_VALIDATION_ERROR
            );
            $apiProblem->set('errors', $errors);

            throw new ApiProblemException($apiProblem);
        }

        return $this->hydrate($input);
    }

    public function hydrate(UserInputs $input)
    {
        $user = new User();
        $user->setClient($this->storage->getToken()->getUser());
        $user->setEmail($input->getEmail());
        $user->setLastName($input->getLastname());
        $user->setFirstName($input->getFirstName());
        $user->setAddress($input->getAddress());
        $user->setCountry($input->getCountry());
        $user->setTelephone($input->getTelephone());

        $this->manager->persist($user);
        $this->manager->flush();

        return [
            "url" => $this->url->generate(
                'get_user_details',
                [
                    'id' => $user->getId(),
                    'client_id' => $this->storage->getToken()->getUser()->getId()
                ]
            )
        ];
    }

    private function getErrors($errors)
    {
        foreach ($errors as $error) {
            /** @var ConstraintViolation $error */
            $data['errors'][] = $error->getPropertyPath() . ' => ' . $error->getMessage();
        }

        return $data;
    }
}
