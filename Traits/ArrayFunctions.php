<?php

namespace FormioValidator\Traits;

trait ArrayFunctions
{
    protected function findValueInArrayByKey($array, $key)
    {
        $result = false;
        foreach ($array as $arrayKey => $value) {
            if ($arrayKey === $key) {
                $result = $value;
                break;
            } else if (is_array($value) && $this->findValueInArrayByKey($value, $key) !== false) {
                $result = $this->findValueInArrayByKey($value, $key);
            }
        }
        return $result;
    }
}