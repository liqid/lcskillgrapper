<?php
// $html = file_get_contents('http://guide.lastchaos.bplaced.net/index.php?title=Skills');
// libxml_use_internal_errors(true);
// $dom = new DOMDocument();
// $dom->preseveWhiteSpaces = false;
// $dom->loadHTML($html);
// $links = $dom->getElementsByTagName('a');
// $urls = array();
// $fp = fopen('test', 'ab');
// foreach ($links as $link) {
	// if (preg_match('/.*(l_a|ls_a|l_p|ls_p).*/', $link->getAttribute('href'))) {
	    // fwrite($fp, $link->getAttribute('href') . PHP_EOL);
	    // $urls[] = $link->getAttribute('href');
	// }
// }
// 
// 
// var_dump($urls);

    require_once 'LC/Transfer/thrift/0.9.0/php/Thrift/Thrift.php';
    require_once 'LC/Transfer/thrift/0.9.0/php/Thrift/ClassLoader/ThriftClassLoader.php';
    
    use Thrift\ClassLoader\ThriftClassLoader;
    
    if (!isset($GEN_DIR)) {
        $GEN_DIR = 'gen-php';
    }
    if (!isset($MODE)) {
        $MODE = 'normal';
    }
    
    $loader = new ThriftClassLoader();
    $loader->registerNamespace('Thrift', './LC/Transfer/thrift/0.9.0/php/');
    $loader->registerNamespace('LC', './');
    $loader->register();
    use Thrift\Protocol\TProtocol;
    use Thrift\Protocol\TJSONProtocol;
    use Thrift\Transport\THttpClient;
    use Thrift\Transport\TPhpStream;
    use Thrift\Transport\TBufferedTransport;
    use Thrift\Exception\TException;
    
    
use LC\Transfer\SkillsClient as SkillClient;
$socket = new THttpClient('localhost',8888,'/index.php');

$transport = new TBufferedTransport($socket, 1024, 1024);
$protocol = new TJSONProtocol($transport);

$client = new SkillClient($protocol);

$transport->open();

//$test = $client->getId('bla');

$huhu = new LC\GrapSkills('http://guide.lastchaos.bplaced.net/index.php?title=Kriegsmeister_Skills_aktiv');

var_dump($huhu->grap());
$transport->close();
