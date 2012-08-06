<?php

namespace Entvalley\AppBundle\Factory;

use Entvalley\AppBundle\Entity\User;

class CompanyFactory
{
    private $user;

    public function __construct(User $user = null)
    {
        $this->user = $user;
    }

    public function get()
    {
        return $this->user ? $this->user->getCompany() : null;
    }
}