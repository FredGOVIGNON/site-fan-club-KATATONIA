<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use AppBundle\Entity\Vote;
use AppBundle\Entity\Album;

class DiscoController extends Controller
{
    public function albumAction()
    {
    	$em=$this->getDoctrine()->getManager();
        $albums = $em->getRepository('AppBundle:Album')->findAll();

        $tabVote = [];
        $nbVoteTotal = 0;
        
        foreach ($albums as $album)
        {
            $thisVote = count($em->getRepository('AppBundle:Vote')->findByIdalbum($album->getId()));
            $tabVote[] = array(
                'album' => $album->getNom(),
                'vote' => $thisVote
            );

            $nbVoteTotal += $thisVote;

            foreach ($tabVote as $key => $row) {
                $nomAlbum[$key]  = $row['album'];
                $vote[$key] = $row['vote'];
            }
            
            array_multisort($vote, SORT_DESC, $nomAlbum, $tabVote);
        }

        //ajout de la liste des albums pour le système de vote//
        $listVote= $em->getRepository('AppBundle:Album')->findAll();
        
        return $this->render('default/disco.html.twig', array('tab'=>$tabVote, 'albums'=>$listVote));
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