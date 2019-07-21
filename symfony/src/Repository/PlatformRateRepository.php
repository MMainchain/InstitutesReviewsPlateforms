<?php

namespace App\Repository;

use App\Entity\Platform;
use App\Entity\Institute;
use App\Entity\PlatformRate;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * 
 */
class PlatformRateRepository extends ServiceEntityRepository implements PlatformRateRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PlatformRate::class);
    }

    /**
     * @inheritDoc
     */
    public function getPlatformRateById(int $id): ?PlatformRate
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * @inheritDoc
     */
    public function getPlatformRates(): array
    {
        return $this->createQueryBuilder('p')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @inheritDoc
     */
    public function getPlatformRatesByInstitute(Institute $institute): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.institute = :institute')
            ->setParameter('institute', $institute)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @inheritDoc
     */
    public function getPlatformRatesByPlatform(Platform $platform): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.platform = :platform')
            ->setParameter('platform', $platform)
            ->getQuery()
            ->getResult()
        ;
    }

}
