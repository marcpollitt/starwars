<?php

namespace AppBundle\Service;

use AppBundle\Entity\Character;
use AppBundle\Repository\CharacterInterface;

class StarwarsService
{

    private $starwarsRepo;

    /**
     * StarwarsService constructor.
     */
    public function __construct(CharacterInterface $characterRepo)
    {
        $this->starwarsRepo = $characterRepo;
    }



    /**
     * @param Character $character
     * @return Character
     */
    public function save(Character $character): Character
    {
        return $this->starwarsRepo->save($character);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->starwarsRepo->findAll();
    }

    /**
     * @param $id
     * @return Character
     */
    public function findId($id): Character
    {
        return $this->starwarsRepo->find($id);
    }
}