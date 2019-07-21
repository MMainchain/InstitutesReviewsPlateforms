<?php

namespace App\Repository;

use App\Entity\Review;
use App\Entity\Platform;
use App\Entity\Institute;

/**
 * Interface defying an Review
 */
interface ReviewRepositoryInterface
{

    /**
     * Get an single Review by it's ID
     * 
     * @param int $id
     * 
     * @return Review|null
     */
    public function getReviewById(int $id): ?Review;

    /**
     * Get all Reviews
     * 
     * @return array(Review)
     */
    public function getReviews(): array;

    /**
     * Get all Review by their Platform
     * 
     * @param Platform $platform
     * 
     * @return array(Review)
     */
    public function getReviewsByPlatform(Platform $platform): array;

    /**
     * Get all Review by their Institute
     * 
     * @param Institute $institute
     * 
     * @return array(Review)
     */
    public function getReviewsByInstitute(Institute $institute): array;

}