<?php
	
	try {

		$start = microtime();
	    include("pdo/pdo_memory.php");
		include("pdo/pdo_file.php");
	    echo "completed time in " . microtime() - $start . " ms";

	} catch (PDOException $e) {
		echo $e->getMessage();
	}
