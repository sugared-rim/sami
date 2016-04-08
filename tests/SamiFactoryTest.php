<?php

namespace Schnittstabil\Sugared\Sami;

use Sami\Sami;
use Sami\Parser\Filter\DefaultFilter;
use Sami\Parser\Filter\FilterInterface;

class SamiFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testInvokeShouldReturnSamiInstance()
    {
        $factory = new SamiFactory();
        $sut = $factory('schnittstabil/sugared-sami');
        $this->assertInstanceOf(Sami::class, $sut);
        $this->assertInstanceOf(FilterInterface::class, $sut['filter']);
    }

    public function testInvokeShouldReturnSamiInstanceWithComposerOptions()
    {
        $factory = new SamiFactory();
        $sut = $factory('schnittstabil/sugared-sami test namespace');
        $this->assertInstanceOf(Sami::class, $sut);
        $this->assertSame('test-build/sami', $sut['build_dir']);
        $this->assertInstanceOf(DefaultFilter::class, $sut['filter']);
    }
}
