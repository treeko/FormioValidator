<?php

namespace FormioValidator\Validate;

use FormioValidator\Config\Message;
use FormioValidator\Model\Validate;

class Min extends Validate
{
    const MIN = 'min';

    public function getErrorMessage()
    {
        return Message::getError(self::MIN) . $this->getOption();
    }

    public function isValueValid($value)
    {
        if ((integer)$value < $this->getOption()) {
            return false;
        }
        return true;
    }
}