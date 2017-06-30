<?php

namespace FormioValidator\Model;

use FormioValidator\Factory\ComponentFactory;
use FormioValidator\Factory\ValidateFactory;

abstract class Component
{
    protected $key;
    protected $component;
    protected $components = [];
    protected $validate = [];

    public function __construct($component)
    {
        $this->component = $component;
        $this->key = $component['key'];
        $this->setComponents($component);
        $this->setValidate($component);
        $this->addCustomValidation();
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getValidate()
    {
        return $this->validate;
    }

    public function getComponents()
    {
        return $this->components;
    }

    protected function getComponent()
    {
        return $this->component;
    }

    protected function setComponents($component)
    {
        if (array_key_exists('components', $component)) {
            $this->components = (new ComponentFactory())->make($component['components']);
        }
    }

    protected function setValidate($component)
    {
        if (array_key_exists('validate', $component)) {
            $this->validate = (new ValidateFactory())->make($component['validate']);
        }
    }

    abstract public function addCustomValidation();
}