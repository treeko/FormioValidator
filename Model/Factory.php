<?php

namespace FormioValidator\Model;

abstract class Factory
{
    abstract protected function make(array $container);
}