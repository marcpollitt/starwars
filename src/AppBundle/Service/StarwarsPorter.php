<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 04-Aug-17
 * Time: 12:22
 */

namespace AppBundle\Service;


use AppBundle\Entity\Character;

class StarwarsPorter
{
    /**
     * @param Character $character
     * @return array
     */
    public function convert(Character $character): array
    {
        $data['id'] = $character->getId();
        $data['name'] = $character->getName();
        $data['amount'] = $character->getAmount();
        $data['lives'] = $character->getLives();
        $data['numberOfHits'] = $character->getNumberOfHits();
        $data['hit'] = $character->getHit();
        return $data;
    }

    /**
     * @param array $characterArray
     * @return Character
     */
    public function create(array $characterArray): Character
    {
        $character = new Character();

        $character->setName($characterArray['name']);
        $character->setAmount($characterArray['amount']);
        $character->setHit($characterArray['hit']);
        $character->setLives($characterArray['lives']);
        $character->setNumberOfHits($characterArray['amount'] * $characterArray['lives']);

        return $character;
    }
}