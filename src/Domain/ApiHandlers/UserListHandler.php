<?php


namespace App\Domain\ApiHandlers;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\SerializerInterface;

class UserListHandler
{
    /** @var UserRepository */
    private $userRepository;

    /** @var SerializerInterface */
    private $serializer;

    /** @var EntityManagerInterface */
    private $manager;

    /** @var UrlGeneratorInterface */
    private $router;

    /**
     * UserListHandler constructor.
     * @param UserRepository $userRepository
     * @param SerializerInterface $serializer
     * @param EntityManagerInterface $manager
     * @param UrlGeneratorInterface $router
     */
    public function __construct(UserRepository $userRepository, SerializerInterface $serializer, EntityManagerInterface $manager, UrlGeneratorInterface $router)
    {
        $this->userRepository = $userRepository;
        $this->serializer = $serializer;
        $this->manager = $manager;
        $this->router = $router;
    }

    public function handle(Request $request, UserInterface $client)
    {
        $page = $request->query->get('page', 1);
        $qb = $this->userRepository->findOrderByDate();

        $adapter = new DoctrineORMAdapter($qb);
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setMaxPerPage(User::API_ITEMS_LIST);
        $pagerfanta->setCurrentPage($page);

        if($pagerfanta->hasPreviousPage()) {
            $previousPage = $request->getSchemeAndHttpHost() . '/api/clients/' . $client->getId() . '/users?page=' . $pagerfanta->getPreviousPage();
        } else {
            $previousPage = 'no previous page';
        }
        if($pagerfanta->hasNextPage()) {
            $nextPage = $request->getSchemeAndHttpHost() . '/api/clients/' . $client->getId() . '/users?page=' . $pagerfanta->getNextPage();
        } else {
            $nextPage = 'you reached the last page';
        }

        $users = [];
        foreach ($pagerfanta->getCurrentPageResults() as $result) {
            $users[] = $result;
        }

        $usersResult = $this->serializer->normalize([
            'total' => $pagerfanta->getNbResults(),
            'count' => count($users),
            'previous page' => $previousPage,
            'next page' => $nextPage,
            'users' => $users,
        ], 'json', ['groups' => 'users_list']);

        return $usersResult;
    }
}