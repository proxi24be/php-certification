<?php 
	
	// Create new database in memory
	    $file_db = new PDO('sqlite:breast_reborn.db');
	    // Set errormode to exceptions
	    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    
	    $stmt = $file_db->query("SELECT * FROM V_USER_REGISTRATION");
	    if ($stmt !== FALSE) {
	    	// Retrieve all the data on the server side, 
	    	// could use much memory.
	    	$objects = $stmt->fetchAll(PDO::FETCH_CLASS);

	    	foreach($objects as $object)
	    		echo nl2br($object->USER_ID . PHP_EOL);

	    	foreach($objects as $object)
	    		echo nl2br($object->EMAIL_ADDRESS . PHP_EOL);

	    }

	    $file_db = NULL;
	    