<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use AppBundle\Entity\Vote;

class DiscoController extends Controller
{
    public function albumAction(Request $request)
    {
    	$em=$this->getDoctrine()->getManager();
        $allVote = $em->getRepository('AppBundle:Vote')->findAll();
        $albums = $em->getRepository('AppBundle:Album')->findAll();

        return $this->render('default/disco.html.twig', array(
            'allVote' => $allVote,
            'albums' => $albums,
        ));
    }

    public function voteAction(Request $request)
    {
     	$em=$this->getDoctrine()->getManager();

     	$idalbum = $request->request->get('album');
      
     	$user = $this->container->get('security.context')->getToken()->getUser();
		$valuevote = 1;

		$vote = new Vote;
		$vote->setIduser($user->getId());
		$vote->setIdalbum($idalbum);
		$vote->setValue($vote->getValue() + $valuevote);

		$em->persist($vote);
		$em->flush();

		$allVote = $em->getRepository('AppBundle:Vote')->findAll();
		$albums = $em->getRepository('AppBundle:Album')->findAll();

		$url = $this->generateUrl('discographie');
        $response = new RedirectResponse($url);
        return $response;
 	} 
}