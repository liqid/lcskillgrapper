<?php
namespace LC\Transfer;

use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Exception\TApplicationException;

class Skills_send_args extends TBase {
  static $_TSPEC;

  public $skill = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'skill',
          'type' => TType::STRUCT,
          'class' => '\LC\Transfer\Skill',
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'Skills_send_args';
  }

  public function read($input)
  {
    return $this->_read('Skills_send_args', self::$_TSPEC, $input);
  }
  public function write($output) {
    return $this->_write('Skills_send_args', self::$_TSPEC, $output);
  }
}