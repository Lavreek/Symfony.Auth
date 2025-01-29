<?php

namespace App\Library;

use Exception;
use ReflectionClass;
use ReflectionProperty;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validation;

abstract class RequestReceiveLibrary extends VariableReceiveLibrary
{
    public function __construct()
    {
        parent::__construct(...$this->getRequestArray());
        $this->validate();
    }

    /**
     * @throws Exception
     */
    private function validate(): void
    {
        $attributes = $this->getReflectionProperties();

        foreach ($attributes as $attribute) {
            if (!$this->checkAttributeRequirements($attribute)) {
                throw new Exception(sprintf('Ошибка в валидации параметра: "%s"', $attribute->getName()));
            }
        }
    }

    private function checkAttributeRequirements(ReflectionProperty $attribute): bool
    {
        $attributeName = $attribute->getName();
        $attributeValue = $this->$attributeName;

        $attributeRequirements = $attribute->getAttributes();

        if (empty($attributeRequirements)) {
            return true;

        } else {
            foreach ($attributeRequirements as $requirement) {
                $requirementName = $requirement->getName();

                $violations = Validation::createValidator()->validate($attributeValue, new $requirementName());
                if (count($violations) > 0) {
                    return false;
                }
            }
        }

        return true;
    }

    private function getRequestArray(): array
    {
        return $this->getRequest()->toArray();
    }

    private function getRequest(): Request
    {
        return Request::createFromGlobals();
    }
}