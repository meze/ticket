<?php

namespace Entvalley\AppBundle\Controller;

use Mzz\MzzBundle\Controller\Controller;
use Entvalley\AppBundle\Form\CommandType;
use Entvalley\AppBundle\Domain\Command\ReceivedCommand;
use Symfony\Component\HttpFoundation\JsonResponse;
use Entvalley\AppBundle\Entity\User;

class CommandController extends Controller
{
    public function listAction()
    {
        $commandManager = $this->get('entvalley.command_manager');

        return new JsonResponse($commandManager->getCommandNames());
    }

    public function sendAction()
    {

    }

    public function formAction()
    {
        $form = $this->createForm(new CommandType(), new ReceivedCommand());

        return $this->view(array(
            'form' => $form->createView(),
        ));
    }
}
