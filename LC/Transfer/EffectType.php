<?php
namespace LC\Transfer;

use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Exception\TApplicationException;

class EffectType extends TBase {
  static $_TSPEC;

  public $effectTypeId = null;
  public $name = null;
  public $unit = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'effectTypeId',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'name',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'unit',
          'type' => TType::I32,
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'EffectType';
  }

  public function read($input)
  {
    return $this->_read('EffectType', self::$_TSPEC, $input);
  }
  public function write($output) {
    return $this->_write('EffectType', self::$_TSPEC, $output);
  }
}