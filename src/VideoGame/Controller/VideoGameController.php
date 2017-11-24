<?php

namespace VideoGame\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class VideoGameController extends Controller
{

    /**
     * @Template()
     */
    public function indexAction() {

      $em = $this->getDoctrine()->getManager();

      $games = $em->getRepository('VideoGameBundle:Game')->findBy(
        array(),
        array('date' => 'DESC')
        );

      return array("games" => $games);
    }

    /**
     * @Template()
     */
    public function gameAction($idName) {
      $em = $this->getDoctrine()->getManager();
      $game = $em->getRepository('VideoGameBundle:Game')->findOneByShortName($idName);
      $game_json = json_decode(file_get_contents($this->get('kernel')->getRootDir() . '/Resources/views/Games/'.$game->getShortName().'.json'));
      $idsVideos = array();
      foreach ($game_json->scenario as $sequence) {
        $idsVideos[$sequence->id] = $sequence->id;
      }
      if(isset($game_json->gameovers))
      {
        for ($i = $game_json->gameovers->idmin; $i <= $game_json->gameovers->idmax; $i++) {
          $idsVideos[sprintf("%03d",$i)] = sprintf("%03d",$i);
        }
      }
      ksort($idsVideos);
      return array('game' => $game, "idsVideos" => $idsVideos);
    }

    /**
     * @Template()
     */
    public function mobileGameAction($idName) {
      $em = $this->getDoctrine()->getManager();
      $game = $em->getRepository('VideoGameBundle:Game')->findOneByShortName($idName);
      $game_json = json_decode(file_get_contents($this->get('kernel')->getRootDir() . '/Resources/views/Games/'.$game->getShortName().'.json'));
      $idsVideos = array();
      foreach ($game_json->scenario as $sequence) {
        $idsVideos[$sequence->id] = $sequence->id;
      }
      if(isset($game_json->gameovers))
      {
        for ($i = $game_json->gameovers->idmin; $i <= $game_json->gameovers->idmax; $i++) {
          $idsVideos[sprintf("%03d",$i)] = sprintf("%03d",$i);
        }
      }
      ksort($idsVideos);
      return array('game' => $game, "idsVideos" => $idsVideos);
    }
}
