<?php

namespace Entvalley\AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Entvalley\AppBundle\Entity\User;

class DefaultControllerTest extends WebTestCase
{
    private $user;

    protected function addUser()
    {
        $user = new User;
        $user->setUsername(TestEnvironment::DEFAULT_USERNAME);
        $user->setPlainPassword(TestEnvironment::DEFAULT_PASSWORD);
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setEnabled(true);
        $user->setExpired(false);
        $user->setConfirmationToken(null);
        $user->setEmail($email = 'test@example.com');
        $user->setEmailCanonical($email);

        $em = $this->getService('doctrine.orm.entity_manager');
        $em->persist($user);
        $em->flush();
        $this->user = $user;
    }

    public function tearDown()
    {
        parent::tearDown();
        if ($this->user) {
            $em = $this->getService('doctrine.orm.entity_manager');
            $em->remove($em->getRepository(get_class($this->user))->findOneByUsername(TestEnvironment::DEFAULT_USERNAME));
            $em->flush();
            $this->user = null;
        }
    }

    protected function getService($name)
    {
        return $this->getBootedKernel()->getContainer()->get($name);
    }

    protected function getBootedKernel()
    {
        self::$kernel = $this->createKernel();
        self::$kernel->boot();
        return self::$kernel;
    }

    public function testIndex()
    {
        $this->addUser();

        $client = static::createClient();

        $crawler = $client->request('GET', '/login', array(), array(), array(
            'PHP_AUTH_USER' => TestEnvironment::DEFAULT_USERNAME,
            'PHP_AUTH_PW'   => TestEnvironment::DEFAULT_PASSWORD,
        ));

        $this->assertTrue($crawler->filter('html:contains("Logged in as")')->count() > 0);
    }
}
