<?php

namespace App\Domain\ApiHandlers;

use App\Repository\SmartphoneRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Serializer\SerializerInterface;

class GetPhoneDetailsHandler
{
    /** @var SmartphoneRepository */
    private $smartphoneRepository;

    /** @var SerializerInterface */
    private $serialize;

    /**
     * GetPhoneDetailsHandler constructor.
     * @param SmartphoneRepository $smartphoneRepository
     * @param SerializerInterface $serialize
     */
    public function __construct(SmartphoneRepository $smartphoneRepository, SerializerInterface $serialize)
    {
        $this->smartphoneRepository = $smartphoneRepository;
        $this->serialize = $serialize;
    }

    public function handle(Request $request)
    {
        $phone = $this->smartphoneRepository->find($request->attributes->get('id'));

        if ($phone == null) {
            throw new NotFoundHttpException(
                'Le téléphone est introuvable',
                null,
                Response::HTTP_NOT_FOUND,
                ['Content-Type' => 'application/json']
            );
        }

        $phone = $this->serialize->normalize($phone, 'json', ['groups' => 'phone_details']);

        return $phone;
    }
}
