<?php

namespace SugaredRim\Sami;

/**
 * Setter injection trait for SamiFactory awareness.
 */
trait SamiFactoryAwareTrait
{
    protected $samiFactory;

    public function setSamiFactory(callable $samiFactory = null)
    {
        $this->samiFactory = $samiFactory;
    }

    public function getSamiFactory()
    {
        if ($this->samiFactory === null) {
            $this->samiFactory = new SamiFactory();
        }

        return $this->samiFactory;
    }
}
