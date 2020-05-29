<?php

namespace App\Domain\ApiHandlers;

use App\Entity\Smartphone;
use App\Repository\SmartphoneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\SerializerInterface;

class GetPhonesListHandler
{
    /** @var SmartphoneRepository */
    private $smartphoneRepository;

    /** @var SerializerInterface */
    private $serializer;

    /** @var EntityManagerInterface */
    private $manager;

    /** @var UrlGeneratorInterface */
    private $router;

    /**
     * GetPhonesListHandler constructor.
     * @param SmartphoneRepository $smartphoneRepository
     * @param SerializerInterface $serializer
     * @param EntityManagerInterface $manager
     * @param UrlGeneratorInterface $router
     */
    public function __construct(SmartphoneRepository $smartphoneRepository, SerializerInterface $serializer, EntityManagerInterface $manager, UrlGeneratorInterface $router)
    {
        $this->smartphoneRepository = $smartphoneRepository;
        $this->serializer = $serializer;
        $this->manager = $manager;
        $this->router = $router;
    }

    public function handle(Request $request)
    {
        $page = $request->query->get('page', 1);
        $keyword = $request->query->get('keyword');

        if ($keyword) {
            $order = 'asc';
            $qb = $this->smartphoneRepository->search($keyword, $order);
        } else {
            $qb = $this->smartphoneRepository->findOrderByDate();
        }

        $adapter = new DoctrineORMAdapter($qb);
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setMaxPerPage(Smartphone::API_MAX_ITEMS_LIST);
        $pagerfanta->setCurrentPage($page);

        if ($pagerfanta->hasPreviousPage()) {
            $previousPage = $request->getSchemeAndHttpHost() . '/api/phones?page=' . $pagerfanta->getPreviousPage();
        } else {
            $previousPage = 'no previous page';
        }
        if ($pagerfanta->hasNextPage()) {
            $nextPage = $request->getSchemeAndHttpHost() . '/api/phones?page=' . $pagerfanta->getNextPage();
        } else {
            $nextPage = 'you reached the last page';
        }

        $smartphones = [];
        foreach ($pagerfanta->getCurrentPageResults() as $result) {
            $smartphones[] = $result;
        }

        $phones = $this->serializer->normalize([
            'total' => $pagerfanta->getNbResults(),
            'count' => count($smartphones),
            'previous page' => $previousPage,
            'next page' => $nextPage,
            'smartphones' => $smartphones,
        ], 'json', ['groups' => 'phone_list']);

        return $phones;
    }
}
