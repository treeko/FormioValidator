<?php

namespace FormioValidator\Validate;

use FormioValidator\Model\Validate;

class Min extends Validate
{
    const MIN = 'min';
    const MSG_ERROR = 'Value is smaller than: ';

    public function getErrorMessage()
    {
        return self::MSG_ERROR . $this->getOption();
    }

    public function isValueValid($value)
    {
        if ((integer)$value < $this->getOption()) {
            return false;
        }
        return true;
    }
}