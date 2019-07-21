<?php

namespace App\Repository;

use App\Entity\Review;
use App\Entity\Platform;
use App\Entity\PlatformRate;

/**
 * Interface defying an PlatformRepository
 */
interface PlatformRepositoryInterface
{

    /**
     * Get an single Platform by it's ID
     * 
     * @param int $id
     * 
     * @return Platform|null
     */
    public function getPlatformById(int $id): ?Platform;

    /**
     * Get all Platforms
     * 
     * @return array(Platform)
     */
    public function getPlatforms(): array;

    /**
     * Get an single Platform by it's Review
     * 
     * @param Review $review
     * 
     * @return Platform|null
     */
    public function getPlatformByReview(Review $review): ?Platform;

    /**
     * Get an single Platform by it's PlatformRate
     * 
     * @param PlatformRate $platformRate
     * 
     * @return Platform|null
     */
    public function getPlatformByPlatformRate(PlatformRate $platformRate): ?Platform;

}