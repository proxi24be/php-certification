<?php
	
	$pwd = "/home/bluenight/.mozilla/firefox/xvafhrao.default/cookies.sqlite";
	$chromium = "/home/bluenight/.config/chromium/Default/Cookies";

	try {

		$pdo = new PDO("sqlite:$chromium");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo->prepare("update cookies set value = :session_id where host_key ='localhost' and name = 'PHPSESSID';");
		if ($stmt !== FALSE) {
			if (isset($_REQUEST['session_id'])) {
				$stmt->execute(array("session_id" => $_REQUEST['session_id']));
				if ($stmt->rowCount() === 1) {
					//update success.
					$stmt = $pdo->query("select * from cookies where host_key='localhost' and name ='PHPSESSID';");
					foreach ($stmt as $row)
						print_r($row);
				}

			}
				
		}

		// $stmt = $pdo->query("select * from moz_cookies where baseDomain = 'localhost'");
		// $stmt = $pdo->query("select * from cookies where host_key like '%localhost%';");

	} 
	catch (PDOException $e) {
		echo $e->getMessage();
	}
