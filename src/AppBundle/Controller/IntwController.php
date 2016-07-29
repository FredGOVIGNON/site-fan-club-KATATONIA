<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IntwController extends Controller
{
    public function intwAction(Request $request)
    {
        // replace this example code with whatever you need
        $em=$this->getDoctrine()->getManager();
        $albums = $em->getRepository('AppBundle:Album')->findAll();
        
        return $this->render('default/intw.html.twig', array(
        	'albums' => $albums,
            
        ));
    }
}