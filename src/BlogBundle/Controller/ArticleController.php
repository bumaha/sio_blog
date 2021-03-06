<?php

namespace BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BlogBundle\Entity\Article;
use BlogBundle\Entity\Comment;
use BlogBundle\Form\ArticleType;
use BlogBundle\Form\CommentType;

/**
 * Article controller.
 *
 */
class ArticleController extends Controller
{

    /**
     * Lists all Article entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
    
        $articles = $em->getRepository('BlogBundle:Article')->findAll();
    
        return $this->render('BlogBundle:article:index.html.twig', array(
            'articles' => $articles,
        ));
    }
    
    /**
     * Creates a new Article entity.
     *
     */
    public function newAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm('BlogBundle\Form\ArticleType', $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_show', array('id' => $article->getId()));
        }

        return $this->render('BlogBundle:article/new.html.twig', array(
            'article' => $article,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Article entity.
     *
     */
    public function editAction(Request $request, Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);
        $editForm = $this->createForm('BlogBundle\Form\ArticleType', $article);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_edit', array('id' => $article->getId()));
        }

        return $this->render('BlogBundle:article/edit.html.twig', array(
            'article' => $article,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Article entity.
     *
     */
    public function deleteAction(Request $request, Article $article)
    {
        $form = $this->createDeleteForm($article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }

        return $this->redirectToRoute('article_index');
    }

    /**
     * Creates a form to delete a Article entity.
     *
     * @param Article $article The Article entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Article $article)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('article_delete', array('id' => $article->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    

    /**
     * Add Comment to Article
     */
    public function addCommentAction(Request $request, $articleId)
    {
        $comment = new Comment();
        $form = $this->createForm('BlogBundle\Form\CommentType', $comment);
        
        $form->handleRequest($request);
        
        // TODO: form handling!?
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
           
            $em->persist($comment);
            $em->flush();
        }   
        
        return $this->redirectToRoute('article_index');
    
    }
    
}
