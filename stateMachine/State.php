<?php

require_once 'Transition.php';
require_once dirname(__FILE__) . '/../collections/Collection.class.php';

/**
 * The State class represents a machine state and implements the Singleton pattern
 * @author saulo
 * @property-read State $Instance 
 * @property-read string $Name
 */
abstract class State extends BaseObject
{
	/**
	 * @var Collection Collection of Transition objects
	 */
	protected $transitions;

	/**
	 * @var bool
	 */
	protected $initialized = false;

	/**
	 * A name to help identify instances of this state
	 * @var string
	 */
	protected $name;
	
	public function __construct($name = null) {
		//$this->transitions = new Collection('Transition');
		$this->name = $name;
	}
	
	public function getName() {
		if(empty($this->name))
			return get_class($this);
			
		return $this->name;
	}
	
	public function getTransitions() { 
		return $this->transitions; 
	}

	public function init() {
		if ($this->initialized)
			return;

		$this->initialized = true;
	}

	/**
	 * 
	 * @param string $str
	 */
	public function enter($str)
	{
		echo $str;
	}

	/**
	 * 
	 * @param string $label
	 * @param callback $guard
	 * @param State $andGoToState
	 * @param callback $doAction
	 * @return Transition
	 */
	public function addTransition($label)
	{
		$t = new Transition($label);
		$this->transitions->add($t);

		return $t;
	}
	
	public function addTransitions(array $trans)
	{
		foreach ($trans as $regex => $def) {
			
			if($def instanceof State)
			{
				$t = new Transition($this, $regex, null, $def, null);	
			}
			else
			{
				$action = isset($def['run']) ? $def['run'] : null;
				$params = isset($def['with params']) ? $def['with params'] : null;
				 
				$t = new Transition($this, $regex, $action, $def['go to'], $params);
			}
			$this->transitions[] = $t;
		}
	}
	
	/**
	 * @param State $to The state were the machine is going
	 */
	public function leave(Transition $t) {
		
	}
}