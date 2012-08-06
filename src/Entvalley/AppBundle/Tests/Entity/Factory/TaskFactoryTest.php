<?php

namespace Entvalley\AppBundle\Tests\Entity\Factory;

use Entvalley\AppBundle\Entity\Factory\TaskFactory;
use Entvalley\AppBundle\Entity\User;
use Entvalley\AppBundle\Entity\Task;

class TaskFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldCreateEmptyTaskWithDateAndNewState()
    {
        $user = new User;
        $taskFactory = new TaskFactory;
        $task = $taskFactory->createFor($user);

        $this->assertEquals(Task::STATUS_NEW, $task->getStatus());
        $this->assertNotEmpty($task->getCreatedAt());
        $this->assertEquals($user, $task->getAuthor());
    }
}