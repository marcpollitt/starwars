<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 04-Aug-17
 * Time: 10:42
 */

namespace AppBundle\Repository;

use AppBundle\Entity\Character;

interface CharacterInterface
{
    /**
     * @param Character $character
     * @return Character
     */
    public function save(Character $character): Character;

    /**
     * @param $id
     * @return Character
     */
    public function find($id): Character;

    /**
     * @return array
     */
    public function findAll(): array;

}