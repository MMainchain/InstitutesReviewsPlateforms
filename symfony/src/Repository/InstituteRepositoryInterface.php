<?php

namespace App\Repository;

use App\Entity\Review;
use App\Entity\Institute;
use App\Entity\PlatformRate;

/**
 * Interface defying an InstituteRepository
 */
interface InstituteRepositoryInterface
{

    /**
     * Get an single Institute by it's ID
     * 
     * @param int $id
     * 
     * @return Insitute|null
     */
    public function getInstituteById(int $id): ?Institute;

    /**
     * Get all Institutes
     * 
     * @return array(Institute)
     */
    public function getInstitutes(): array;

    /**
     * Get an single Institute by it's Review
     * 
     * @param Review $review
     * 
     * @return Insitute|null
     */
    public function getInstituteByReview(Review $review): ?Institute;

    /**
     * Get an single Institute by it's PlateformRate
     * 
     * @param PlatformRate $platformRate
     * 
     * @return Insitute|null
     */
    public function getInstituteByPlatformRate(PlatformRate $platformRate): ?Institute;

}