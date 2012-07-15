<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\DemoBundle\Entity\Order
 */
class Order
{
    /**
     * @var datetime $date
     */
    private $date;

    /**
     * @var integer $id
     */
    private $id;


    /**
     * Set date
     *
     * @param datetime $date
     * @return Order
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get date
     *
     * @return datetime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}