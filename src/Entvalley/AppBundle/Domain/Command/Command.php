<?php

namespace Entvalley\AppBundle\Domain\Command;

interface Command
{
    function execute();
    function getName();
    function setContent($content);
    function getContent();
}