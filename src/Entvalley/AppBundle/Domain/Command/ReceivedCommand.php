<?php

namespace Entvalley\AppBundle\Domain\Command;

class ReceivedCommand
{
    private $text;

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }
}
