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
        return array();
    }

    /**
     * @Template()
     */
    public function gameAction($gameName) {
        
        return array();
    }
}
