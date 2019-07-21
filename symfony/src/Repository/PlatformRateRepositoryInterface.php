<?php

namespace App\Repository;

use App\Entity\Platform;
use App\Entity\Institute;
use App\Entity\PlatformRate;

/**
 * Interface defying an PlatformRateRepository
 */
interface PlatformRateRepositoryInterface
{

    /**
     * Get an single PlatformRate by it's ID
     * 
     * @param int $id
     * 
     * @return PlatformRate|null
     */
    public function getPlatformRateById(int $id): ?PlatformRate;

    /**
     * Get all PlatformRates
     * 
     * @return array(PlatformRate)
     */
    public function getPlatformRates(): array;

    /**
     * Get all PlatformRates by their Institute
     * 
     * @param Institute $institute
     * 
     * @return array(PlatformRate)
     */
    public function getPlatformRatesByInstitute(Institute $institute): array;

    /**
     * Get all PlatformRates by their Platform
     * 
     * @param Platform $platform
     * 
     * @return array(PlatformRate)
     */
    public function getPlatformRatesByPlatform(Platform $platform): array;

}