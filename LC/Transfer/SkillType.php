<?php
namespace LC\Transfer;

use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Exception\TApplicationException;

class SkillType {
  const ACTIVE = 0;
  const PASSIVE = 1;
  static public $__names = array(
    0 => 'ACTIVE',
    1 => 'PASSIVE',
  );
}