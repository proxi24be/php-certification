<?php
	
	// Create new database in memory
	    $memory_db = new PDO('sqlite::memory:');
	    // Set errormode to exceptions
	    $memory_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    // Create table messages with different time format
    	$memory_db->exec("CREATE TABLE messages (
                      id INTEGER PRIMARY KEY, 
                      title TEXT, 
                      message TEXT, 
                      time TEXT)");
	    // Array with some test data to insert to database             
	    $messages = array(
	                  array('title' => 'Hello!',
	                        'message' => 'Just testing...',
	                        'time' => 1327301464),
	                  array('title' => 'Hello again!',
	                        'message' => 'More testing...',
	                        'time' => 1339428612),
	                  array('title' => 'Hi!',
	                        'message' => 'SQLite3 is cool...',
	                        'time' => 1327214268)
	                );
	    // Prepare INSERT statement to SQLite3 memory db
	    $insert = "INSERT INTO messages (id, title, message, time) 
	                VALUES (:id, :title, :message, :time)";
	    $stmt = $memory_db->prepare($insert);
	    
	    // Bind parameters to statement variables
	    $title; 
	    $message;
	    $time;
	    $stmt->bindParam(':title', $title);
	    $stmt->bindParam(':message', $message);
	    $stmt->bindParam(':time', $time);

	    foreach ($messages as $row) {
	    	$title = $row['title'];
	    	$message = $row['message'];
	    	$time = $row['time'];
		    $stmt->execute();
	    }

	    $rows = $memory_db->query("select * from messages");
	    if ($rows !== FALSE) {
	    	foreach ($rows as $row) {
	    		echo nl2br( "message: " . $row['message']. " | time: " . date('d-m-Y',$row['time']). PHP_EOL);
	    	}	
	    }

	    $memory_db = NULL;
	    