<?php

/**
 * Represents a event. Events are used to define rules for transitions among states.
 * @author saulo
 * 
 */
class Guard
{	
	/**
	 * @var callback A function which receives a string and returns a bool
	 */
	protected $tester;

	/// <summary>
	/// The class constructor
	/// </summary>
	/// <param name="name">The name of the event</param>
	public function __construct(callback $tester)
	{
		$func = new ReflectionFunction($tester);
		
		$params = $func->getParameters();
		
		if(count($param) != 1 || $param->getClass() !== null)
			throw new BaseException('Invalid guard function. The guard function should receive a string and return a bool.');
			
		
	}

	/// <summary>
	/// The class constructor
	/// </summary>
	/// <param name="name">The name of the event</param>
	/// <param name="tester">A function that will tell if this event has ocurred based on the read string</param>
	public Guard(string name, Func<string, bool> tester)
	{
		_name = name;
		_tester = tester;
	}

	public virtual bool test(string str)
	{
		return this._tester.Invoke(str);
	}
}