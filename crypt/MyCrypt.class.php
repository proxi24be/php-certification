<?php

class MyCrypt {
	private $crypt_algorithm;

	public function __construct ($crypt_algorithm = NULL) {
		$this->crypt_algorithm = $crypt_algorithm;
	}

	public function crypt($string, $crypt_algorithm = NULL) {
		if ($crypt_algorithm == NULL) {
			if ($this->crypt_algorithm != NULL)
				return crypt($string, $this->crypt_algorithm);
			else
				return crypt($string);
		}
		else {
			return crypt($string, $crypt_algorithm);
		}
			
	}

}