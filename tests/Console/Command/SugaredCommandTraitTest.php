<?php

namespace Schnittstabil\Sugared\Sami\Console\Command;

use Sami\Sami;
use Symfony\Component\Console\Tester\CommandTester;
use Schnittstabil\Sugared\Sami\Console\Application;
use Schnittstabil\Sugared\Sami\DefaultPreset;

/**
 * @coversDefaultClass \Schnittstabil\Sugared\Sami\Console\Command\SugaredCommandTrait
 */
class SugaredCommandTraitTest extends \PHPUnit_Framework_TestCase
{
    /*
     * @covers ::configure
     * @covers ::makeConfigArgumentOptional
     */
    public function testConfigArgumentIsOptional()
    {
        $sut = new UpdateCommand();
        $this->assertTrue($sut->getDefinition()->hasArgument('config'));
        $this->assertFalse($sut->getDefinition()->getArgument('config')->isRequired());
    }

    /**
     * @group integration
     * @covers ::initialize
     * @covers Schnittstabil\Sugared\Sami\Console\Command\ParseCommand
     */
    public function testExecuteShouldUseDefaultConfigArgument()
    {
        $defaultConfig = DefaultPreset::get();

        $application = new Application();

        $commandTester = new CommandTester($command = $application->get('parse'));
        $commandTester->execute([
            'command' => 'parse',
        ], ['decorated' => false]);

        $this->assertInstanceOf(ParseCommand::class, $command);
        $this->assertObjectHasAttribute('sami', $command);
        $sami = $this->getObjectAttribute($command, 'sami');
        $this->assertInstanceOf(Sami::class, $sami);
        $this->assertEquals($defaultConfig['build_dir'], $sami['build_dir']);
        $this->assertEquals($defaultConfig['cache_dir'], $sami['cache_dir']);
        $this->assertEquals($defaultConfig['files'], $sami['files']);
    }

    /**
     * @group integration
     * @covers ::initialize
     * @covers Schnittstabil\Sugared\Sami\Console\Command\UpdateCommand
     */
    public function testExecuteShouldAllowConfigArgument()
    {
        $configFile = __DIR__.'/Fixtures/update-command-sami_config.php';

        $application = new Application();

        $commandTester = new CommandTester($command = $application->get('update'));
        $commandTester->execute([
            'command' => 'update',
            'config' => $configFile,
        ], ['decorated' => false]);

        $this->assertInstanceOf(UpdateCommand::class, $command);
        $this->assertObjectHasAttribute('sami', $command);
        $sami = $this->getObjectAttribute($command, 'sami');
        $this->assertInstanceOf(Sami::class, $sami);
        $this->assertEquals($configFile, $sami['DEBUG_config_file']);
    }

    /**
     * @group integration
     * @covers ::initialize
     * @covers Schnittstabil\Sugared\Sami\Console\Command\RenderCommand
     */
    public function testExecuteShouldAllowOnlyVersionOption()
    {
        $application = new Application();

        $commandTester = new CommandTester($command = $application->get('render'));
        $commandTester->execute([
            'command' => 'render',
            '--only-version' => '1',
        ], ['decorated' => false]);

        $this->assertInstanceOf(RenderCommand::class, $command);
        $this->assertObjectHasAttribute('sami', $command);
        $sami = $this->getObjectAttribute($command, 'sami');
        $this->assertInstanceOf(Sami::class, $sami);
        $this->assertEquals('1', $sami['versions']);
    }
}
