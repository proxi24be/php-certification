<?php
	if (!isset($_GET['unprotected'])) {
		header("location:xss.php?unprotected=<script>alert('if you see this message, this is bad.');</script>&protected=<script>alert('content protected');</script>");
	}
	else {
		echo "<h3>An example of hacking using XSS (cross site scripting)</h3>";	

		if (isset($_GET['unprotected']))
			echo $_GET['unprotected'];

		echo "the below content has been properly escaped... <br/>";
		if (isset($_GET['protected']))
			echo "<pre>" . htmlentities($_GET['protected']) . "</pre>";
	}
	
	