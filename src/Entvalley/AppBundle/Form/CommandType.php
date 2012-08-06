<?php

namespace Entvalley\AppBundle\Form;

use
    Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface
;

class CommandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', 'textarea')
        ;
    }

    public function getName()
    {
        return 'command';
    }
}