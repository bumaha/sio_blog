<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlogBundle\Entity\Article;

class DefaultController extends Controller
{
    
    /**
     * Lists all Article entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
    
        $articles = $em->getRepository('BlogBundle:Article')->findAll();
    
        return $this->render('BlogBundle:Default:index.html.twig', array(
            'articles' => $articles,
        ));
    }
    

    /**
     * Finds and displays a Article entity.
     *
     */
    public function detailAction(Article $article)
    {
        return $this->render('BlogBundle:article/detail.html.twig', array(
            'article' => $article,
        ));
    }
    

}
