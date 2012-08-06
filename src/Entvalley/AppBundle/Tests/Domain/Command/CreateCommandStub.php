<?php

namespace Entvalley\AppBundle\Tests\Domain\Command;

use Entvalley\AppBundle\Domain\Command\AbstractCommand;

class CreateCommandStub extends AbstractCommand
{
    public function execute()
    {
        return true;
    }

    public function getName()
    {
        return 'create';
    }
}
