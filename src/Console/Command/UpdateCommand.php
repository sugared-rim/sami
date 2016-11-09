<?php

namespace SugaredRim\Sami\Console\Command;

use Sami\Sami;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateCommand extends \Sami\Console\Command\UpdateCommand
{
    use SugaredCommandTrait;

    public function setInput(InputInterface $input)
    {
        $this->input = $input;
    }

    public function setOutput(OutputInterface $output)
    {
        $this->output = $output;
    }

    public function setSami(Sami $sami)
    {
        $this->sami = $sami;
    }
}
