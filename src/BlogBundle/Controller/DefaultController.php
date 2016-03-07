<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlogBundle\Entity\Article;
use BlogBundle\Entity\Comment;
use Symfony\Component\HttpFoundation\Request;

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
            'articles'    => $articles,
            'commentForm' => $this->buildCommentForm()->createView()
        ));
    }
    

    /**
     * Finds and displays a Article entity.
     *
     */
    public function detailAction(Article $article)
    {
        return $this->render('BlogBundle:article/detail.html.twig', array(
            'article'     => $article,
            'commentForm' => $this->buildCommentForm($article)->createView()
        ));
    }
    
    
    /**
     * build comment form for articles
     * 
     * @param Article $article
     */
    private function buildCommentForm()
    {
        $comment = new Comment();
        $comment->setDate(new \DateTime());
        return $this->createForm('BlogBundle\Form\CommentType', $comment);
    }
    

}
