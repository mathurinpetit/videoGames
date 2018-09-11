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
    * @ORM\Column(type="string", length=4096)
    */
    private $description;

    /**
     * @ORM\Column(type="string", length=4096, nullable=true)
     */
     private $mobile_description;

   /**
    * @ORM\Column(type="string")
    */
    private $videoPath;

     /**
      * @ORM\Column(type="integer")
      */
      private $width;

     /**
      * @ORM\Column(type="integer")
      */
      private $height;


     /**
      * @ORM\Column(type="datetime")
      */
      private $date;


      /**
       * @ORM\Column(type="boolean")
       */
      private $active;

      /**
       * @ORM\Column(type="boolean")
       */
      private $visible;



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

    }


    /**
     * Set width
     *
     * @param integer $width
     *
     * @return Game
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     *
     * @return Game
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Game
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

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Game
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     *
     * @return Game
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set mobileDescription
     *
     * @param string $mobileDescription
     *
     * @return Game
     */
    public function setMobileDescription($mobileDescription)
    {
        $this->mobile_description = $mobileDescription;

        return $this;
    }

    /**
     * Get mobileDescription
     *
     * @return string
     */
    public function getMobileDescription()
    {
        return $this->mobile_description;
    }
}
