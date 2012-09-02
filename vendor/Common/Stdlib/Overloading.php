<?php

namespace Common\Stdlib;

use Common\Stdlib\Exception\MethodNotAllowed;
use Common\Stdlib\Exception\MethodNotExists;
use Common\Stdlib\Exception\PropertyNotExists;

class Overloading
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
    public function __get($property)
    {
        // Parse data to concaquenate with 'get'
        if ($property[0] == '_') {
            $attribute = substr($property, 1);
        } else {
            $attribute = "_{$property}";
        }

        // If exists a method, use it
        $method = 'get'. ucfirst($property);
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        // Use property
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        if (property_exists($this, $attribute)) {
            return $this->$attribute;
        }

        throw new PropertyNotExists($attribute);
    }

    /**
     * Overloading for valid properties (mutators)
     *
     * Map corresponding accessor first and property last.
     *
     * @param   string $property
     * @param   mixed  $value
     *
     * @throws  PropertyNotExists
     *
     * @return  Common_Theme_Theme
     */
    public function __set($property, $value)
    {
        // Parse data to concaquenate with 'set'
        if ($property[0] == '_') {
            $attribute = substr($property, 1);
        } else {
            $attribute = "_{$property}";
        }

        // If exists a method, use it with fluent interface
        $method = 'set'. ucfirst($property);
        if (method_exists($this, $method)) {
            $this->$method($value);
            return $this;
        }

        // Use property
        if (property_exists($this, $property)) {
            $this->$property = $value;
            return $this;
        }
        if (property_exists($this, $attribute)) {
            $this->$attribute = $value;
            return $this;
        }

        throw new PropertyNotExists($attribute);
    }

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
    public function __call($method, $arguments)
    {
        if (strlen($method) > 3) {
            $attribute = lcfirst(substr($method, 3));

            // Mutators
            if (0 === strpos($method, 'set')) {

            	// Validate data equality to prevent update attribute
            	if (isset($arguments[0]) &&
                    $arguments[0] == $this->$attribute) {
            		return true;
            	}

                $this->$attribute = array_shift($arguments);
                return $this;

            // Accesors
            } elseif (0 === strpos($method, 'get')) {
                return $this->$attribute;

            // Method not allowed
            } else {
                throw new MethodNotAllowed($method);
            }
        }

        throw new MethodNotExists($method);
    }
}