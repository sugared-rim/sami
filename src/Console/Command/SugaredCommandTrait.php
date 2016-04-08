<?php

namespace Schnittstabil\Sugared\Sami\Console\Command;

use Sami\Sami;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Schnittstabil\Sugared\Sami\SamiFactoryAwareTrait;

/**
 * We can't extend/modify Sami\Console\Command\Command directly and reuse its subclasses,
 * therfore we use this trait to override the required methods :( .
 */
trait SugaredCommandTrait
{
    use SamiFactoryAwareTrait;

    abstract public function getDefinition();
    abstract public function setInput(InputInterface $input);
    abstract public function setOutput(OutputInterface $output);
    abstract public function setSami(Sami $sami);

    protected function makeConfigArgumentOptional()
    {
        $inputDefinition = $this->getDefinition();
        $args = $inputDefinition->getArguments();
        $args['config'] = new InputArgument(
            'config',
            InputArgument::OPTIONAL,
            $args['config']->getDescription()
        );
        $inputDefinition->setArguments($args);
    }

    protected function configure()
    {
        parent::configure();
        $this->makeConfigArgumentOptional();
        $this->getDefinition()->addOption(
            new InputOption(
                'namespace',
                '',
                InputOption::VALUE_REQUIRED,
                'composer.json/extra namespace',
                'schnittstabil/sugared-sami'
            )
        );
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        if ($input->getArgument('config') !== null) {
            return parent::initialize($input, $output);
        }

        $this->setInput($input);
        $this->setOutput($output);

        $namespace = $input->getOption('namespace');
        $sami = call_user_func($this->getSamiFactory(), $namespace);

        if ($input->getOption('only-version')) {
            $sami['versions'] = $input->getOption('only-version');
        }

        $this->setSami($sami);
    }
}
