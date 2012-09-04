<?php

namespace Common\Stdlib\Options;

use \ReflectionClass as Reflection;

abstract class AbstractOptions
{
    /**
     * Fill class attributes with params
     *
     * Types:
     *
     * - Protected Overloading Prefixed
     *
     *   Overloading: Yes
     *   Attributes: Protected
     *   Attributes Prefix: "_"
     *   Can be extended.
     *
     * - Protected Overloading Not Prefixed
     *
     *   Overloading: Yes
     *   Attributes: Protected
     *   Attributes Prefix: None
     *   Can be extended.
     *
     * - Private Overloading Prefixed
     *
     *   Overloading: Yes
     *   Attributes: Private
     *   Attributes Prefix: "_"
     *   Can not be extended.
     *
     * - Private Overloading Not Prefixed
     *
     *   Overloading: Yes
     *   Attributes: Private
     *   Attributes Prefix: None
     *   Can not be extended.
     *
     * - Protected Prefixed
     *
     *   Overloading: No
     *   Attributes: Protected
     *   Attributes Prefix: "_"
     *   Can be extended.
     *
     * - Protected Not Prefixed
     *
     *   Overloading: No
     *   Attributes: Protected
     *   Attributes Prefix: None
     *   Can be extended.
     *
     * - Private Prefixed
     *
     *   Overloading: No
     *   Attributes: Private
     *   Attributes Prefix: "_"
     *   Can not be extended.
     *
     * - Private Not Prefixed
     *
     *   Overloading: No
     *   Attributes: Private
     *   Attributes Prefix: None
     *   Can not be extended.
     *
     * @param   array|\ArrayObject $options
     */
    public function setOptions($options = null)
    {
        // Validate options
        if (isset($options['prefixed'])) {
            $prefixed   = $options['prefixed'];
        } else {
            $prefixed   = true;
        }
        if (isset($options['protected'])) {
            $protected  = $options['protected'];
        } else {
            $protected  = true;
        }
        if (isset($options['opts'])) {
            $opts       = $options['opts'];
        } else {
            $opts       = false;
        }

        // Validate
        if ( ! empty($opts)) {

            // Iterate
            foreach ($opts as $key => $value) {

                // Get attribute name
                if ($prefixed) {
                    $attribute = '_' . $key;
                } else {
                    $attribute = $key;
                }

                // Class reflection
                $refl = new Reflection($this);

                // Validate property/attribute
                if ($refl->hasProperty($attribute)) {
                    $method = 'set' . ucfirst($key);

                    // Find method first
                    if ($refl->hasMethod($method)) {
                        $this->$method($value);

                    // Set attribute if allowed
                    } elseif ($refl->getProperty($attribute)->isPublic()
                        || ($refl->getProperty($attribute)->isProtected()
                            && $protected)) {
                        $this->$attribute = $value;
                    }
                }
            }
        }
    }
}