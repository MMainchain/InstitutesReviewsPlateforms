<?php

namespace App\Controller;

use App\Entity\Platform;
use App\Entity\Institute;
use App\Entity\PlatformRate;
use App\Utils\Response\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlatformRateRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Controller for PlatformRates objects
 */
class PlatformRateController extends AbstractController
{

    /**
     * @Route("/rates/{id}", methods={"GET"}, name="get_rate")
     * 
     * @ParamConverter("platformRate", options={"mapping": {"id": "id"}})
     */
    public function getPlatformRate(PlatformRate $platformRate)
    {
        return new JsonResponse($platformRate);
    }

    /**
     * @Route("/rates", methods={"GET"}, name="get_rates")
     */
    public function getPlatformRates(PlatformRateRepositoryInterface $platformRateRepository)
    {
        $platformRates = $platformRateRepository->getPlatformRates();

        return new JsonResponse($platformRates);
    }

    /**
     * @Route("/platforms/{id}/rates", methods={"GET"}, name="get_platform_rates")
     * 
     * @ParamConverter("platform", options={"mapping": {"id": "id"}})
     */
    public function getPlatformRatesByPlatform(PlatformRateRepositoryInterface $platformRateRepository, Platform $platform)
    {
        $platformRates = $platformRateRepository->getPlatformRatesByPlatform($platform);

        return new JsonResponse($platformRates);
    }

    /**
     * @Route("/institutes/{id}/rates", methods={"GET"}, name="get_institue_rate")
     * 
     * @ParamConverter("review", options={"mapping": {"id": "id"}})
     */
    public function getPlatformRatesByInstitute(PlatformRateRepositoryInterface $platformRateRepository, Institute $institute)
    {
        $platformRates = $platformRateRepository->getPlatformRatesByInstitute($institute);

        return new JsonResponse($platformRates);
    }

}