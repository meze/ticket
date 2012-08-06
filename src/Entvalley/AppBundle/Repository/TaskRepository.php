<?php

namespace Entvalley\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Entvalley\AppBundle\Entity\User;

class TaskRepository extends EntityRepository
{
    public function findNewOrAssignedTo(User $user)
    {

        $query = $this->getEntityManager()
            ->createQuery('SELECT t
                             FROM EntvalleyAppBundle:Task t
                            WHERE t.assignedTo IS NULL OR t.assignedTo = :user
                            ORDER BY t.id DESC')
        ;

        $query->setParameter('user', $user->getId());
        return $query->getResult();
    }
}