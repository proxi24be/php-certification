<?php
	session_start();

	if (isset($_SESSION["authenticated"])) {
		if (isset($_SESSION["name"])) {
			printf("Welcome %s you are now logged into the system <br/>", $_SESSION["name"]);
			foreach($_SESSION as $key => $value)
				echo "$key | $value <br/>";
		}

	}
	else {

		echo "Your session does not exist we are going to create you one" . PHP_EOL;
		$_SESSION["authenticated"] = TRUE;
		$_SESSION["HTTP_USER_AGENT"] = $_SERVER["HTTP_USER_AGENT"];
		$_SESSION["REMOTE_ADDR"] = $_SERVER["REMOTE_ADDR"];
		if (isset($_REQUEST["name"]))
			$_SESSION["name"] = $_REQUEST["name"];

	}

	


