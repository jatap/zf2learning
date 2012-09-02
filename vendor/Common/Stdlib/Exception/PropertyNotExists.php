<?php

namespace Common\Stdlib\Exception;

use Zend\Mvc\Exception\InvalidControllerException;

class PropertyNotExists extends InvalidControllerException
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