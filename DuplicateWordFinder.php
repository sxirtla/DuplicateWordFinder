<?php

/**
 * Finds duplicate words in string and counts them
 *
 * @author Sxirtla <sxirtla@gmail.com>
 */
class DuplicateWordFinder {

    protected $minWordLength = 2;

    public function setMinWordLength( $minWordLength ) {
		$minWordLength = intval( $minWordLength );
		if ( $minWordLength < 1 ) {
			$minWordLength = 1;
		}
		$this->minWordLength = $minWordLength;
	}

	public function dupWords( $str, $remove = false ) {
		$dups = array();
		$regex = '/(^|\s)([.\S]{' . $this->minWordLength . ',})\b.+?\1\2\b/ixs';

		//find duplicate words with regular Expression
		while ( preg_match_all( $regex, $str, $matches ) ) {
			//write values as new array keys and fill the value with 'false'
			$words = array_fill_keys( $matches[2], false );
			$dups = array_merge( $dups, $words );
			foreach ( $dups as $k => $v ) {
				if ( !$v ) { //if $v is false than we have not searched yet
					$str = preg_replace( "/(^|\s)" . preg_quote( $k, '/' ) . "\b/i", "", $str, -1, $count ); //search string and remove all duplicates
					if ( $count ) {
						$dups[$k] = $count; //create duplicates list, with count number
					} else {
						unset( $dups[$k] );
					}
				}
			}
		}
		if ( $remove ) {
			//if remove is true we should return text
			return $this->_removeDuplicates( $str );
		}
		arsort( $dups ); //sort most freaquent first
		return $dups;
	}

	private function _removeDuplicates( $str ) {
		//TODO: needs to be implemented
		return $str;
	}
}
