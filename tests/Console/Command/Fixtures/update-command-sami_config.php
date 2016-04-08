<?php

use Symfony\Component\Filesystem\Filesystem;

$dir = sys_get_temp_dir().'/sami_integ';

$fs = new Filesystem();
$fs->remove($dir);

$sami = new Sami\Sami('src/Config', [
    'build_dir' => $dir.'/build',
    'cache_dir' => $dir.'/cache',
]);

$sami['DEBUG_config_file'] = __FILE__;

return $sami;
