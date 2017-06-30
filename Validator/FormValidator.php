<?php

namespace FormioValidator\Validator;

use FormioValidator\Factory\ComponentFactory;

class FormValidator
{

    public function validate(array $form, array $submission)
    {
        $components = $this->getFormComponents($form);
        $validation = $this->validateComponents($components, $submission);
        return ($validation === true) ? true : $validation;
    }

    private function getFormComponents($form)
    {
        return (new ComponentFactory($form))->make()->getProducts();
    }

    private function validateComponents(array $components, array $submission, array $result = [])
    {
        foreach ($components as $component) {

            $validation = (new ComponentValidator())->validate($component,
                $this->getValueByKey($submission, $component->getKey()));

            if ($validation !== true) {
                $result[$component->getKey()] = $validation;
            }

            if (!empty($component->getComponents())) {
                $this->areResultValuesValid($component->getComponents(), $result);
            }
        }
        return $result;
    }

    private function getValueByKey(array $array, $key)
    {
        if (key_exists($key, $array)) {
            return $array[$key];
        } else {
            return null;
        }
    }
}