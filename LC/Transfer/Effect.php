<?php
namespace LC\Transfer;

use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Exception\TApplicationException;

class Effect extends TBase {
  static $_TSPEC;

  public $effectId = null;
  public $effectType = null;
  public $value = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'effectId',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'effectType',
          'type' => TType::STRUCT,
          'class' => '\LC\Transfer\EffectType',
          ),
        3 => array(
          'var' => 'value',
          'type' => TType::DOUBLE,
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'Effect';
  }

  public function read($input)
  {
    return $this->_read('Effect', self::$_TSPEC, $input);
  }
  public function write($output) {
    return $this->_write('Effect', self::$_TSPEC, $output);
  }
}