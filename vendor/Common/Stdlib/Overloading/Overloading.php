<?php

namespace Common\Stdlib\Overloading;

use Common\Stdlib\Overloading\Exception\MethodNotAllowed;
use Common\Stdlib\Overloading\Exception\MethodNotExists;
use Common\Stdlib\Overloading\Exception\PropertyNotExists;

interface Overloading
{
    /**
     * Overloading for valid properties (accesors)
     *
     * Map corresponding accessor first and property last.
     *
     * @param   string $property
     *
     * @throws  PropertyNotExists
     *
     * @return  string
     */
    public function __get($property);

    /**
     * Overloading for valid properties (mutators)
     *
     * Map corresponding accessor first and property last.
     *
     * @param   string $property
     * @param   mixed  $value
     *
     * @throws  PropertyNotExists
     */
    public function __set($property, $value);

    /**
     * Overloading: retrieve and set fields by name
     *
     * @param   string $method
     * @param   array  $arguments
     *
     * @throws  MethodNotAllowed
     * @throws  MethodNotExists
     *
     * @return  mixed
     */
    public function __call($method, $arguments);
}