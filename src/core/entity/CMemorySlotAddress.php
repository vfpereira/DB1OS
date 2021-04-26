<?php
namespace DB1OS\core\entity;

use DB1OS\core\repository\MemorySlotAddress;
use DB1OS\core\entity\UnsignedInteger;

Class CMemorySlotAddress implements MemorySlotAddress
{
    private UnsignedInteger $row;
    private UnsignedInteger $column;

    public function __construct(UnsignedInteger $row, UnsignedInteger $column)
    {
        $this->row = $row;
        $this->column = $column;
    }

    public function getRow(): UnsignedInteger
    {
        return $this->row;
    }

    public function setRow(UnsignedInteger $row) : void
    {
        $this->row = $row;
    }

    public function getColumn(): UnsignedInteger
    {
        return $this->column;
    }

    public function setColumn(UnsignedInteger $column) : void
    {
        $this->column = $column;
    }
}