<?php

namespace VideoGame\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="VideoGame\Repository\GameRepository")
 */
class Game
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=256)
     */
    private $name;

   /**
    * @ORM\Column(type="string", length=100)
    */
    private $shortName;

   /**
    * @ORM\Column(type="string")
    */
    private $description;

   /**
    * @ORM\Column(type="string")
    */
    private $videoPath;

    /**
     * @ORM\Column(type="integer")
     */
     private $nbVideos;

     /**
      * @ORM\OneToMany(targetEntity="VideoGame\Entity\Sequence", mappedBy="game", cascade={"remove", "persist"})
      * @ORM\JoinTable(name="videogame_sequences")
      */
     private $sequences;

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
     * @return Game
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
     * Set shortName
     *
     * @param string $shortName
     *
     * @return Game
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;

        return $this;
    }

    /**
     * Get shortName
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Game
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set videoPath
     *
     * @param string $videoPath
     *
     * @return Game
     */
    public function setVideoPath($videoPath)
    {
        $this->videoPath = $videoPath;

        return $this;
    }

    /**
     * Get videoPath
     *
     * @return string
     */
    public function getVideoPath()
    {
        return $this->videoPath;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sequences = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nbVideos
     *
     * @param integer $nbVideos
     *
     * @return Game
     */
    public function setNbVideos($nbVideos)
    {
        $this->nbVideos = $nbVideos;

        return $this;
    }

    /**
     * Get nbVideos
     *
     * @return integer
     */
    public function getNbVideos()
    {
        return $this->nbVideos;
    }

    /**
     * Add sequence
     *
     * @param \VideoGame\Entity\Sequence $sequence
     *
     * @return Game
     */
    public function addSequence(\VideoGame\Entity\Sequence $sequence)
    {
        $this->sequences[] = $sequence;

        return $this;
    }

    /**
     * Remove sequence
     *
     * @param \VideoGame\Entity\Sequence $sequence
     */
    public function removeSequence(\VideoGame\Entity\Sequence $sequence)
    {
        $this->sequences->removeElement($sequence);
    }

    /**
     * Get sequences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSequences()
    {
        return $this->sequences;
    }

    public function getFirstSequenceNumber(){
      if(!count($this->getSequences())){
        return -1;
      }
      $first = array_shift($this->getSequences());
      return $first->getVideoNumber();
    }

}
