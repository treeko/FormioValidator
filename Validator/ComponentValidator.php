<?php

namespace FormioValidator\Validator;

use FormioValidator\Error\ValidationError;
use FormioValidator\Model\Component;
use FormioValidator\Model\ValidatorInterface;

class ComponentValidator implements ValidatorInterface
{
    private $component;
    private $value;
    private $errors = [];

    public function __construct(Component $component, $value)
    {
        $this->value = $value;
        $this->component = $component;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function validate()
    {
        if (!empty($this->component->getValidate())) {
            $this->validateByParameters();
        }

        if (!empty($this->errors)) {
            return $this->errors;
        }
        return true;
    }

    private function validateByParameters()
    {
        foreach ($this->component->getValidate() as $item) {
            if ($item->isValueValid($this->value) === false) {
                $this->errors[] = new ValidationError($this->component->getKey(), $item->getErrorMessage());
            }
        }
    }
}