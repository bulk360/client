<?php

require_once "./src/RandomQuotes.php";

$rq = new \RandomQuotes\RandomQuotes();

echo $rq->generate();
echo "\n";

