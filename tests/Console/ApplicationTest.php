<?php

namespace Schnittstabil\Sugared\Sami\Console;

use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\Tester\ApplicationTester;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Schnittstabil\Sugared\Sami\DefaultPreset;
use Schnittstabil\Sugared\Sami\Console\Command\UpdateCommand;
use Symfony\Component\Filesystem\Filesystem;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    protected function clean()
    {
        $defaults = DefaultPreset::get();
        $fs = new Filesystem();
        foreach ([
            $defaults['build_dir'],
            $defaults['cache_dir'],
        ] as $dir) {
            $fs->remove($dir);
        }
    }

    /**
     * @group integration
     */
    public function testRunShouldOutputUpdateByDefault()
    {
        $this->clean();
        $application = new Application();
        $application->setAutoExit(false);
        $application->setCatchExceptions(false);

        $tester = new ApplicationTester($application);
        $tester->run(array(), array('decorated' => false));

        $this->assertEquals('Updating project', trim($tester->getDisplay()));
    }

    public function testRunShouldUpdateByDefault()
    {
        $command = null;
        $dispatcher = new EventDispatcher();
        $dispatcher->addListener('console.command', function (ConsoleCommandEvent $event) use (&$command) {
            $command = $event->getCommand();
            $event->disableCommand();
        });

        $application = new Application();
        $application->setDispatcher($dispatcher);
        $application->setAutoExit(false);
        $application->setCatchExceptions(false);

        $tester = new ApplicationTester($application);
        $tester->run(array(), array('decorated' => false));

        $this->assertInstanceOf(UpdateCommand::class, $command);
    }
}
