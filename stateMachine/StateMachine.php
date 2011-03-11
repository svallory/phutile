<?php

require_once 'State.php';
require_once 'Action.class.php';
require_once dirname(__FILE__) . '/../lang/BaseException.class.php';
require_once dirname(__FILE__) . '/../lang/BaseObject.class.php';

class StateMachine extends BaseObject
{
	/**
	 * @var State
	 */
	private $currState;

	protected static $instance;
	
	/**
	 * The StateMachine is meant to be a Singleton. If you extend it 
	 * you'll have to reimplement the getInstance() method
	 */
	protected function __constructor() {}
	
	/**
	 * The StateMachine is meant to be a Singleton. If you extend it 
	 * you'll have to reimplement this method
	 * @return StateMachine
	 */
	public static function getInstance()
	{
		if(self::$instance == null)
		{
			self::$instance = new StateMachine();
		}
	}
	
	/**
	 * @param State $initialState
	 * @param SMTextReader $reader
	 */
	public function start(State $initialState, State $endState, TextReader $reader)
	{
		$str = '';

		$this->currState = $initialState;
		$this->currState->init(null);

		if ($reader->EndOfStream)
			return;

		do
		{
			$transitionFound = false;
			$str = $reader->Read();

			foreach ($this->currState->Transitions as $t)
			{

				if ($t->test($str))
				{
					$transitionFound = true;

					if($t->FromState !== $t->ToState)
						$this->currState->leave($t, $str);
						
					$this->currState = $t->ToState;
					
					if($t->Action != null)
						$str = $t->Action->run($str);

					if($t->FromState !== $t->ToState)
						$this->currState->init($t, $str);
						
					$this->currState->enter($str);
					break;
				}
			}

			if (!$transitionFound)
				throw new BaseException("No transition found for string \"" . $str . "\" in state " . $this->currState->Name);

		} while (!$reader->EndOfStream);
		
		// last transition
		$t = new Transition($this->currState, '', null, $endState, null);
		$this->currState->leave($t);
	}
}