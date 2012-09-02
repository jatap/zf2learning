<?php

namespace Common\Stdlib\Exception;

use Zend\Mvc\Exception\InvalidControllerException;

class MethodNotExists extends InvalidControllerException
{
	/**
	 * Exceptions messages
	 */
	const EXC_METHOD_NOT_EXIST      = "Method named %s doesn't exists";

	public function __construct($method = null)
	{
		exit (sprintf(self::EXC_METHOD_NOT_EXIST, $method));
	}
}