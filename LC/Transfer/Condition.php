<?php
namespace LC\Transfer;

use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Exception\TApplicationException;

class Condition extends TBase {
  static $_TSPEC;

  public $conditionId = null;
  public $conditionType = null;
  public $value = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'conditionId',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'conditionType',
          'type' => TType::STRUCT,
          'class' => '\LC\Transfer\ConditionType',
          ),
        3 => array(
          'var' => 'value',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'Condition';
  }

  public function read($input)
  {
    return $this->_read('Condition', self::$_TSPEC, $input);
  }
  public function write($output) {
    return $this->_write('Condition', self::$_TSPEC, $output);
  }
}