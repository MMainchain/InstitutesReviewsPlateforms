<?php

namespace App\Repository;

use App\Entity\Review;
use App\Entity\Platform;
use App\Entity\Institute;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * 
 */
class ReviewRepository extends ServiceEntityRepository implements ReviewRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Review::class);
    }

    /**
     * @inheritDoc
     */
    public function getReviewById(int $id): ?Review
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * @inheritDoc
     */
    public function getReviews(): array
    {
        return $this->createQueryBuilder('r')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @inheritDoc
     */
    public function getReviewsByPlatform(Platform $platform): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.platform = :platform')
            ->setParameter('platform', $platform)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @inheritDoc
     */
    public function getReviewsByInstitute(Institute $institute): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.institute = :institute')
            ->setParameter('institute', $institute)
            ->getQuery()
            ->getResult()
        ;
    }
}
