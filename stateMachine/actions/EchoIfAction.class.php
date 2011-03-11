<?php

require_once dirname(__FILE__) . '/../Action.class.php';

class EchoIfAction extends Action
{
	private $str;
	private $regex;
	
	public function __construct($str, $regex)
	{
		$this->str = $str;
		$this->regex = $regex;
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
		
		$m = array();
		preg_match($this->regex, $s, $m);

		if($m[0] == $s)
			echo $s;
			
		return $str;
	}
}