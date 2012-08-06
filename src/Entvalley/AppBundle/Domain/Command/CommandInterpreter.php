<?php

namespace Entvalley\AppBundle\Domain\Command;

use RuntimeException;

class CommandInterpreter
{
    private $map;

    public function __construct(array $map)
    {
        $this->map = $map;
    }

    public function interpret($source)
    {
        $expr = $this->buildNamesExpression();

        $matches = preg_split('~(?:^(' . $expr . ') )~m', $source, -1, PREG_SPLIT_DELIM_CAPTURE);

        reset($matches);
        while (next($matches)) {
            $class = $this->map[ltrim(current($matches), '@ ')];
            $command = new $class;

            if (!($command instanceof Command)) {
                throw new RuntimeException('The class "' . $class . '" should implement the command interface');
            }
            $command->setContent(trim(next($matches)));
            $result[] = $command;
        }

        return $result;
    }

    private function buildNamesExpression()
    {
        return '@' . implode('|@', array_keys($this->map));
    }
}
