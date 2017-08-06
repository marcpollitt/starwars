<?php

namespace AppBundle\Entity;

/**
 * Character
 */
class Character
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $amount;

    /**
     * @var int
     */
    private $hit;

    /**
     * @var int
     */
    private $lives;

    /**
     * @var int
     */
    private $numberOfHits;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Character
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return Character
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set hit
     *
     * @param integer $hit
     *
     * @return Character
     */
    public function setHit($hit)
    {
        $this->hit = $hit;

        return $this;
    }

    /**
     * Get hit
     *
     * @return int
     */
    public function getHit()
    {
        return $this->hit;
    }

    /**
     * Set lives
     *
     * @param integer $lives
     *
     * @return Character
     */
    public function setLives($lives)
    {
        $this->lives = $lives;

        return $this;
    }

    /**
     * Get lives
     *
     * @return int
     */
    public function getLives()
    {
        return $this->lives;
    }

    /**
     * Set numberOfHits
     *
     * @param integer $numberOfHits
     *
     * @return Character
     */
    public function setNumberOfHits($numberOfHits)
    {
        $this->numberOfHits = $numberOfHits;

        return $this;
    }

    /**
     * Get numberOfHits
     *
     * @return int
     */
    public function getNumberOfHits()
    {
        return $this->numberOfHits;
    }
}
