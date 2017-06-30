<?php

namespace FormioValidator\Model;

abstract class Validate
{
    private $option;

    function __construct($option = null)
    {
        $this->option = $option;
    }

    abstract public function getErrorMessage();

    abstract public function isValueValid($value);

    protected function getOption()
    {
        return $this->option;
    }
}