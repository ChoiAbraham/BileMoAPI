<?php

namespace App\Actions;

use App\Entity\Smartphone;
use App\Repository\SmartphoneRepository;
use App\Responders\JsonViewResponder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class ShowSmartphoneAction.
 *
 * @Route("/smartphones/{id}", name="smartphone_show", methods={"GET"})
 */
final class ShowSmartphoneAction
{
    /** @var SmartphoneRepository */
    private $smartphoneRepository;

//    /** @var SerializerInterface */
//    private $serializer;

    /** @var EntityManagerInterface */
    private $entityManager;

    public function __invoke(Request $request, JsonViewResponder $jsonResponder)
    {
//        $smartphone = $this->smartphoneRepository->findOneBy(['id' => $request->attributes->get('id')]);
//        $dataJson = $this->serializer->serialize($smartphone, 'json');
//
//        $response = new Response();
//        $response->setContent($dataJson);
//        $response->headers->set('Content-Type', 'application/json');
//
//        return $response;
    }
}
