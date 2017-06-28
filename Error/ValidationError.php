<?php

namespace FormioValidator\Error;

use FormioValidator\Model\Error;

class ValidationError extends Error
{
    private $key;

    public function __construct($key, $message)
    {
        $this->key = $key;
        $this->message = $message;
    }

    public function getKey()
    {
        return $this->key;
    }
}