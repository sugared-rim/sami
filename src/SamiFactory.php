<?php

namespace SugaredRim\Sami;

use Sami\Sami;
use Schnittstabil\ComposerExtra\ComposerExtra;
use SugaredRim\Sami\Config\FilterPreprocessor;

class SamiFactory
{
    protected $defaultConfig;

    public function __construct()
    {
        $this->defaultConfig = new \stdClass();
        $this->defaultConfig->presets = [
            'SugaredRim\\Sami\\DefaultPreset::get',
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
