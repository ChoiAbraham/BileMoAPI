<?php

namespace App\Domain\ApiHandlers;

use App\Entity\Smartphone;

use App\Repository\SmartphoneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class GetPhonesListHandler
{
    /** @var SmartphoneRepository */
    private $smartphoneRepository;

    /** @var SerializerInterface */
    private $serializer;

    /** @var EntityManagerInterface */
    private $manager;

    /**
     * GetPhonesListHandler constructor.
     * @param SmartphoneRepository $smartphoneRepository
     * @param SerializerInterface $serializer
     * @param EntityManagerInterface $manager
     */
    public function __construct(SmartphoneRepository $smartphoneRepository, SerializerInterface $serializer, EntityManagerInterface $manager)
    {
        $this->smartphoneRepository = $smartphoneRepository;
        $this->serializer = $serializer;
        $this->manager = $manager;
    }

    public function handle(Request $request)
    {
        $page = $request->query->get('page', 1);
        $keyword = $request->query->get('keyword');

        if($keyword) {
            $order= 'asc';
            $qb = $this->manager->getRepository(Smartphone::class)->search($keyword, $order);
        } else {
            $qb = $this->manager->getRepository(Smartphone::class)->findOrderById();
        }

        $adapter = new DoctrineORMAdapter($qb);
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setMaxPerPage(4);
        $pagerfanta->setCurrentPage($page);

        $smartphones = [];
        foreach ($pagerfanta->getCurrentPageResults() as $result) {
            $smartphones[] = $result;
        }

        $phones = $this->serializer->normalize([
            'total' => $pagerfanta->getNbResults(),
            'count' => count($smartphones),
            'smartphones' => $smartphones,
        ], 'json', ['groups' => 'phone_list']);

        return $phones;
    }
}
