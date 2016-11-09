<?php

namespace SugaredRim\Sami;

class DefaultPreset
{
    public static function get()
    {
        $config = new \stdClass();
        $config->files = 'src';
        $config->filter = ProtectedFilter::class;
        $config->build_dir = 'build/sami';
        $config->cache_dir = 'build/cache/sami';

        return $config;
    }
}
