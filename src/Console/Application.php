<?php

namespace Schnittstabil\Sugared\Sami\Console;

use Sami\ErrorHandler;
use Symfony\Component\Console\Application as BaseApplication;
use Schnittstabil\Sugared\Sami\Console\Command\ParseCommand;
use Schnittstabil\Sugared\Sami\Console\Command\RenderCommand;
use Schnittstabil\Sugared\Sami\Console\Command\UpdateCommand;

class Application extends BaseApplication
{
    /**
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function __construct()
    {
        error_reporting(-1);
        ErrorHandler::register();

        parent::__construct('SugaredSami');

        $this->add(new UpdateCommand());
        $this->add(new ParseCommand());
        $this->add(new RenderCommand());

        $this->setDefaultCommand('update');
    }
}
