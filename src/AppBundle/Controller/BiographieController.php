<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BiographieController extends Controller
{
    public function biographieAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/biographie.html.twig', array(
            
        ));
    }
}