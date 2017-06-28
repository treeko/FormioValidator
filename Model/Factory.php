<?php

namespace FormioValidator\Model;

abstract class Factory
{
    protected $products;
    protected $container;

    public function __construct(array $container)
    {
        $this->container = $container;
    }

    protected function getContainer()
    {
        return $this->container;
    }

    protected function setProduct($product)
    {
        $this->products[] = $product;
        return $this;
    }

    public function getProducts()
    {
        return $this->products;
    }

    abstract protected function make();
}