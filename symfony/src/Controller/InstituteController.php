<?php

namespace App\Controller;

use App\Entity\Review;
use App\Entity\Institute;
use App\Entity\PlatformRate;
use App\Utils\Response\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\InstituteRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Controller for Institutes objects
 */
class InstituteController extends AbstractController
{

    /**
     * @Route("/institutes/{id}", methods={"GET"}, name="get_institute")
     * 
     * @ParamConverter("institute", options={"mapping": {"id": "id"}})
     */
    public function getInstitute(Institute $institute)
    {
        return new JsonResponse($institute);
    }

    /**
     * @Route("/institutes", methods={"GET"}, name="get_institutes")
     */
    public function getInstitutes(InstituteRepositoryInterface $instituteRepository)
    {
        $institutes = $instituteRepository->getInstitutes();

        return new JsonResponse($institutes);
    }

    /**
     * @Route("/rates/{id}/institutes", methods={"GET"}, name="get_platformRate_institute")
     * 
     * @ParamConverter("platformRate", options={"mapping": {"id": "id"}})
     */
    public function getInstituteByPlatformRate(InstituteRepositoryInterface $instituteRepository, PlatformRate $platformRate)
    {
        $institute = $instituteRepository->getInstituteByPlatformRate($platformRate);

        return new JsonResponse($institute);
    }

    /**
     * @Route("/reviews/{id}/institutes", methods={"GET"}, name="get_review_institute")
     * 
     * @ParamConverter("review", options={"mapping": {"id": "id"}})
     */
    public function getInstituteByReview(InstituteRepositoryInterface $instituteRepository, Review $review)
    {
        $institute = $instituteRepository->getInstituteByReview($review);

        return new JsonResponse($institute);
    }

}