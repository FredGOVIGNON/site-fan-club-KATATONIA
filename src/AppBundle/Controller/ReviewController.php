<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReviewController extends Controller
{
    public function reviewAction(Request $request)
    {
        // replace this example code with whatever you need
        $em=$this->getDoctrine()->getManager();
        $albums = $em->getRepository('AppBundle:Album')->findAll();

        return $this->render('default/review.html.twig', array(
        	'albums' => $albums,
            
        ));
    }
}
