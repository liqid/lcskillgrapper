<?php
namespace LC\Transfer;

use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Exception\TApplicationException;

class Skills_getId_args extends TBase {
  static $_TSPEC;

  public $name = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
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
    return 'Skills_getId_args';
  }

  public function read($input)
  {
    return $this->_read('Skills_getId_args', self::$_TSPEC, $input);
  }
  public function write($output) {
    return $this->_write('Skills_getId_args', self::$_TSPEC, $output);
  }
}