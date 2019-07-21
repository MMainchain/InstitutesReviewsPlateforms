<?php

namespace App\Repository;

use App\Entity\Review;
use App\Entity\Institute;
use App\Entity\PlatformRate;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * 
 */
class InstituteRepository extends ServiceEntityRepository implements InstituteRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Institute::class);
    }

    /**
     * @inheritDoc
     */
    public function getInstituteById(int $id): ?Institute
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * @inheritDoc
     */
    public function getInstitutes(): array
    {
        return $this->createQueryBuilder('i')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @inheritDoc
     */
    public function getInstituteByReview(Review $review): ?Institute
    {
        return $this->createQueryBuilder('i')
            ->leftJoin('i.reviews', 'r')
            ->andWhere('r.id = :id')
            ->setParameter('id', $review->getId())
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * @inheritDoc
     */
    public function getInstituteByPlatformRate(PlatformRate $platformRate): ?Institute
    {
        return $this->createQueryBuilder('i')
            ->leftJoin('i.platformRates', 'p')
            ->andWhere('p.id = :id')
            ->setParameter('id', $platformRate->getId())
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
