<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ToursController extends Controller
{
    public function toursAction(Request $request)
    {
        // replace this example code with whatever you need
        $em=$this->getDoctrine()->getManager();
        $albums = $em->getRepository('AppBundle:Album')->findAll();
        
        return $this->render('default/tours.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
            'albums' => $albums,
        ));
    }
}