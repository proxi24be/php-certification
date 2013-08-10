<?php

	$start = microtime();
	$pdo = new PDO("sqlite:pdo/rss.db");
	$pdo->exec("DELETE FROM RSS");
	$sql = "insert into RSS (title, link, time) values (:title, :link, :time)";
	$stmt = $pdo->prepare($sql);

	$arrayFeeds = array(
		"http://www.lesoir.be/feed/Actualité/Belgique/destination_principale_block",
		"http://www.lesoir.be/feed/Actualité/Belgique/Politiclub/destination_principale_block",
		"http://www.lesoir.be/feed/Actualité/Monde/destination_principale_block",
		"http://www.lesoir.be/feed/Actualité/Fil Info/destination_principale_block",
		"http://www.lesoir.be/feed/Actualit%C3%A9/R%C3%A9gions/destination_principale_block",
		);
	foreach($arrayFeeds as $feed) {
		$rss = file_get_contents($feed);
		$simpleXML = new SimpleXMLElement($rss);
		// Insert the feeds.
		foreach($simpleXML->channel->item as $item) {
			$stmt->bindValue(":title", $item->title);
			$stmt->bindValue(":link", $item->link);
			$stmt->bindValue(":time", time());
			$stmt->execute();
		}
	}

	// Retrieve the feeds from database.
	$stmt = $pdo->query("select * from RSS order by time asc");
	$count = 0;
	$rows = "";
	// Because PDOStatement implements Traversable
	foreach($stmt as $row) {
		++$count;
		$tr =  "<td>" . htmlspecialchars_decode(htmlentities($row['title'])) . "</td>";
		$tr = $tr. "<td><a href='".$row['link']."'>".$row['link']."</a></td>";
		$rows = $rows . "<tr>$tr</tr>";
	}

	$table = <<<table
	<table>
		<thead>
			<tr><th>title</th><th>link</th></tr>
		</thead>
		<tbody>
			$rows
		</tbody>
	</table>
table;

	echo $table;
	
	echo nl2br("number of rows : $count ". PHP_EOL);
	printf(nl2br("completed in %s ms" . PHP_EOL), microtime()-$start);
