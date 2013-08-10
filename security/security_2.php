<?php 
	session_start();
	
	include("check_session.inc.php");

	if (isset($_SESSION['authenticated'])) {
		printf("who I AM ? I am %s", $_SESSION['name']);
	}
