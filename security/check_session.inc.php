<?php 
	
	if(($_SESSION["HTTP_USER_AGENT"] !== $_SERVER["HTTP_USER_AGENT"]) || 
		($_SESSION["REMOTE_ADDR"] !== $_SERVER["REMOTE_ADDR"])) {
		// Something goes wrong.
		exit();
	}
