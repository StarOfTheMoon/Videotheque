<?php

namespace VideothequeBundle\Entity;

/**
 * Serie
 */
class Serie
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $showrunner;

    /**
     * @var string
     */
    private $principalActor;

    /**
     * @var string
     */
    private $secondActor1;

    /**
     * @var string
     */
    private $secondActor2;

    /**
     * @var string
     */
    private $secondActor3;

    /**
     * @var int
     */
    private $numSeason;

    /**
     * @var \Date
     */
    private $diffusionDate;

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
     * Set showrunner
     *
     * @param string $showrunner
     *
     * @return Serie
     */
    public function setShowrunner($showrunner)
    {
        $this->showrunner = $showrunner;

        return $this;
    }

    /**
     * Get showrunner
     *
     * @return string
     */
    public function getShowrunner()
    {
        return $this->showrunner;
    }

    /**
     * Set principalActor
     *
     * @param string $principalActor
     *
     * @return Serie
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
     * Set secondActor1
     *
     * @param string $secondActor1
     *
     * @return Serie
     */
    public function setSecondActor1($secondActor1)
    {
        $this->secondActor1 = $secondActor1;

        return $this;
    }

    /**
     * Get secondActor1
     *
     * @return string
     */
    public function getSecondActor1()
    {
        return $this->secondActor1;
    }

    /**
     * Set secondActor2
     *
     * @param string $secondActor2
     *
     * @return Serie
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
     * Set secondActor3
     *
     * @param string $secondActor3
     *
     * @return Serie
     */
    public function setSecondActor3($secondActor3)
    {
        $this->secondActor3 = $secondActor3;

        return $this;
    }

    /**
     * Get secondActor3
     *
     * @return string
     */
    public function getSecondActor3()
    {
        return $this->secondActor3;
    }

    /**
     * Set numSeason
     *
     * @param integer $numSeason
     *
     * @return Serie
     */
    public function setNumSeason($numSeason)
    {
        $this->numSeason = $numSeason;

        return $this;
    }

    /**
     * Get numSeason
     *
     * @return int
     */
    public function getNumSeason()
    {
        return $this->numSeason;
    }

    /**
     * Set diffusionDate
     *
     * @param \Date $diffusionDate
     *
     * @return Serie
     */
    public function setDiffusionDate($diffusionDate)
    {
        $this->diffusionDate = $diffusionDate;

        return $this;
    }

    /**
     * Get diffusionDate
     *
     * @return \Date
     */
    public function getDiffusionDate()
    {
        return $this->diffusionDate;
    }

    /**
     * Set rating
     *
     * @param int $rating
     *
     * @return Serie
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

