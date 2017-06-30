<?php

namespace FormioValidator\Factory;

use FormioValidator\Model\Factory;

class ComponentFactory extends Factory
{
    const COMPONENTS_PATH = 'FormioValidator\Component';

    public function make(array $container)
    {
        $result = [];
        foreach ($container['components'] as $component) {
            $result[] = $this->makeComponent($component);
        }
        return $result;
    }

    private function makeComponent($component)
    {
        $class = $this->getComponentClass($component['type']);
        return new $class($component);
    }

    private function getComponentClass($componentType)
    {
        return vsprintf(<<<PATH
%1\$s\%2\$s
PATH
            , array(self::COMPONENTS_PATH, ucfirst($componentType)));
    }
}