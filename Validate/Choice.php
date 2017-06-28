<?php

namespace FormioValidator\Validate;

use FormioValidator\Model\Validate;

class Choice extends Validate
{
    const EMAIL = 'choice';
    const MSG_ERROR = 'Value is not in choices pool';

    public function getErrorMessage()
    {
        return self::MSG_ERROR;
    }

    public function isValueValid($value)
    {
        if (is_array($value)) {
            foreach ($value as $item) {
                $valid = $this->isItemValid($item);
                if ($valid === false) {
                    return false;
                }
            }
            return true;
        }

        return $this->isItemValid($value);
    }

    private function isItemValid($item)
    {
        if (!in_array($item, $this->getValuesArray())) {
            return false;
        }
        return true;
    }

    private function getValuesArray()
    {
        $result = [];
        foreach ($this->getOption() as $item) {
            $result[] = $item['value'];
        }
        return $result;
    }
}