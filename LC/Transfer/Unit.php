<?php
namespace LC\Transfer;

use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Exception\TApplicationException;

class Unit {
  const NONE = 0;
  const PERCENT = 1;
  const SECONDS = 2;
  static public $__names = array(
    0 => 'NONE',
    1 => 'PERCENT',
    2 => 'SECONDS',
  );
}