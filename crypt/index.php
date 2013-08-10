<?php
	
	function randomSaltCrypt($input) {
		$salt = random();
		$crypt = crypt($salt);
		return crypt($input, $salt);
	}

	function md5SaltCrypt($input) {
		$salt = '$1$' . random();
		return crypt($input, $salt);
	}

	function random () {
		$random = "";
		for ($i = 0; $i < 10 ; ++$i)	
			$random .= rand();
		return $random;
	}

	function blowfishSaltCrypt($input) {
		$salt = '$2y$08$123456789123456789123456789';
		return crypt($input, $salt);
	}

	function sha256Crypt($input) {
		$salt = '$5$' . random();
		return crypt($input, $salt);
	}

	function sha512Crypt($input) {
		$salt = '$6$' . random();
		return crypt($input, $salt);
	}


	$start = microtime();

	$input = '123456789';

	$saved_crypt_password = randomSaltCrypt($input);
	echo "$saved_crypt_password" . PHP_EOL;
	echo crypt($input, $saved_crypt_password) . PHP_EOL;

	$saved_crypt_password = md5SaltCrypt($input);
	echo "$saved_crypt_password" . PHP_EOL;
	echo crypt($input, $saved_crypt_password) . PHP_EOL;

	$saved_crypt_password = blowfishSaltCrypt($input);
	echo "$saved_crypt_password" . PHP_EOL;
	echo crypt($input, $saved_crypt_password) . PHP_EOL;

	$saved_crypt_password = sha256Crypt($input);
	echo "$saved_crypt_password" . PHP_EOL;
	echo crypt($input, $saved_crypt_password) . PHP_EOL;

	$saved_crypt_password = sha512Crypt($input);
	echo "$saved_crypt_password" . PHP_EOL;
	echo crypt($input, $saved_crypt_password) . PHP_EOL;

	printf("operation completed in %s ms" . PHP_EOL, (string)(microtime() - $start));
