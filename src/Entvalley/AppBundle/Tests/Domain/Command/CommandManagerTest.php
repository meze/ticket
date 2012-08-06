<?php

namespace Entvalley\AppBundle\Tests\Domain\Command;

use Entvalley\AppBundle\Domain\Command\CommandManager;

class CommandManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldReturnCommandNamesWithAtSign()
    {
        $manager = new CommandManager(array(
            'create' => 'createStub',
            'close' => 'closeStub'
        ));

        $this->assertEquals(array('@create', '@close'), $manager->getCommandNames());
    }
}