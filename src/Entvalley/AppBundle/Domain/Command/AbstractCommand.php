<?php

namespace Entvalley\AppBundle\Domain\Command;

abstract class AbstractCommand implements Command
{
    protected $content;

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }
}