<?php
/**
 * Created by PhpStorm.
 * User: Firas
 * Date: 11/01/2017
 * Time: 21:18
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function findByName($search)
    {
        return $this->createQueryBuilder('p')
            ->join('p.teacherSkills','r')
            ->join('r.course','c')
            ->setParameter('search', '%'.$search.'%' )
            ->where('p.username LIKE :search or p.description LIKE :search or c.name LIKE :search or p.country LIKE :search')
            ->getQuery()
            ->getResult();
    }
}