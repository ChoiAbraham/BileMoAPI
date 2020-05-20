<?php

namespace App\Actions;

use App\Entity\Smartphone;
use App\Repository\SmartphoneRepository;
use App\Responders\JsonViewResponder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class CreateSmartphoneAction.
 *
 * @Route("/smartphone", name="smartphone_create", methods={"POST"})
 */
final class CreateSmartphoneAction
{
    /** @var SmartphoneRepository */
    private $smartphoneRepository;

//    /** @var SerializerInterface */
//    private $serializer;

    /** @var EntityManagerInterface */
    private $entityManager;

    public function __invoke(Smartphone $smartphone, Request $request, JsonViewResponder $jsonResponder)
    {
//        $data = $request->getContent();
//        $phone = $this->serializer->deserialize($data, Smartphone::class, 'json');
//
//        $phone->setCreatedAt();
//
//        $this->entityManager->persist($phone);
//        $this->entityManager->flush();
//
//        return new Response('', Response::HTTP_CREATED);

//        return $jsonResponder();
    }
}
