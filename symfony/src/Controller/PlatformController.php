<?php

namespace App\Controller;

use App\Entity\Review;
use App\Entity\Platform;
use App\Entity\PlatformRate;
use App\Utils\Response\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlatformRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Controller for Platform objects
 */
class PlatformController extends AbstractController
{

    /**
     * @Route("/platforms/{id}", methods={"GET"}, name="get_platform")
     * 
     * @ParamConverter("platform", options={"mapping": {"id": "id"}})
     */
    public function getPlatform(Platform $platform)
    {
        return new JsonResponse($platform);
    }

    /**
     * @Route("/platforms", methods={"GET"}, name="get_platforms")
     */
    public function getPlatforms(PlatformRepositoryInterface $platformRepository)
    {
        $platform = $platformRepository->getPlatforms();

        return new JsonResponse($platform);
    }

    /**
     * @Route("/rates/{id}/platforms", methods={"GET"}, name="get_platformRate_platform")
     * 
     * @ParamConverter("platformRate", options={"mapping": {"id": "id"}})
     */
    public function getPlatformByPlatformRate(PlatformRepositoryInterface $platformRepository, PlatformRate $platformRate)
    {
        $platform = $platformRepository->getPlatformByPlatformRate($platformRate);

        return new JsonResponse($platform);
    }

    /**
     * @Route("/reviews/{id}/platforms", methods={"GET"}, name="get_review_platform")
     * 
     * @ParamConverter("review", options={"mapping": {"id": "id"}})
     */
    public function getPlatformByReview(PlatformRepositoryInterface $platformRepository, Review $review)
    {
        $platform = $platformRepository->getPlatformByReview($review);

        return new JsonResponse($platform);
    }

}