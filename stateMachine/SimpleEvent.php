<?php

class EventTester extends Enumeration {
	
	/**
	 * @var EventTester
	 */
	public static $StartsWith;
	
	/**
	 * @var EventTester
	 */
	public static $Equals;
	
	/**
	 * @var EventTester
	 */
	public static $Contains;
	
	/**
	 * @var EventTester
	 */
	//public static $PartialMatch;
	
	/**
	 * @var EventTester
	 */
	public static $Matches;
}
Enumeration::init('EventTester');

class SimpleEvent extends Guard
{
	/**
	 * @var EventTester
	 */
	private $_tester;
	
	/**
	 * @var array<Object>
	 */
	private $_args;

	/**
	 * 
	 * @param string $name
	 * @param EventTester $tester
	 */
	public function SimpleEvent(EventTester $tester, $args)
	{
		parent::Guard($tester);
		$this->_tester = $tester;
		$this->_args = $args;
	}

	/**
	 * 
	 * @param string $str
	 * @return bool
	 */
	public function test($str)
	{
		switch ($this->_tester)
		{
			case EventTester::$Contains:
				return (strpos($str, $this->_args) !== false);

			case EventTester::$Equals:
				return $str == $this->_args;

			case EventTester::$Matches:
				$matches = array();
				preg_match($this->_args, $str, $matches);
				return ($matches[0] == $str);

			case EventTester.StartsWith:
				return (strpos($this->_args, $str) == 0);
		}

		return false;
	}
}
