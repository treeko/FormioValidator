<?php

namespace FormioValidator\Validator;

use FormioValidator\Factory\ComponentFactory;
use FormioValidator\Model\ValidatorInterface;
use FormioValidator\Traits\ArrayFunctions;

class FormValidator implements ValidatorInterface
{
    use ArrayFunctions;

    private $form;
    private $result;
    private $components = [];
    private $errors = [];

    public function __construct($form = null, $result = null)
    {
        if ($form !== null) {
            $this->setForm($form);
        }
        if ($result !== null) {
            $this->setResult($result);
        }
    }

    public function setResult($result)
    {
        $this->result = $result;
        return $this;
    }

    public function setForm($form)
    {
        $this->form = $form;
        $this->setComponents($form);
        return $this;
    }

    public function validate()
    {
        $this->areResultValuesValid($this->components);
        if (empty($this->errors)) {
            return true;
        } else {
            return $this->errors;
        }
    }

    private function areResultValuesValid($components)
    {

        foreach ($components as $component) {
            $value = $this->findValueInArrayByKey($this->result, $component->getKey());
            $validator = new ComponentValidator($component, $value);
            $validation = $validator->validate();
            if ($validation !== true) {
                $this->errors = $this->errors + $validation;
            }
            if (!empty($component->getComponents())) {
                $this->areResultValuesValid($component->getComponents());
            }
        }
    }

    private function setComponents($form)
    {
        $this->components = (new ComponentFactory($form))->make()->getProducts();
    }
}