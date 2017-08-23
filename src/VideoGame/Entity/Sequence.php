<?php

namespace VideoGame\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="sequence")
 * @ORM\Entity(repositoryClass="VideoGame\Repository\SequenceRepository")
 */
class Sequence
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
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="VideoGame\Entity\Game", inversedBy="sequences")
     */
    private $game;

    /**
     * @ORM\Column(type="integer")
     */
     private $videoNumber;  

    /**
     * @ORM\Column(type="integer")
     */
     private $nextVideo;

     /**
      * @ORM\Column(type="string")
      */
      private $startText;


    /**
     * @ORM\Column(type="string")
     */
    private $endText;

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
     * Set nextVideo
     *
     * @param integer $nextVideo
     *
     * @return Sequence
     */
    public function setNextVideo($nextVideo)
    {
        $this->nextVideo = $nextVideo;

        return $this;
    }

    /**
     * Get nextVideo
     *
     * @return integer
     */
    public function getNextVideo()
    {
        return $this->nextVideo;
    }

    /**
     * Set startText
     *
     * @param string $startText
     *
     * @return Sequence
     */
    public function setStartText($startText)
    {
        $this->startText = $startText;

        return $this;
    }

    /**
     * Get startText
     *
     * @return string
     */
    public function getStartText()
    {
        return $this->startText;
    }

    /**
     * Set endText
     *
     * @param string $endText
     *
     * @return Sequence
     */
    public function setEndText($endText)
    {
        $this->endText = $endText;

        return $this;
    }

    /**
     * Get endText
     *
     * @return string
     */
    public function getEndText()
    {
        return $this->endText;
    }

    /**
     * Set game
     *
     * @param \VideoGame\Entity\Game $game
     *
     * @return Sequence
     */
    public function setGame(\VideoGame\Entity\Game $game = null)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \VideoGame\Entity\Game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set videoNumber
     *
     * @param integer $videoNumber
     *
     * @return Sequence
     */
    public function setVideoNumber($videoNumber)
    {
        $this->videoNumber = $videoNumber;

        return $this;
    }

    /**
     * Get videoNumber
     *
     * @return integer
     */
    public function getVideoNumber()
    {
        return $this->videoNumber;
    }
}
