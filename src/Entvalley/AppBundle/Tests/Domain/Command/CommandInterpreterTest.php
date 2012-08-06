<?php

namespace Entvalley\AppBundle\Tests\Domain\Command;

use Entvalley\AppBundle\Domain\Command\CommandInterpreter;

class CommandInterpreterTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldExtractCommandFromSource()
    {
        $interpreter = $this->createInterpreter();
        $source = "@create a new ticket";

        $result = $interpreter->interpret($source);

        $expectedCommand = new CreateCommandStub();
        $expectedCommand->setContent("a new ticket");

        $this->assertEquals(array($expectedCommand), $result);
    }

    public function testShouldExtractTwoCommandsFromSource()
    {
        $interpreter = $this->createInterpreter();
        $source = "@create a \r\n new ticket\r\n";
        $source .= "@close this ticket";

        $result = $interpreter->interpret($source);

        $expectedCreatedCommand = new CreateCommandStub();
        $expectedCreatedCommand->setContent("a \r\n new ticket");
        $expectedCloseCommand = new CloseCommandStub();
        $expectedCloseCommand->setContent("this ticket");

        $this->assertEquals(array($expectedCreatedCommand, $expectedCloseCommand), $result);
    }

    public function testShouldNotCreateCommandIfItDoesNotStartWithNewLine()
    {
        $interpreter = $this->createInterpreter();
        $source = "@create you can use @create to create tickets";

        $result = $interpreter->interpret($source);

        $expectedCreatedCommand = new CreateCommandStub();
        $expectedCreatedCommand->setContent("you can use @create to create tickets");

        $this->assertEquals(array($expectedCreatedCommand), $result);
    }

    public function testShouldNotCreateUnknownCommand()
    {
        $interpreter = $this->createInterpreter();
        $source = "@create i think we should add \r\n";
        $source .= "@unknown command";

        $result = $interpreter->interpret($source);

        $expectedCreatedCommand = new CreateCommandStub();
        $expectedCreatedCommand->setContent("i think we should add \r\n@unknown command");

        $this->assertEquals(array($expectedCreatedCommand), $result);
    }

    private function createInterpreter()
    {
        return new CommandInterpreter(array(
            'close' => 'Entvalley\AppBundle\Tests\Domain\Command\CloseCommandStub',
            'create' => 'Entvalley\AppBundle\Tests\Domain\Command\CreateCommandStub',
        ));
    }


}