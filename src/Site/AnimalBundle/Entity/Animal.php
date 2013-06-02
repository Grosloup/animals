<?php

namespace Site\AnimalBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Site\ZooBundle\Entity\Zoo;

/**
 * Animal
 *
 * @ORM\Table(name="animals")
 * @ORM\Entity(repositoryClass="Site\AnimalBundle\Entity\AnimalRepository")
 */
class Animal
{
    /**
     * @var bool
     * @ORM\Column(name="isWeightable", type="boolean")
     */
    protected $isWeightable = false;
    /**
     * @ORM\ManyToOne(targetEntity="Site\ZooBundle\Entity\Zoo")
     * @ORM\JoinColumn(name="birthplace_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $birthPlace;
    /**
     * @ORM\Column(name="motherId", type="string", length=255, nullable=true)
     */
    protected $motherId;
    /**
     * @ORM\ManyToOne(targetEntity="Site\ZooBundle\Entity\Zoo")
     * @ORM\JoinColumn(name="origin_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $origin;

    /**
     * @ORM\Column(name="fatherId", type="string", length=255, nullable=true)
     */
    protected $fatherId;
    /**
     * @ORM\ManyToOne(targetEntity="Site\AnimalBundle\Entity\Species", inversedBy="animals")
     * @ORM\JoinColumn(name="species_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $species;
    /**
     * @ORM\ManyToMany(targetEntity="Site\AnimalBundle\Entity\Weight")
     * @ORM\JoinTable(
     * name="animals_weights",
     * joinColumns={@ORM\JoinColumn(name="animal_id", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="weight_id",referencedColumnName="id", unique=true)}
     * )
     */
    protected $weights;

    /**
     * @ORM\OneToMany(targetEntity="Site\AnimalBundle\Entity\Event", mappedBy="animal")
     * @ORM\OrderBy({"date"="DESC"})
     */
    protected $events;
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;
    /**
     * @var string
     *
     * @ORM\Column(name="chip", type="string", length=255, nullable=true)
     */
    private $chip;
    /**
     * @var string
     *
     * @ORM\Column(name="earring", type="string", length=255, nullable=true)
     */
    private $earring;
    /**
     * @var string
     *
     * @ORM\Column(name="collar", type="string", length=255, nullable=true)
     */
    private $collar;
    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=255)
     */
    private $sex;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="datetime", nullable=true)
     */
    private $birthdate;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="indate", type="datetime", nullable=true)
     */
    private $indate;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="outdate", type="datetime", nullable=true)
     */
    private $outdate;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deathdate", type="datetime", nullable=true)
     */
    private $deathdate;
    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     * @Gedmo\Slug(fields={"name"})
     */
    private $slug;

    /**
     * @ORM\Column(name="status", type="string", length=50)
     */
    protected $status;

    protected $dateTimeFormat = "d/m/Y H:i:s";
    protected $dateFormat = "d/m/Y";

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->weights = new ArrayCollection();
        $this->events = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Animal
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get chip
     *
     * @return string
     */
    public function getChip()
    {
        return $this->chip;
    }

    /**
     * Set chip
     *
     * @param string $chip
     * @return Animal
     */
    public function setChip($chip)
    {
        $this->chip = $chip;

        return $this;
    }

    /**
     * Get earring
     *
     * @return string
     */
    public function getEarring()
    {
        return $this->earring;
    }

    /**
     * Set earring
     *
     * @param string $earring
     * @return Animal
     */
    public function setEarring($earring)
    {
        $this->earring = $earring;

        return $this;
    }

    /**
     * Get collar
     *
     * @return string
     */
    public function getCollar()
    {
        return $this->collar;
    }

    /**
     * Set collar
     *
     * @param string $collar
     * @return Animal
     */
    public function setCollar($collar)
    {
        $this->collar = $collar;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return Animal
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        if($this->birthdate instanceof \DateTime){
            return $this->birthdate->format($this->dateFormat);
        }
        return $this->birthdate;
    }

    /**
     * Set birthdate
     *
     * @param string $birthdate
     * @return Animal
     */
    public function setBirthdate($birthdate)
    {
        if(is_string($birthdate)){
            $birthdate = \DateTime::createFromFormat($this->dateTimeFormat,$birthdate . " 00:00:00");
        }
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getAge()
    {
        if($this->birthdate != null && $this->birthdate instanceof \DateTime){
            return $this->birthdate->diff(new \DateTime("now"))->y;
        }
        return 0;
        
    }

    /**
     * Get indate
     *
     * @return \DateTime
     */
    public function getIndate()
    {
        if($this->indate instanceof \DateTime){
            return $this->indate->format($this->dateFormat);
        }
        return $this->indate;
    }

    /**
     * Set indate
     *
     * @param string $indate
     * @return Animal
     */
    public function setIndate($indate)
    {
        if(is_string($indate)){
            $indate = \DateTime::createFromFormat($this->dateTimeFormat,$indate . " 00:00:00");
        }
        $this->indate = $indate;

        return $this;
    }

    /**
     * Get outdate
     *
     * @return \DateTime
     */
    public function getOutdate()
    {
        if($this->outdate instanceof \DateTime){
            return $this->outdate->format($this->dateFormat);
        }
        return $this->outdate;
    }

    /**
     * Set outdate
     *
     * @param string $outdate
     * @return Animal
     */
    public function setOutdate($outdate)
    {
        if(is_string($outdate)){
            $outdate = \DateTime::createFromFormat($this->dateTimeFormat,$outdate . " 00:00:00");

        }
        $this->outdate = $outdate;

        return $this;
    }

    /**
     * Get deathdate
     *
     * @return \DateTime
     */
    public function getDeathdate()
    {
        if($this->deathdate instanceof \DateTime){
            return $this->deathdate->format($this->dateFormat);
        }
        return $this->deathdate;
    }

    /**
     * Set deathdate
     *
     * @param string $deathdate
     * @return Animal
     */
    public function setDeathdate($deathdate)
    {
        if(is_string($deathdate)){
            $deathdate = \DateTime::createFromFormat($this->dateTimeFormat,$deathdate . " 00:00:00");
        }
        $this->deathdate = $deathdate;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Animal
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get species
     *
     * @return Species
     */
    public function getSpecies()
    {
        return $this->species;
    }

    /**
     * Set species
     *
     * @param Species $species
     * @return Animal
     */
    public function setSpecies(Species $species = null)
    {
        $this->species = $species;

        return $this;
    }

    /**
     * Get isWeightable
     *
     * @return boolean
     */
    public function getIsWeightable()
    {
        return $this->isWeightable;
    }

    /**
     * Set isWeightable
     *
     * @param boolean $isWeightable
     * @return Animal
     */
    public function setIsWeightable($isWeightable)
    {
        $this->isWeightable = $isWeightable;

        return $this;
    }

    /**
     * Get motherId
     *
     * @return string
     */
    public function getMotherId()
    {
        return $this->motherId;
    }

    /**
     * Set motherId
     *
     * @param string $motherId
     * @return Animal
     */
    public function setMotherId($motherId)
    {
        $this->motherId = $motherId;

        return $this;
    }

    /**
     * Get fatherId
     *
     * @return string
     */
    public function getFatherId()
    {
        return $this->fatherId;
    }

    /**
     * Set fatherId
     *
     * @param string $fatherId
     * @return Animal
     */
    public function setFatherId($fatherId)
    {
        $this->fatherId = $fatherId;

        return $this;
    }

    /**
     * Add weights
     *
     * @param Weight $weights
     * @return Animal
     */
    public function addWeight(Weight $weights)
    {
        $this->weights[] = $weights;

        return $this;
    }

    /**
     * Remove weights
     *
     * @param Weight $weights
     */
    public function removeWeight(Weight $weights)
    {
        $this->weights->removeElement($weights);
    }

    /**
     * Get weights
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWeights()
    {
        return $this->weights;
    }

    /**
     * Add events
     *
     * @param Event $events
     * @return Animal
     */
    public function addEvent(Event $events)
    {
        $this->events[] = $events;

        return $this;
    }

    /**
     * Remove events
     *
     * @param Event $events
     */
    public function removeEvent(Event $events)
    {
        $this->events->removeElement($events);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvents()
    {
        return $this->events;
    }


    /**
     * Set origin
     *
     * @param Zoo $origin
     * @return Animal
     */
    public function setOrigin(Zoo $origin = null)
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * Get origin
     *
     * @return Zoo
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Set birthPlace
     *
     * @param Zoo $birthPlace
     * @return Animal
     */
    public function setBirthPlace(Zoo $birthPlace = null)
    {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    /**
     * Get birthPlace
     *
     * @return Zoo
     */
    public function getBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}
