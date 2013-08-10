<?php

$heredoc = <<<EOD

& , ", ', <, > 
é à ç

EOD;

echo "encoding using htmlentities";

echo nl2br(htmlentities($heredoc));

echo PHP_EOL;

echo "encoding using htmlspecialchars";
echo nl2br(htmlspecialchars($heredoc));

echo PHP_EOL;