<?php

namespace Common\Stdlib\Overloading\Exception;

use \Exception;

class MethodNotExists extends Exception
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