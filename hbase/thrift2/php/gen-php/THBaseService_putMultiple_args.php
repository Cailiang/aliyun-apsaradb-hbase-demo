<?php
/**
 * Autogenerated by Thrift Compiler (0.12.0)
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
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class THBaseService_putMultiple_args
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'table',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'tputs',
            'isRequired' => true,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\TPut',
                ),
        ),
    );

    /**
     * the table to put data in
     * 
     * @var string
     */
    public $table = null;
    /**
     * a list of TPuts to commit
     * 
     * @var \TPut[]
     */
    public $tputs = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['table'])) {
                $this->table = $vals['table'];
            }
            if (isset($vals['tputs'])) {
                $this->tputs = $vals['tputs'];
            }
        }
    }

    public function getName()
    {
        return 'THBaseService_putMultiple_args';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->table);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::LST) {
                        $this->tputs = array();
                        $_size197 = 0;
                        $_etype200 = 0;
                        $xfer += $input->readListBegin($_etype200, $_size197);
                        for ($_i201 = 0; $_i201 < $_size197; ++$_i201) {
                            $elem202 = null;
                            $elem202 = new \TPut();
                            $xfer += $elem202->read($input);
                            $this->tputs []= $elem202;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('THBaseService_putMultiple_args');
        if ($this->table !== null) {
            $xfer += $output->writeFieldBegin('table', TType::STRING, 1);
            $xfer += $output->writeString($this->table);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->tputs !== null) {
            if (!is_array($this->tputs)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('tputs', TType::LST, 2);
            $output->writeListBegin(TType::STRUCT, count($this->tputs));
            foreach ($this->tputs as $iter203) {
                $xfer += $iter203->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
