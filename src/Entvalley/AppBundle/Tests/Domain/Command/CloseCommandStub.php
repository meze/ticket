<?php

namespace Entvalley\AppBundle\Tests\Domain\Command;

use Entvalley\AppBundle\Domain\Command\AbstractCommand;

class CloseCommandStub extends AbstractCommand
{
    public function execute()
    {
        return true;
    }

    public function getName()
    {
        return 'close';
    }
}
