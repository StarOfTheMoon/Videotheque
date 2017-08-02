<?php

namespace BlogBundle\Entity;

/**
 * Post
 */
class Post
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $body;


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
     * Set author
     *
     * @param string $author
     *
     * @return Post
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return Post
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }
}

