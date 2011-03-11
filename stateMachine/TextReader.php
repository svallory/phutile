<?php

require_once dirname(__FILE__) . '/../lang/BaseObject.class.php';

/**
 * 
 * @author saulo
 * @property-read bool $EndOfStream
 */
abstract class TextReader extends BaseObject
{
	/**
	 * @var TextStream
	 */
	protected $stream;

	/**
	 * @return bool
	 */
	public function isEndOfStream()
	{
		return $this->stream->eos == -1;
	}

	/**
	 * @param TextStream $textReader
	 */
	public function __construct(TextStream $stream)
	{
		$this->stream = $stream;
	}

	/**
	 * @return string
	 */
	public abstract function read();
}

class LineReader extends TextReader
{
	/**
	 * @return string
	 */
	public function read()
	{
		
		return $this->stream->readLine();
	}
}

class CharReader extends TextReader
{
	/**
	 * @return string
	 */
	public function read()
	{
		return $this->stream->readChar();
	}
}