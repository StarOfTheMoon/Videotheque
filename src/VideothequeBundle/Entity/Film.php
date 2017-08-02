<?php

namespace VideothequeBundle\Entity;

/**
 * Film
 */
class Film
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $producer;

    /**
     * @var string
     */
    private $principalActor;

    /**
     * @var string
     */
    private $secondActor;

    /**
     * @var string
     */
    private $secondActor2;

    /**
     * @var \Date
     */
    private $releaseDate;

    /**
     * @var int
     */
    private $budget;

    /**
     * @var int
     */
    private $rating;


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
     * Set producer
     *
     * @param string $producer
     *
     * @return Film
     */
    public function setProducer($producer)
    {
        $this->producer = $producer;

        return $this;
    }

    /**
     * Get producer
     *
     * @return string
     */
    public function getProducer()
    {
        return $this->producer;
    }

    /**
     * Set principalActor
     *
     * @param string $principalActor
     *
     * @return Film
     */
    public function setPrincipalActor($principalActor)
    {
        $this->principalActor = $principalActor;

        return $this;
    }

    /**
     * Get principalActor
     *
     * @return string
     */
    public function getPrincipalActor()
    {
        return $this->principalActor;
    }

    /**
     * Set secondActor
     *
     * @param string $secondActor
     *
     * @return Film
     */
    public function setSecondActor($secondActor)
    {
        $this->secondActor = $secondActor;

        return $this;
    }

    /**
     * Get secondActor
     *
     * @return string
     */
    public function getSecondActor()
    {
        return $this->secondActor;
    }

    /**
     * Set secondActor2
     *
     * @param string $secondActor2
     *
     * @return Film
     */
    public function setSecondActor2($secondActor2)
    {
        $this->secondActor2 = $secondActor2;

        return $this;
    }

    /**
     * Get secondActor2
     *
     * @return string
     */
    public function getSecondActor2()
    {
        return $this->secondActor2;
    }

    /**
     * Set releaseDate
     *
     * @param \Date $releaseDate
     *
     * @return Film
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \Date
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set budget
     *
     * @param integer $budget
     *
     * @return Film
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return int
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set rating
     *
     * @param int $rating
     *
     * @return Film
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }
}

