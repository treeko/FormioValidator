<?php

namespace FormioValidator\Validator;

use FormioValidator\Error\ValidationError;
use FormioValidator\Model\Component;

class ComponentValidator
{
    public function validate(Component $component, $value)
    {
        $validation = [];
        if (!empty($component->getValidate())) {
            $validation = $this->validateComponent($component, $value);
        }
        return (empty($validation)) ? true : $validation;
    }

    private function validateComponent(Component $component, $value)
    {
        $result = [];
        foreach ($component->getValidate() as $validate) {
            if ($validate->isValueValid($value) === false) {
                $result[] = new ValidationError($component->getKey(), $validate->getErrorMessage());
            }
        }
        return $result;
    }
}