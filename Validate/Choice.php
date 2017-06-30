<?php

namespace FormioValidator\Validate;

use FormioValidator\Config\Message;
use FormioValidator\Model\Validate;

class Choice extends Validate
{
    const CHOICE = 'choice';

    public function getErrorMessage()
    {
        return Message::getErrorMsg(self::CHOICE);
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
        } else if ($value === null) {
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