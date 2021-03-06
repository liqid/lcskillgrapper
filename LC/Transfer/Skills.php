<?php
namespace LC\Transfer;
/**
 * Autogenerated by Thrift Compiler (0.9.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Exception\TApplicationException;


interface SkillsIf {
  public function send(\LC\Transfer\Skill $skill);
  public function getId($name);
}

class SkillsClient implements \LC\Transfer\SkillsIf {
  protected $input_ = null;
  protected $output_ = null;

  protected $seqid_ = 0;

  public function __construct($input, $output=null) {
    $this->input_ = $input;
    $this->output_ = $output ? $output : $input;
  }

  public function send(\LC\Transfer\Skill $skill)
  {
    $this->send_send($skill);
  }

  public function send_send(\LC\Transfer\Skill $skill)
  {
    $args = new \LC\Transfer\Skills_send_args();
    $args->skill = $skill;
    $bin_accel = ($this->output_ instanceof TProtocol::$TBINARYPROTOCOLACCELERATED) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($this->output_, 'send', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
    }
    else
    {
      $this->output_->writeMessageBegin('send', TMessageType::CALL, $this->seqid_);
      $args->write($this->output_);
      $this->output_->writeMessageEnd();
      $this->output_->getTransport()->flush();
    }
  }
  public function getId($name)
  {
    $this->send_getId($name);
    return $this->recv_getId();
  }

  public function send_getId($name)
  {
    $args = new \LC\Transfer\Skills_getId_args();
    $args->name = $name;
    $bin_accel = ($this->output_ instanceof TProtocol::$TBINARYPROTOCOLACCELERATED) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($this->output_, 'getId', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
    }
    else
    {
      $this->output_->writeMessageBegin('getId', TMessageType::CALL, $this->seqid_);
      $args->write($this->output_);
      $this->output_->writeMessageEnd();
      $this->output_->getTransport()->flush();
    }
  }

  public function recv_getId()
  {
    $bin_accel = ($this->input_ instanceof TProtocol::$TBINARYPROTOCOLACCELERATED) && function_exists('thrift_protocol_read_binary');
    if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\LC\Transfer\Skills_getId_result', $this->input_->isStrictRead());
    else
    {
      $rseqid = 0;
      $fname = null;
      $mtype = 0;

      $this->input_->readMessageBegin($fname, $mtype, $rseqid);
      if ($mtype == TMessageType::EXCEPTION) {
        $x = new TApplicationException();
        $x->read($this->input_);
        $this->input_->readMessageEnd();
        throw $x;
      }
      $result = new \LC\Transfer\Skills_getId_result();
      $result->read($this->input_);
      $this->input_->readMessageEnd();
    }
    if ($result->success !== null) {
      return $result->success;
    }
    throw new \Exception("getId failed: unknown result");
  }

}

// HELPER FUNCTIONS AND STRUCTURES

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

class Skills_getId_result extends TBase {
  static $_TSPEC;

  public $success = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        0 => array(
          'var' => 'success',
          'type' => TType::I32,
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'Skills_getId_result';
  }

  public function read($input)
  {
    return $this->_read('Skills_getId_result', self::$_TSPEC, $input);
  }
  public function write($output) {
    return $this->_write('Skills_getId_result', self::$_TSPEC, $output);
  }
}

class SkillsProcessor {
  protected $handler_ = null;
  public function __construct($handler) {
    $this->handler_ = $handler;
  }

  public function process($input, $output) {
    $rseqid = 0;
    $fname = null;
    $mtype = 0;

    $input->readMessageBegin($fname, $mtype, $rseqid);
    $methodname = 'process_'.$fname;
    if (!method_exists($this, $methodname)) {
      $input->skip(TType::STRUCT);
      $input->readMessageEnd();
      $x = new TApplicationException('Function '.$fname.' not implemented.', TApplicationException::UNKNOWN_METHOD);
      $output->writeMessageBegin($fname, TMessageType::EXCEPTION, $rseqid);
      $x->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
      return;
    }
    $this->$methodname($rseqid, $input, $output);
    return true;
  }

  protected function process_send($seqid, $input, $output) {
    $args = new \LC\Transfer\Skills_send_args();
    $args->read($input);
    $input->readMessageEnd();
    $this->handler_->send($args->skill);
    return;
  }
  protected function process_getId($seqid, $input, $output) {
    $args = new \LC\Transfer\Skills_getId_args();
    $args->read($input);
    $input->readMessageEnd();
    $result = new \LC\Transfer\Skills_getId_result();
    $result->success = $this->handler_->getId($args->name);
    $bin_accel = ($output instanceof TProtocol::$TBINARYPROTOCOLACCELERATED) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($output, 'getId', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
    }
    else
    {
      $output->writeMessageBegin('getId', TMessageType::REPLY, $seqid);
      $result->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
    }
  }
}

