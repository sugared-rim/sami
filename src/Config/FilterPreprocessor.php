<?php

namespace Schnittstabil\Sugared\Sami\Config;

use function Schnittstabil\Get\getValue;

/**
 * Config `filter` chain link.
 */
class FilterPreprocessor
{
    protected $next;

    public function __construct(callable $next)
    {
        $this->next = $next;
    }

    public function __invoke(array $config)
    {
        $next = $this->next;
        $filter = getValue('filter', $config);
        unset($config['filter']);

        if (empty($filter)) {
            return $next($config);
        }

        $sami = $next($config);
        $sami['filter'] = function () use ($filter) {
            return new $filter();
        };

        return $sami;
    }
}
