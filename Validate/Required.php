<?php

namespace FormioValidator\Validate;

use FormioValidator\Model\Validate;

class Required extends Validate
{
    const REQUIRED = 'required';
    const MSG_ERROR = 'Value is required';

    public function getErrorMessage()
    {
        return self::MSG_ERROR;
    }

    public function isValueValid($value)
    {
        if ($this->getOption() === true && $value === '' || $value === null) {
            return false;
        }
        return true;
    }
}