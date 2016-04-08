<?php

namespace Schnittstabil\Sugared\Sami;

class DefaultPreset
{
    public static function get()
    {
        return [
            'files' => 'src',
            'filter' => ProtectedFilter::class,
            'build_dir' => 'build/sami',
            'cache_dir' => 'build/cache/sami',
        ];
    }
}
