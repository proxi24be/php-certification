<?php 
	$pwd = "/home/bluenight/.mozilla/firefox/xvafhrao.default/cookies.sqlite";
	$chromium = "/home/bluenight/.config/chromium/Default/Cookies";

	try {

		$pdo = new PDO("sqlite:$chromium");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo->query("select * from cookies where host_key='localhost' and name ='PHPSESSID';");
		if ($stmt !== FALSE) {
			foreach ($stmt as $row)
				print_r($row);	
		}
		
	} 
	catch (PDOException $e) {
		echo $e->getMessage();
	}