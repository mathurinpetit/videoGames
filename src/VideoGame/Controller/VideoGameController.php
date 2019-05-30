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
      $debug = $this->container->getParameter('debug');
      if($this->isMobile() && !$debug){
        return $this->redirectToRoute('videogame_mobile');
      }

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
    public function indexMobileAction(Request $request) {
      $debug = $this->container->getParameter('debug');
      if(!$this->isMobile() && !$debug){
          return $this->redirectToRoute('videogame');
      }
      $em = $this->getDoctrine()->getManager();
      $navigator = $request->get('navigator');
      $games = $em->getRepository('VideoGameBundle:Game')->findBy(
        array(),
        array('date' => 'DESC')
        );

      return array("games" => $games,"navigator" => 0);
    }

    /**
     * @Template()
     */
    public function aProposAction() {
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
    public function gameAction(Request $request, $idName) {
      $debug = $this->container->getParameter('debug');
      if($this->isMobile() && !$debug){
          $texte = $request->query->get("texte");
          if($texte){
              return $this->redirect($this->generateUrl('mobile_game',array('idName' => $idName))."?texte=".urlencode($texte));
          }
          return $this->redirectToRoute('mobile_game',array('idName' => $idName));
      }
      $em = $this->getDoctrine()->getManager();
      $game = $em->getRepository('VideoGameBundle:Game')->findOneByShortName($idName);
      $game_json = json_decode(file_get_contents($this->get('kernel')->getRootDir() . '/Resources/views/Games/'.$game->getShortName().'.json'));
      $idsVideos = array();
      $urlgame = (property_exists($game_json, 'urlgame'))? $game_json->urlgame : null;
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
      return array('game' => $game, "idsVideos" => $idsVideos, "urlgame" => $urlgame, 'game_json' => $game_json);
    }

    /**
     * @Template()
     */
    public function mobileGameAction(Request $request, $idName) {
      $debug = $this->container->getParameter('debug');
      if(!$this->isMobile() && !$debug){
        $texte = $request->query->get("texte");
        if($texte){
            return $this->redirect($this->generateUrl('game',array('idName' => $idName))."?texte=".urlencode($texte));
        }
        return $this->redirectToRoute('game',array('idName' => $idName));
      }
      $em = $this->getDoctrine()->getManager();
      $game = $em->getRepository('VideoGameBundle:Game')->findOneByShortName($idName);
      $game_json = json_decode(file_get_contents($this->get('kernel')->getRootDir() . '/Resources/views/Games/'.$game->getShortName().'.json'));
      $idsVideos = array();
      $urlgame = (property_exists($game_json, 'urlgame'))? $game_json->urlgame : null;
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
      return array('game' => $game, "idsVideos" => $idsVideos,"urlgame" => $urlgame, 'game_json' => $game_json);
    }

    public function isMobile(){
      $device = $this->get('mobile_detect.mobile_detector');
      return $device->isMobile() || $device->isTablet();
    }
}
