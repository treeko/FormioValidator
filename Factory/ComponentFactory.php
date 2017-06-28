<?php

namespace FormioValidator\Factory;

use FormioValidator\Model\Factory;

class ComponentFactory extends Factory
{
    const COMPONENTS_PATH = 'FormioValidator\Component';

    public function make()
    {
        if (array_key_exists('components', $this->getContainer())) {
            foreach ($this->getContainer()['components'] as $component) {
                $this->makeComponent($component);
            }
        }
        return $this;
    }

    private function makeComponent($component)
    {
        $class = $this->getComponentClass($component['type']);
        if (class_exists($class)) {
            $this->setProduct(new $class($component
            ));
        }
    }

    private function getComponentClass($componentType)
    {
        return vsprintf(<<<PATH
%1\$s\%2\$s
PATH
            , array(self::COMPONENTS_PATH, ucfirst($componentType)));
    }
}