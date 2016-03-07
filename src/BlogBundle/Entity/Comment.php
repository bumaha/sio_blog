<?php

namespace BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use BlogBundle\Entity\Article;


/**
 * Article
 */
class Comment
{
    /**
     * @var int
     */
    private $id;
    
    /**
     * @var Article
     */
    private $article;
    
    
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $date;
    
    /**
     * @var Collection
     */
    private $articles;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }
    
    

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Comment
     */
    public function setUsername($username)
    {
        $this->username = $content;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    
    /**
     * Set content
     *
     * @param string $content
     *
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Comment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    
    /**
     * Set article
     *
     * @param \BlogBundle\Entity\Article $article
     * 
     * @return Comment
     */
    public function setArticle(Article $article)
    {
        $this->article = $article;
        
        return $this;
    }

    /**
     * Get articles
     *
     * @return Article
     */
    public function getArticle()
    {
        return $this->article;
    }
}
