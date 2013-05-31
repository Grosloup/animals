<?php

namespace Site\AnimalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Weight
 *
 * @ORM\Table(name="weights")
 * @ORM\Entity(repositoryClass="Site\AnimalBundle\Entity\WeightRepository")
 */
class Weight
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float")
     */
    private $value;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    /**
     * @var string
     *
     * @ORM\Column(name="unity", type="string", length=10)
     */
    private $unity;

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
     * Get value
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param float $value
     * @return Weight
     */
    public function setValue($value)
    {
        $this->value = $value;

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

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Weight
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get unity
     *
     * @return string
     */
    public function getUnity()
    {
        return $this->unity;
    }

    /**
     * Set unity
     *
     * @param string $unity
     * @return Weight
     */
    public function setUnity($unity)
    {
        $this->unity = $unity;

        return $this;
    }
}
