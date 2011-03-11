<?php

require_once dirname(__FILE__) . '/../Action.class.php';

class EchoAction extends Action
{
	private $str;
	
	public function __construct($str)
	{
		$this->str = $str;
	}
	
	/**
	 * The string got by the reader which matches the caller transaction's regex 
	 * @param string $str
	 */
	public function run($str) {
		$s = $this->str;
		$pos = 0;
		
		while(($pos = strpos($s, '$str', $pos)) !== false)
		{
			if($pos == 0 || $s[$pos - 1] != '\\')
				$s = substr_replace($s, $str, $pos, 4);
		}
		
		echo $s;
		
		return $str;
	}
}