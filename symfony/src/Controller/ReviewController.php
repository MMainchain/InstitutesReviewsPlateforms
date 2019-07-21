<?php

namespace App\Controller;

use App\Entity\Review;
use App\Entity\Platform;
use App\Entity\Institute;
use App\Utils\Response\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ReviewRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Controller for Review objects
 */
class ReviewController extends AbstractController
{

    /**
     * @Route("/reviews/{id}", methods={"GET"}, name="get_review")
     * 
     * @ParamConverter("review", options={"mapping": {"id": "id"}})
     */
    public function getReview(Review $review)
    {
        return new JsonResponse($review);
    }

    /**
     * @Route("/reviews", methods={"GET"}, name="get_reviews")
     */
    public function getReviews(ReviewRepositoryInterface $reviewRepository)
    {
        $reviews = $reviewRepository->getReviews();

        return new JsonResponse($reviews);
    }

    /**
     * @Route("/institutes/{id}/reviews", methods={"GET"}, name="get_institute_review")
     * 
     * @ParamConverter("institute", options={"mapping": {"id": "id"}})
     */
    public function getReviewByInstitute(ReviewRepositoryInterface $reviewRepository, Institute $institute)
    {
        $reviews = $reviewRepository->getReviewsByInstitute($institute);

        return new JsonResponse($reviews);
    }

    /**
     * @Route("/platforms/{id}/reviews", methods={"GET"}, name="get_platform_review")
     * 
     * @ParamConverter("platform", options={"mapping": {"id": "id"}})
     */
    public function getReviewByPlatform(ReviewRepositoryInterface $reviewRepository, Platform $platform)
    {
        $reviews = $reviewRepository->getReviewsByPlatform($platform);

        return new JsonResponse($reviews);
    }

}