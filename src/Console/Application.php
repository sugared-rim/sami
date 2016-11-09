<?php

namespace SugaredRim\Sami\Console;

use Sami\ErrorHandler;
use Symfony\Component\Console\Application as BaseApplication;
use SugaredRim\Sami\Console\Command\ParseCommand;
use SugaredRim\Sami\Console\Command\RenderCommand;
use SugaredRim\Sami\Console\Command\UpdateCommand;

class Application extends BaseApplication
{
    /**
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function __construct()
    {
        error_reporting(-1);
        ErrorHandler::register();

        parent::__construct('SugaredRimSami');

        $this->add(new UpdateCommand());
        $this->add(new ParseCommand());
        $this->add(new RenderCommand());

        $this->setDefaultCommand('update');
    }
}
