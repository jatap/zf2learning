<?php

namespace Common\Stdlib\Exception;

use Zend\Mvc\Exception\InvalidControllerException;

class MethodNotAllowed extends InvalidControllerException
{
	/**
	 * Exceptions messages
	 */
	const EXC_METHOD_NOT_AVAILABLE  = "Only getters and setters allowed";

	public function __construct($method = null)
	{
		exit (sprintf(self::EXC_METHOD_NOT_AVAILABLE, $method));
	}
}