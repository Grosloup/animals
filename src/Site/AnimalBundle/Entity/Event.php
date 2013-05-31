<?php

namespace Site\AnimalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Site\AdminBundle\Entity\EventType;

/**
 * Event
 *
 * @ORM\Table(name="events")
 * @ORM\Entity(repositoryClass="Site\AnimalBundle\Entity\EventRepository")
 */
class Event
{
    /**
     * @ORM\ManyToOne(targetEntity="Site\UserBundle\Entity\User", inversedBy="events")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $author;
    /**
     * @ORM\ManyToOne(targetEntity="Site\AdminBundle\Entity\EventType", inversedBy="events")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $type;
    /**
     * @ORM\ManyToOne(targetEntity="Site\AnimalBundle\Entity\Animal", inversedBy="events")
     * @ORM\JoinColumn(name="animal_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $animal;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

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
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Event
     */
    public function setBody($body)
    {
        $this->body = $body;

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
     * @return Event
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Event
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get type
     *
     * @return EventType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param EventType $type
     * @return Event
     */
    public function setType(EventType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get animal
     *
     * @return Animal
     */
    public function getAnimal()
    {
        return $this->animal;
    }

    /**
     * Set animal
     *
     * @param Animal $animal
     * @return Event
     */
    public function setAnimal(Animal $animal = null)
    {
        $this->animal = $animal;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Site\UserBundle\Entity\User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set author
     *
     * @param \Site\UserBundle\Entity\User $author
     * @return Event
     */
    public function setAuthor(\Site\UserBundle\Entity\User $author = null)
    {
        $this->author = $author;

        return $this;
    }
}
