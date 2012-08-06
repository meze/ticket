<?php

namespace Entvalley\AppBundle\Entity;

class Task
{
    const STATUS_NEW = 1;
    const STATUS_ACCEPTED = 2;
    const STATUS_CLOSED = 3;
    const STATUS_REJECTED = 4;
    const STATUS_REOPENED = 5;
    const STATUS_WILLNOTFIX = 6;

    private $id;
    private $title;
    private $status;
    private $text;
    private $author;
    private $assignedTo;
    private $createdAt;
    private $lastModification;

    public function setAssignedTo($assignedTo)
    {
        $this->assignedTo = $assignedTo;
    }

    public function getAssignedTo()
    {
        return $this->assignedTo;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setLastModification($lastModification)
    {
        $this->lastModification = $lastModification;
    }

    public function getLastModification()
    {
        return $this->lastModification;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}