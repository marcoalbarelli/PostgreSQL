<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('Scuola247CoreBundle:Default:index.html.twig', array('name' => $name));
    }
}
