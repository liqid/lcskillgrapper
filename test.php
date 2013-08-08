<?php
$html = file_get_contents('http://guide.lastchaos.bplaced.net/index.php?title=Skills');
libxml_use_internal_errors(true);
$dom = new DOMDocument();
$dom->preseveWhiteSpaces = false;
$dom->loadHTML($html);
$links = $dom->getElementsByTagName('a');
$urls = array();
$fp = fopen('test', 'ab');
foreach ($links as $link) {
	if (preg_match('/.*(l_a|ls_a|l_p|ls_p).*/', $link->getAttribute('href'))) {
	    fwrite($fp, $link->getAttribute('href') . PHP_EOL);
	    $urls[] = $link->getAttribute('href');
	}
}


var_dump($urls);