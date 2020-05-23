<?php

namespace App\Actions;

use App\Entity\Smartphone;
use App\Repository\SmartphoneRepository;
use App\Responders\JsonViewResponder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//use FOS\RestBundle\Controller\Annotations\Get;
//use FOS\RestBundle\Controller\Annotations\View;
//use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class ShowListSmartphonesAction.
 *
 * @Route("/smartphones", name="smartphone_show_list", methods={"GET"})
 */
final class GetListOfSmartphonesAction
{
    /** @var SmartphoneRepository */
    private $smartphoneRepository;

//    /** @var SerializerInterface */
//    private $serializer;

    /** @var EntityManagerInterface */
    private $entityManager;

    public function __invoke(Request $request, JsonViewResponder $jsonResponder)
    {
//        $smartphones = $this->smartphoneRepository->findAll();
//        $dataJson = $this->serializer->serialize($smartphones, 'json');
//
//        $response = new Response($dataJson);
//        $response->headers->set('Content-Type', 'application/json');
//
//        return $response;
    }
}
