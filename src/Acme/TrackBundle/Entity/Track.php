<?php

namespace Acme\TrackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Track
 */
class Track
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var int
     */
    private $raw;

    /**
     * @var int
     */
    private $uniq;

    /**
     * @var \DateTime
     */
    private $date;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set domain
     *
     * @param string $domain
     * @return Track
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string 
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set raw
     *
     * @param integer $raw
     * @return Track
     */
    public function setRaw($raw)
    {
        $this->raw = $raw;

        return $this;
    }

    /**
     * Get raw
     *
     * @return integer 
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * Set uniq
     *
     * @param integer $uniq
     * @return Track
     */
    public function setUniq($uniq)
    {
        $this->uniq = $uniq;

        return $this;
    }

    /**
     * Get uniq
     *
     * @return integer
     */
    public function getUniq()
    {
        return $this->uniq;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Track
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
}
