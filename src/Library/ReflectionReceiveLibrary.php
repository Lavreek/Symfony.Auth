<?php

namespace App\Library;

use ReflectionClass;
use ReflectionProperty;

class ReflectionReceiveLibrary
{
    /**
     * @throws \ReflectionException
     */
    protected function getReflectionProperty(string $property): ReflectionProperty
    {
        return $this->getReflection()->getProperty($property);
    }

    /**
     * @return array<int, ReflectionProperty>
     */
    protected function getReflectionProperties(?int $filter = ReflectionProperty::IS_PUBLIC): array
    {
        return $this->getReflection()->getProperties($filter);
    }

    private function getReflection(): ReflectionClass
    {
        return new ReflectionClass($this);
    }
}