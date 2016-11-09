<?php

namespace SugaredRim\Sami;

use Sami\Parser\Filter\TrueFilter;
use Sami\Reflection\MethodReflection;
use Sami\Reflection\PropertyReflection;

class ProtectedFilter extends TrueFilter
{
    public function acceptMethod(MethodReflection $method)
    {
        return $method->isPublic() || $method->isProtected();
    }

    public function acceptProperty(PropertyReflection $property)
    {
        return $property->isPublic() || $property->isProtected();
    }
}
