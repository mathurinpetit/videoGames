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

      $games = $em->getRepository('VideoGameBundle:Game')->findAll();

      return array("games" => $games);
    }

    /**
     * @Template()
     */
    public function gameAction($idName) {
      $em = $this->getDoctrine()->getManager();
      $game = $em->getRepository('VideoGameBundle:Game')->findOneByShortName($idName);
      return array('game' => $game);
    }
}
