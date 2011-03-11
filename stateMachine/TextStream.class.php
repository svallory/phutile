<?php

require_once dirname(__FILE__) . '/../lang/BaseObject.class.php';

/**
 * Implements a layer which abstracts the source stream
 * @author saulo
 * @property-read $bool EndOfStream
 */
abstract class TextStream extends BaseObject {
	
	/**
	 * @var resource|string
	 */
	protected $stream;
	
	/**
	 * @var bool Wether the stream has reached it's end or not
	 */
	protected $eos;
	
	/**
	 * The stream source
	 * @param string $stream
	 */
	public abstract function __construct($stream);
	public abstract function readLine();
	public abstract function readChar();

	/**
	 * Wether the stream has reached it's end or not
	 * @return bool
	 */
	public function isEOS() {
		return $this->eos;
	}
}

class TextFileStream extends TextStream {
	
	public function __construct($stream) {
		
		if(!($this->stream = fopen($stream, 'r', true))) {
			if(is_file($stream))
				throw new BaseException(Msg::FileNotFound, array('file' => $stream));
				
			throw new BaseException(Msg::FileCanNotBeRead, array('file' => $stream));
		}
	}
	
	public function readLine() {
		
		if($this->eos)
			throw new BaseException(Msg::EndOfStream);
			
		$line = fgets($this->stream);
		
		$this->eos = feof($this->stream);
		
		return $line;
	}
	
	public function readChar() {
		
		if($this->eos)
			throw new BaseException(Msg::EndOfStream);
			
		$line = fgetc($this->stream);
		
		$this->eos = feof($this->stream);
		
		return $line;
		
	}
}

class StringStream extends TextStream {
	
	/**
	 * @var int
	 */
	private $cursorPos;
	
	/**
	 * @var length
	 */
	private $length;
	
	/**
	 * @param string $stream
	 */
	public function __construct($stream) {
		$this->cursorPos = 0;
		$this->stream = $stream;
		$this->length = strlen($stream);
	}
	
	public function readLine() {
		
		if($this->eos)
			throw new BaseException(Msg::EndOfStream);
		
		$line = '';
		
		while($this->cursorPos < $this->length)
		{
			$c = $this->stream[$this->cursorPos];
			if($c == "\r" || $c == "\n") {
				if("\n" == $this->stream[$this->cursorPos+1]) {
					$this->cursorPos++;
					break;
				}
			}
			
			$line .= $c;
			$this->cursorPos++;
		}
		
		if($this->cursorPos == $this->length)
			$this->eos = true;
			
		return $line;
	}
	
	public function readChar() {
		
		if($this->eos)
			throw new BaseException(Msg::EndOfStream);
			
		$this->cursorPos++;
		
		if($this->cursorPos == $this->length)
			$this->eos = true;
		
		return $this->stream[$this->cursorPos-1];
	}
}