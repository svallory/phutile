<?php

abstract class Action
{	
	/**
	 * The string got by the reader which matches the caller transaction's regex 
	 * @param string $str
	 * @return string
	 */
	abstract public function run($str);
}