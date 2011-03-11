<?php

require_once dirname(__FILE__) . '/../Msg.class.php';

/**
 * Provides default __get and __set magic methods
 *
 */
abstract class BaseObject
{
	public function __get($name)
	{
		$getter = "get$name";
		$boolGetter = "is$name";
		
		if(method_exists($this,$getter))
		{
			return $this->$getter();
		}
		else if(method_exists($this,$boolGetter))
		{
			return $this->$boolGetter();
		}
		else
		{
			require_once 'BaseException.class.php';
			$ex = new BaseException(Msg::UndefinedProperty, array('property' => get_class($this) . '::' . $name));
			$btrace = debug_backtrace();
			$ex->setGuiltyFile($btrace[0]['file']);
			$ex->setGuiltyLine($btrace[0]['line']);
			throw $ex;
		}
	}

	public function __set($name,$value)
	{
		$setter='set'.$name;
		$boolSetter = "is$name";
		
		if(method_exists($this,$setter))
		{
			$this->$setter($value);
		}
		else if(method_exists($this,'get'.$name))
		{
			require_once 'BaseException.class.php';
			$ex = new BaseException(Msg::ReadOnlyProperty, array('property' => get_class($this) . '::' . $name));
			$btrace = debug_backtrace();
			$ex->setGuiltyFile($btrace[0]['file']);
			$ex->setGuiltyLine($btrace[0]['line']);
			throw $ex;
		}
		else
		{
			require_once 'BaseException.class.php';
			$ex = new BaseException(Msg::UndefinedProperty, array('property' => get_class($this) . '::' . $name));
			$btrace = debug_backtrace();
			$ex->setGuiltyFile($btrace[0]['file']);
			$ex->setGuiltyLine($btrace[0]['line']);
			throw $ex;
		}
	}
}