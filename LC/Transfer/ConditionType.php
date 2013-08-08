<?php
namespace LC\Transfer;

use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Exception\TApplicationException;

class ConditionType extends TBase {
  static $_TSPEC;

  public $conditionTypeId = null;
  public $name = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'conditionTypeId',
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
    return 'ConditionType';
  }

  public function read($input)
  {
    return $this->_read('ConditionType', self::$_TSPEC, $input);
  }
  public function write($output) {
    return $this->_write('ConditionType', self::$_TSPEC, $output);
  }
}