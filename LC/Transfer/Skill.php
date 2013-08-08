<?php
namespace LC\Transfer;

use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Exception\TApplicationException;

class Skill extends TBase {
  static $_TSPEC;

  public $skillId = null;
  public $name = null;
  public $character = null;
  public $info = null;
  public $type = null;
  public $tiers = null;
  public $iconURL = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'skillId',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'name',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'character',
          'type' => TType::STRUCT,
          'class' => '\LC\Transfer\Character',
          ),
        4 => array(
          'var' => 'info',
          'type' => TType::STRING,
          ),
        5 => array(
          'var' => 'type',
          'type' => TType::I32,
          ),
        6 => array(
          'var' => 'tiers',
          'type' => TType::SET,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\LC\Transfer\Tier',
            ),
          ),
        7 => array(
          'var' => 'iconURL',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'Skill';
  }

  public function read($input)
  {
    return $this->_read('Skill', self::$_TSPEC, $input);
  }
  public function write($output) {
    return $this->_write('Skill', self::$_TSPEC, $output);
  }
}