<?php

namespace Common\Stdlib\Options;

interface Options
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
    public function setOptions($options = null);
}