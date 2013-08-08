<?php
namespace LC\Transfer;

use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Exception\TApplicationException;

class Character extends TBase {
  static $_TSPEC;

  public $characterId = null;
  public $name = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'characterId',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'name',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'Character';
  }

  public function read($input)
  {
    return $this->_read('Character', self::$_TSPEC, $input);
  }
  public function write($output) {
    return $this->_write('Character', self::$_TSPEC, $output);
  }
}