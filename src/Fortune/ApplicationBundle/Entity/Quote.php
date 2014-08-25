<?php
// File: src/Fortune/ApplicationBundle/Entity/Quote.php

namespace Fortune\ApplicationBundle\Entity;

class Quote
{
    private $id;
    private $content;
    private $createdAt;

    public function __construct($id, $content)
    {
        $this->id = $id;
        $this->content = $content;
        $this->createdAt = new \DateTime();
    }

    public static function fromContent($content)
    {
        return new Quote(null, $content);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
