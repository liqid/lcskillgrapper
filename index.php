<?php
// function __autoload($className)
// {
    // echo $className;
    // $file = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    // if (file_exists($file)) {
        // require_once($file);
    // } else {
        // $thriftHome = '/usr/local/Cellar/thrift/0.9.0/php/';
        // $file = $thriftHome . $className . '.php';
        // if (file_exists($file)) {
            // require_once($file);
        // }
    // }
// }
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
    $loader->registerDefinition('ThriftTest', $GEN_DIR);
    $loader->register();
    use Thrift\Protocol\TProtocol;
    use Thrift\Protocol\TJSONProtocol;
    use Thrift\Transport\THttpClient;
    use Thrift\Transport\TPhpStream;
    use Thrift\Transport\TBufferedTransport;
    use Thrift\Exception\TException;
    
    

class SkillsHandler implements LC\Transfer\SkillsIf
{
    protected $log = array();
    
    public function send(\LC\Transfer\Skill $skill)
    {
        file_put_contents('log', date('Y-m-d H:i:s', time()) . PHP_EOL);
    }
    
    public function getId($name)
    {
        return 1;
    }
}

header('Content-Type', 'application/x-thrift');
$handler = new SkillsHandler();
$processor = new LC\Transfer\SkillsProcessor($handler);

$transport = new TBufferedTransport(new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W));
$protocol = new TJSONProtocol($transport);
$transport->open();
$processor->process($protocol, $protocol);
$transport->close();