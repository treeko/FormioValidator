<?php

namespace FormioValidator\Validate;

use FormioValidator\Config\Message;
use FormioValidator\Model\Validate;

class Required extends Validate
{
    const REQUIRED = 'required';

    public function getErrorMessage()
    {
        return Message::getErrorMsg(self::REQUIRED);
    }

    public function isValueValid($value)
    {

        if ($this->getOption() === true && ($value === '' || $value === null)) {

                return false;
        }
        return true;
    }
}