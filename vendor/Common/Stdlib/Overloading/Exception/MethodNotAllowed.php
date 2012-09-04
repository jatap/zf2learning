<?php

namespace Common\Stdlib\Overloading\Exception;

use \Exception;

class MethodNotAllowed extends Exception
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