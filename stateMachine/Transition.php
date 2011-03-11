<?php

require_once dirname(__FILE__) . '/../lang/BaseObject.class.php';

/**
 * 
 * @author saulo
 * @property-read Guard
 * @property-read Action
 */
class Transition extends BaseObject
{
	/**
	 * @var Action
	 */
	private $action;
	
	/**
	 * @var string
	 */
	private $regex;
	
	/**
	 * @var State
	 */
	private $fromState;
	
	/**
	 * @var State
	 */
	private $toState;
	
	/**
	 * @var array
	 */
	private $params;

	/**
	 * @param State $fromState
	 * @param string $regex
	 * @param Action $action
	 * @param State $toState
	 * @param array $params
	 */
	public function __construct(State $fromState, $regex, Action $callFunc = null, State $toState, array $params = null)
	{
		$this->regex = $regex;
		$this->action = $callFunc;
		$this->fromState = $fromState;
		$this->toState = $toState;
		$this->params = $params;
	}

	/**
	 * 
	 * @param string $str
	 * @return bool
	 */
	public function test($str)
	{
		$matches = array();
		preg_match($this->regex, $str, $matches);
		return ($matches[0] == $str);
	}
	
	/**
	 * @param Guard $guard
	 * @return Transition
	 */
	public function when(Guard $guard)
	{
		$this->guard = $guard;
		return $this;
	}
	
	/**
	 * @param Action $action
	 * @return Transition
	 */
	public function run(Action $action)
	{
		$this->action = $action;
		return $this;
	}
	
	public function andGoTo(State $toState)
	{
		$this->toState = $toState;
		return $this;
	}

	public function getFromState() {
		return $this->fromState;
	}
	
	public function getToState() {
		return $this->toState;
	}

	public function setToState(State $st) {
		$this->toState = $st;
	}
	
	public function getAction() {
		return $this->action;
	}
	
	public function getRegex() {
		return $this->regex;
	}
	
	public function getParams() {
		return $this->params;
	}
}
