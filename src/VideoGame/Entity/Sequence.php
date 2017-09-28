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
    * @ORM\Column(type="string", nullable=true)
    */
    private $endText;


   /**
    * @ORM\Column(type="string", nullable=true)
    */
    private $durationEndText;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $text3D;

    /**
      * @ORM\Column(type="string")
      */
    private $typeTransition;

    /** KEYBOARDMULTI ou KEYBOARDONE */
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
     private $nextVideo;


    /** KEYBOARDMULTI */

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
     private $multiNumMin;

     /**
      * @ORM\Column(type="integer", nullable=true)
      */
      private $multiNumMax;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
     private $nbRepeat;

     /** KEYBOARDONE */

     /** format ( keyCode : numVideo )*/
     /**
      * @ORM\Column(type="integer", nullable=true)
      */
      private $nextSeq;

      /** KEYBOARDONE ou CHOICENEXT */

      /**
       * @ORM\Column(type="integer", nullable=true)
       */
       private $gameOverVideo;

       /** CHOICENEXT */
       /** format ( keyCode1 : numVideo1 | keyCode2 : numVideo2 )*/
       /**
        * @ORM\Column(type="string", nullable=true)
        */
       private $nextSeqArray;

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

    /**
     * Set text3D
     *
     * @param boolean $text3D
     *
     * @return Sequence
     */
    public function setText3D($text3D)
    {
        $this->text3D = $text3D;

        return $this;
    }

    /**
     * Get text3D
     *
     * @return boolean
     */
    public function getText3D()
    {
        return $this->text3D;
    }

    /**
     * Set typeTransition
     *
     * @param string $typeTransition
     *
     * @return Sequence
     */
    public function setTypeTransition($typeTransition)
    {
        $this->typeTransition = $typeTransition;

        return $this;
    }

    /**
     * Get typeTransition
     *
     * @return string
     */
    public function getTypeTransition()
    {
        return $this->typeTransition;
    }

    /**
     * Set durationEndText
     *
     * @param string $durationEndText
     *
     * @return Sequence
     */
    public function setDurationEndText($durationEndText)
    {
        $this->durationEndText = $durationEndText;

        return $this;
    }

    /**
     * Get durationEndText
     *
     * @return string
     */
    public function getDurationEndText()
    {
        return $this->durationEndText;
    }

    /**
     * Set multiNumMin
     *
     * @param integer $multiNumMin
     *
     * @return Sequence
     */
    public function setMultiNumMin($multiNumMin)
    {
        $this->multiNumMin = $multiNumMin;

        return $this;
    }

    /**
     * Get multiNumMin
     *
     * @return integer
     */
    public function getMultiNumMin()
    {
        return $this->multiNumMin;
    }

    /**
     * Set multiNumMax
     *
     * @param integer $multiNumMax
     *
     * @return Sequence
     */
    public function setMultiNumMax($multiNumMax)
    {
        $this->multiNumMax = $multiNumMax;

        return $this;
    }

    /**
     * Get multiNumMax
     *
     * @return integer
     */
    public function getMultiNumMax()
    {
        return $this->multiNumMax;
    }

    /**
     * Set nbRepeat
     *
     * @param integer $nbRepeat
     *
     * @return Sequence
     */
    public function setNbRepeat($nbRepeat)
    {
        $this->nbRepeat = $nbRepeat;

        return $this;
    }

    /**
     * Get nbRepeat
     *
     * @return integer
     */
    public function getNbRepeat()
    {
        return $this->nbRepeat;
    }

    /**
     * Set nextSeq
     *
     * @param string $nextSeq
     *
     * @return Sequence
     */
    public function setNextSeq($nextSeq)
    {
        $this->nextSeq = $nextSeq;

        return $this;
    }

    /**
     * Get nextSeq
     *
     * @return string
     */
    public function getNextSeq()
    {
        return $this->nextSeq;
    }

    /**
     * Set gameOverVideo
     *
     * @param integer $gameOverVideo
     *
     * @return Sequence
     */
    public function setGameOverVideo($gameOverVideo)
    {
        $this->gameOverVideo = $gameOverVideo;

        return $this;
    }

    /**
     * Get gameOverVideo
     *
     * @return integer
     */
    public function getGameOverVideo()
    {
        return $this->gameOverVideo;
    }

    /**
     * Set nextSeqArray
     *
     * @param string $nextSeqArray
     *
     * @return Sequence
     */
    public function setNextSeqArray($nextSeqArray)
    {
        $this->nextSeqArray = $nextSeqArray;

        return $this;
    }

    /**
     * Get nextSeqArray
     *
     * @return string
     */
    public function getNextSeqArray()
    {
        return $this->nextSeqArray;
    }
}
