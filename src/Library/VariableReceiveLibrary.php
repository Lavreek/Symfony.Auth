<?php

namespace App\Library;

use ReflectionException;

abstract class VariableReceiveLibrary extends ReflectionReceiveLibrary
{
    /**
     * @throws ReflectionException
     */
    public function __construct(...$arguments)
    {
        foreach ($arguments as $argumentKey => $argumentValue) {
            if (property_exists($this, $argumentKey)) {
                $property = $this->getReflectionProperty($argumentKey);

                if (class_exists($property->getType()->getName())) {
                    $this->$argumentKey = new ($property->getType()->getName())(...$argumentValue);

                } else {
                    $this->$argumentKey = $argumentValue;
                }
            }
        }
    }

    public function toArray(): array
    {
        $array = [];

        foreach ($this->getReflectionProperties() as $property) {
            $propertyName = $property->getName();

            if (is_object($this->$propertyName)) {
                if (in_array(VariableReceiveLibrary::class, class_parents($this->$propertyName))) {
                    $array[$propertyName] = $this->$propertyName->toArray();

                } else {
                    $array[$propertyName] = $this->$propertyName;
                }
            } else {
                $array[$propertyName] = $this->$propertyName;
            }
        }

        return $array;
    }
}