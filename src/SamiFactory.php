<?php

namespace Schnittstabil\Sugared\Sami;

use Sami\Sami;
use Schnittstabil\ComposerExtra\ComposerExtra;
use Schnittstabil\Sugared\Sami\Config\FilterPreprocessor;

class SamiFactory
{
    protected $defaultConfig;

    public function __construct()
    {
        $this->defaultConfig = new \stdClass();
        $this->defaultConfig->presets = [
            'Schnittstabil\\Sugared\\Sami\\DefaultPreset::get',
        ];
    }

    protected function getConfig($namespace)
    {
        return (new ComposerExtra(
            $namespace,
            $this->defaultConfig,
            'presets'
        ))->get();
    }

    public function __invoke($namespace)
    {
        $chain = function ($config) {
            return new Sami(null, (array) $config);
        };
        $chain = new FilterPreprocessor($chain);

        return $chain($this->getConfig($namespace));
    }
}
