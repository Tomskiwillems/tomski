<?php

namespace tomski\_src\tools;

abstract class Tools
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

	public static function getRequestVar(string $key, bool $frompost, $default = "", bool $asnumber = FALSE)
	{
		$filter = $asnumber ? FILTER_SANITIZE_NUMBER_FLOAT : FILTER_UNSAFE_RAW;
		$result = filter_input(($frompost ? INPUT_POST : INPUT_GET), $key, $filter);
		return ($result === FALSE || $result === NULL) ? $default : $result;
	}
}
