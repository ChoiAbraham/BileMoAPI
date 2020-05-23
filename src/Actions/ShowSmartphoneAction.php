<?php

namespace App\Actions;

use App\Entity\Smartphone;
use App\Repository\SmartphoneRepository;
use App\Responders\JsonViewResponder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use FOS\RestBundle\Controller\Annotations\View;

/**
 * Class ShowSmartphoneAction.
 *
 * @Get(
 *     path = "/phones/{id}",
 *     name = "app_phone_show",
 *     requirements = {"id"="\d+"}
 * )
 * @View(
 *     statusCode = 201,
 *     serializerGroups = {"DETAIL_PHONE"}
 * )
 */
final class ShowSmartphoneAction
{
    /** @var SmartphoneRepository */
    private $smartphoneRepository;

    /** @var EntityManagerInterface */
    private $entityManager;

    public function __invoke(Request $request, JsonViewResponder $jsonResponder)
    {
        $smartphone = $this->smartphoneRepository->findOneBy(['id' => $request->attributes->get('id')]);
//
//        $response = new Response();
//        $response->setContent($dataJson);
//        $response->headers->set('Content-Type', 'application/json');
//
//        return $response;
    }
}
