<?php

namespace FormioValidator\Validate;

use FormioValidator\Config\Message;
use FormioValidator\Model\Validate;

class Choice extends Validate
{
    const CHOICE = 'choice';

    public function getErrorMessage()
    {
        return Message::getError(self::CHOICE);
    }

    public function isValueValid($value)
    {
        if ($value === null) {
            return true;
        }

        if (is_array($value)) {
            return $this->areItemsValid($value);
        }

        return $this->isItemValid($value);
    }

    private function areItemsValid($items)
    {
        $result = [];
        foreach ($items as $item) {
            $result[] = $this->isItemValid($item);
        }
        return (in_array(false, $result)) ? false : true;
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