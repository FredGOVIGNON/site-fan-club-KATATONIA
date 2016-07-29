<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use UserBundle\Entity\Comment;


class CommentController extends Controller 
{

	public function postAction(Request $request) 
	{

		$em=$this->getDoctrine()->getManager();
        $albums = $em->getRepository('AppBundle:Album')->findAll();
        
        $user = $this->container->get('security.context')->getToken()->getUser();
        
		$comment = new Comment;

		if ($request->request->get('titre') != NULL) {
	        $titre = $request->request->get('titre');
	        $contenu = $request->request->get('contenu');
	        $date = $request->request->get('date');
	        
	        $comment->setTitre($titre);
	        $comment->setContenu($contenu);
	        $comment->setdate($date);
	        $comment->setAuteur($user->getUsername());

	       $em->persist($comment);
	       $em->flush();
   		}

   		$allComment = $em->getRepository('UserBundle:Comment')->findAll();

        return $this->render('default/comment.html.twig', array(
            'allComment' => $allComment,
            'albums' => $albums,
        ));  
	}
}































