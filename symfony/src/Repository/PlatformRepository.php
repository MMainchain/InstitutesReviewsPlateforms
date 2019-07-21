<?php

namespace App\Repository;

use App\Entity\Review;
use App\Entity\Platform;
use App\Entity\PlatformRate;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * 
 */
class PlatformRepository extends ServiceEntityRepository implements PlatformRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Platform::class);
    }

    /**
     * @inheritDoc
     */
    public function getPlatformById(int $id): ?Platform
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
    public function getPlatforms(): array
    {
        return $this->createQueryBuilder('p')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @inheritDoc
     */
    public function getPlatformByReview(Review $review): ?Platform
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.reviews', 'r')
            ->andWhere('r.id = :id')
            ->setParameter('id', $review->getId())
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * @inheritDoc
     */
    public function getPlatformByPlatformRate(PlatformRate $platformRate): ?Platform
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.platformRates', 'r')
            ->andWhere('r.id = :id')
            ->setParameter('id', $platformRate->getId())
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
