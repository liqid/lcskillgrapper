<?php
namespace LC\Transfer;

use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Exception\TApplicationException;

class Tier extends TBase {
  static $_TSPEC;

  public $tierId = null;
  public $sp = null;
  public $mana = null;
  public $effects = null;
  public $conditions = null;
  public $money = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'tierId',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'sp',
          'type' => TType::I32,
          ),
        3 => array(
          'var' => 'mana',
          'type' => TType::I32,
          ),
        4 => array(
          'var' => 'effects',
          'type' => TType::SET,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\LC\Transfer\Effect',
            ),
          ),
        5 => array(
          'var' => 'conditions',
          'type' => TType::SET,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\LC\Transfer\Condition',
            ),
          ),
        6 => array(
          'var' => 'money',
          'type' => TType::DOUBLE,
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'Tier';
  }

  public function read($input)
  {
    return $this->_read('Tier', self::$_TSPEC, $input);
  }
  public function write($output) {
    return $this->_write('Tier', self::$_TSPEC, $output);
  }
}