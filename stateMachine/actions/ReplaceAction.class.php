<?php

require_once dirname(__FILE__) . '/../Action.class.php';

class ReplaceAction extends Action
{
	private $search;
	private $replace;
	private $count;
	
	/**
	 * This action mimics the behavior of str_replace function
	 * 
	 * @param mixed $search The value being searched for, otherwise known as the needle. An array may be used to designate multiple needles
	 * @param mixed $replace The replacement value that replaces found search values. An array may be used to designate multiple replacements.
	 * @param int $count If passed, this will be set to the number of replacements performed.
	 */
	public function __construct($search, $replace, $count)
	{
		$this->search = $search;
		$this->replace = $replace;
		$this->count = $count;
	}
	
	/**
	 * The string got by the reader which matches the caller transaction's regex 
	 * @param string $str
	 */
	public function run($str) {
		return str_replace($this->search, $this->replace, $str, $this->count);
	}
}