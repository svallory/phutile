<?php
require_once dirname(__FILE__) . '/../State.php';
require_once dirname(__FILE__) . '/../Action.class.php';

class ActionSequenceState extends State {
	
	private $actions = array();
	
	/**
	 * 
	 * @param array $action An array of Action objects
	 */
	public function __construct($name, array $action = array()) {
		parent::__construct($name);
		$this->actions = $action;
	}
	
	public function enter($str) {
		foreach($this->actions as $action)
			$action->run($str);
	}
}