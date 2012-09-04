<?php

namespace Common\Stdlib\Overloading\Exception;

use \Exception;

class PropertyNotExists extends Exception
{
	/**
	 * Exceptions messages
	 */
	const EXC_PROPERTY_NOT_EXIST    = "Attribute named %s doesn't exists";

	public function __construct($property = null)
	{
		exit(sprintf(self::EXC_PROPERTY_NOT_EXIST, $property));
	}
}