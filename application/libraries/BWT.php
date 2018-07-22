<?php

define( 'BWT_EOF', chr(0xFF) ); // 0xFF may not occur in input data
/**
 * Burrows-Wheeler Transform
 * @author Miraj-pc
 */
class BWT {
	
	var $string;
        
	function transform( $s ) {
		// Append EOF character (0xFF)
		$this->string = $s . BWT_EOF;
		// Initialize an array of indices (0,1,2,...)
		$indices = range( 0, strlen($this->string) - 1 );
		// Sort indices according to their rotations
		usort( $indices, array( &$this, '_bwtSort') );
		// Output the last character of each rotation (L)
		$result = '';
		foreach( $indices as $i ) {
			$result .= substr( $this->_rotate($i), -1, 1 );
		}
		return $result;
	}
	
	function inverse( $s ) {
		// Split $s into an array of characters
		$l = preg_split( '//', $s, -1, PREG_SPLIT_NO_EMPTY );
		// Copy $l to $f and sort
		$f = $l; sort($f);
		// Using $l and $f, we can now calculate $t
		$l2 = $l;
		$t = array();
		for( $fi = 0; $fi < count($f); $fi++ ) {
			// Search first occurence of $f[$fi] in $l2
			$li = array_search( $f[$fi], $l2, true );
			if($li===false) die('Data corruption error.');
			// Map $f[$fi] to $l[$li]
			$t[$fi] = $li;
			$l2[$li] = null;
		}
		// Regenerate the matrix and output the result
		$result = '';
		$index = array_search(BWT_EOF, $l);
		for( $i=0; $i < count($l) - 1; $i++ ) {			
			$index = $t[$index];
			$result .= $l[$index];
		}
		return $result;
	}
	

	private  function _rotate( $i ) {
		return substr( $this->string, $i * -1, $i ) . substr( $this->string, 0, strlen( $this->string ) - $i );
	}
	
	function _bwtSort( $a, $b ) {
		return strcmp( $this->_rotate( $a ), $this->_rotate( $b ) );
	}
}

?>