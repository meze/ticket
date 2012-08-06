<?php

namespace Entvalley\AppBundle\Entity\Factory;

use Entvalley\AppBundle\Entity\User;
use Entvalley\AppBundle\Entity\Task;

class TaskFactory
{
    /**
     * @param \Entvalley\AppBundle\Entity\User $user
     * @return \Entvalley\AppBundle\Entity\Task
     */
    public function createFor(User $user)
    {
        $task = new Task;
        $task->setStatus(Task::STATUS_NEW);
        $task->setCreatedAt(new \DateTime());
        $task->setAuthor($user);
        return $task;
    }
}
