<?php

namespace AppBundle\Repository;

use AppBundle\AppBundle;
use AppBundle\Entity\Character;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Class CharacterRepository
 * @package AppBundle\Repository
 */
class CharacterRepository extends EntityRepository implements CharacterInterface
{
//    private $entityManager;
//
     /**
     * CharacterRepository constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->_em = $entityManager;
    }
//
    /**
     * @param Character $character
     * @return Character
     */
    public function save(Character $character): Character
    {
        $this->getEntityManager()->persist($character);
        $this->getEntityManager()->flush();

        return $character;
    }

    /**
     * @param $id
     * @return Character
     */
    public function find($id): Character
    {
        return $this->getEntityManager()->find('AppBundle:Character',$id);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
       return $this->getEntityManager()->createQuery(
        'SELECT p FROM AppBundle:Character p ORDER BY p.id ASC'
        )
        ->getResult();
    }
}
