<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DiscoController extends Controller
{
    public function albumAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/disco.html.twig', array(
            
        ));
    }

    public function voteAction(Request $request, $idalbum)
    {
     	$em=$this->getDoctrine()->getManager();
      
     	$user = $this->container->get('security.context')->getToken()->getUser();
		$valuevote = 1;

		$vote = new Vote;
		$vote->setIduser($user->getId());
		$vote->setIdalbum($idalbum);
		$vote->setValue($vote->getValue() + $valuevote);

		$em->persist($vote);
		$em->flush;

		$allVote = $em->getRepository('AppBundle:Vote')->findAll();

		return $this->render('default/disco.html.twig', array(
			'allVote' => $allVote,
		));

 	} 
}