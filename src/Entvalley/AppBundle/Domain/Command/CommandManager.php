<?php

namespace Entvalley\AppBundle\Domain\Command;

class CommandManager
{
    private $map;
    private $interpreter;

    public function __construct(CommandInterpreter $interpreter, $map)
    {
        $this->interpreter = $interpreter;
        $this->map = $map;
    }

    public function extractCommands($source)
    {
        return $this->interpreter->interpret($source);
    }

    public function getCommandNames()
    {
        return array_map(function ($val) {
            return '@' . $val;
        }, array_keys($this->map));
    }
}
